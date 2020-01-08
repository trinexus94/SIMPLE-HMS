<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$user_type ="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hosi');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $user_type = mysqli_real_escape_string($db, $_POST['user_type']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user_type)) { array_push($errors, "User type is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Username (email) exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = sha1($password_1);//encrypt the password before saving in the database
    
    if($user_type===Doctor)
    {
      $query = "INSERT INTO doctor (doc_lname, doc_fname, doc_email) 
          VALUES( '$lname', '$fname' ,'$email')";
          mysqli_query($db, $query);
          $query1 = "INSERT INTO users (user_type, email, password) 
  			  VALUES( '$user_type', '$email', '$password')";
	      	mysqli_query($db, $query1);
    }else if($user_type===Support)  
    {
      $query = "INSERT INTO support (s_lname, s_fname, s_email) 
          VALUES( '$lname', '$fname' ,'$email')";
          mysqli_query($db, $query);
          $query1 = "INSERT INTO users (user_type, email, password) 
  			  VALUES( '$user_type', '$email', '$password')";
	      	mysqli_query($db, $query1);
    }else if($user_type===Patient)
    {
      $query = "INSERT INTO patient (p_lname, p_fname, p_email) 
          VALUES( '$lname', '$fname' ,'$email')";
          mysqli_query($db, $query);
          $query1 = "INSERT INTO users (user_type, email, password) 
  			  VALUES( '$user_type', '$email', '$password')";
	      	mysqli_query($db, $query1);
    }

    $_SESSION['lname'] = $lname;
    $_SESSION['fname'] = $fname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: welcome.php');
  }
}
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = sha1($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$results = mysqli_query($db, $query);
		//$logged_in_user = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
				$logged_in_user = mysqli_fetch_assoc($results);	
      if($logged_in_user['user_type']=='Admin' ){
        $query = "SELECT * FROM administrator WHERE a_email='$email'";
        $myresults = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($myresults);
        if($user) {  
        $_SESSION['lname'] = $user['a_lname'];
        $_SESSION['fname'] = $user['a_fname'];
  	    $_SESSION['success'] = "You are now logged in as Admin";
      header('location: admin.php');
        }
  	}elseif($logged_in_user['user_type']=='Doctor'){
      $query = "SELECT * FROM doctor WHERE doc_email='$email'";
      $myresults = mysqli_query($db, $query);
      $user = mysqli_fetch_assoc($myresults);
      if($user) {
      $_SESSION['lname'] = $user['doc_lname'];
      $_SESSION['fname'] = $user['doc_fname'];
  	  $_SESSION['success'] = "You are now logged in as Doctor";
      header('location: doctor.php');
      }
    }elseif($logged_in_user['user_type']=='Patient'){
      $query = "SELECT * FROM patient WHERE p_email='$email'";
      $myresults = mysqli_query($db, $query);
      $user = mysqli_fetch_assoc($myresults);
      if($user) {
      $_SESSION['lname'] = $user['p_lname'];
      $_SESSION['fname'] = $user['p_fname'];
  	  $_SESSION['success'] = "You are now logged in as Patient";
      header('location: index.php');
      }
    }elseif($logged_in_user['user_type']=='Support'){
      $query = "SELECT * FROM support WHERE s_email='$email'";
      $myresults = mysqli_query($db, $query);
      $user = mysqli_fetch_assoc($myresults);
      if($user) {
      $_SESSION['lname'] = $user['s_lname'];
      $_SESSION['fname'] = $user['s_fname'];
  	  $_SESSION['success'] = "You are now logged in as support";
      header('location: support.php');
      }
		}
	}
  	else {
  		array_push($errors, "Wrong username/password combination");
					}
	
		}
	
}

// CREATE USER
if (isset($_POST['create_user'])) {
  // receive all input values from the form
  $user_type = mysqli_real_escape_string($db, $_POST['user_type']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user_type)) { array_push($errors, "User type is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Username (email) exists");
    }

  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = sha1($password_1);//encrypt the password before saving in the database
    
    if($user_type==='Doctor')
    {
      $query = "INSERT INTO doctor (doc_lname, doc_fname, doc_email) 
          VALUES( '$lname', '$fname' ,'$email')";
          mysqli_query($db, $query);
          $query1 = "INSERT INTO users (user_type, email, password) 
  			  VALUES( '$user_type', '$email', '$password')";
	      	mysqli_query($db, $query1);
    }else if($user_type==='Support')  
    {
      $query = "INSERT INTO support (s_lname, s_fname, s_email) 
          VALUES( '$lname', '$fname' ,'$email')";
          mysqli_query($db, $query);
          $query1 = "INSERT INTO users (user_type, email, password) 
  			  VALUES( '$user_type', '$email', '$password')";
	      	mysqli_query($db, $query1);
    }else if($user_type==='Patient')
    {
      $query = "INSERT INTO patient (p_lname, p_fname, p_email) 
          VALUES( '$lname', '$fname' ,'$email')";
          mysqli_query($db, $query);
          $query1 = "INSERT INTO users (user_type, email, password) 
  			  VALUES( '$user_type', '$email', '$password')";
	      	mysqli_query($db, $query1);
    }

  }
}
// ... 

// CREATE PATIENT RECORDS
if (isset($_POST['create_record'])) {
  // receive all input values from the form
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $diagnosis = mysqli_real_escape_string($db, $_POST['diagnosis']);
  $prescription = mysqli_real_escape_string($db, $_POST['prescription']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($lname)) { array_push($errors, "Patient last name is required"); }
  if (empty($fname)) { array_push($errors, "Patient first name is required"); }
  if (empty($date)) { array_push($errors, "Diagnosis date is required"); }
  if (empty($diagnosis)) { array_push($errors, "Patient diagnosis is required"); }
  if (empty($prescription)) { array_push($errors, "Patient prescription is required"); }
      
   //get patient id 
   $user_check_query = "SELECT * FROM patient WHERE p_lname='$lname' AND p_fname='$fname'";
   $result = mysqli_query($db, $user_check_query);
   $user = mysqli_fetch_assoc($result);
   $id = $user['p_id'];
    //get doctor id
    $doc_lname=$_SESSION['lname'];
    $doc_fname=$_SESSION['fname'];
    $user_check_query1 = "SELECT doc_id FROM doctor WHERE doc_lname='$doc_lname' AND doc_fname='$doc_fname'";
    $results = mysqli_query($db, $user_check_query1);
    $users = mysqli_fetch_assoc($results);
    $doc_id = $users['doc_id'];  
      //encrypt diagnosis before inserting into database
    //$diagnosis = AES_ENCRYPT('$diagnosis','secret');
      // input diagnosis details
  	$query = "INSERT INTO diagnosis (d_date, d_details, d_prescription) 
  			  VALUES( '$date', AES_ENCRYPT('$diagnosis','secret'), '$prescription')";
    mysqli_query($db, $query);

    $newquery = "SELECT d_id from diagnosis where d_date = '$date' and d_prescription = '$prescription'";
    $result3 = mysqli_query($db, $newquery);

    $last_user = mysqli_fetch_assoc($result3);
    $last_id = $last_user['d_id'];
    $query2 = "INSERT INTO patient_diagnosis (p_id,doc_id,d_id) VALUES('$id','$doc_id' ,'$last_id')";
    mysqli_query($db, $query2);
    
  }
// ... 
// CREATE PATIENT APPOINTMENT
if (isset($_POST['appointment'])) {
  // receive all input values from the form
  $p_lname = mysqli_real_escape_string($db, $_POST['lname']);
  $p_fname = mysqli_real_escape_string($db, $_POST['fname']);
  $app_date = mysqli_real_escape_string($db, $_POST['app_date']);
  $app_details = mysqli_real_escape_string($db, $_POST['details']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($p_lname)) { array_push($errors, "Patient last name is required"); }
  if (empty($p_fname)) { array_push($errors, "Patient first name is required"); }
  if (empty($app_date)) { array_push($errors, "appointment date is required"); }
  if (empty($app_details)) { array_push($errors, "Patient appointment details is required"); }

      
   //get patient id 
   $user_check_query = "SELECT * FROM patient WHERE p_lname='$p_lname' AND p_fname='$p_fname'";
   $result = mysqli_query($db, $user_check_query);
   $user = mysqli_fetch_assoc($result);
   $id = $user['p_id'];
    //get support id
    $s_lname=$_SESSION['lname'];
    $s_fname=$_SESSION['fname'];
    $user_check_query1 = "SELECT s_id FROM support WHERE s_lname='$s_lname' AND s_fname='$s_fname'";
    $results1 = mysqli_query($db, $user_check_query1);
    $users1 = mysqli_fetch_assoc($results1);
    $s_id = $users1['s_id'];  
  // first input diagnosis details
  	$query = "INSERT INTO appointments (app_date, app_details) 
  			  VALUES( '$app_date', '$app_details')";
    mysqli_query($db, $query);

    $newquery = "SELECT app_id from appointments where app_date = '$app_date' and app_details = '$app_details'";
    $result4 = mysqli_query($db, $newquery);

    $last_user = mysqli_fetch_assoc($result4);
    $last_id = $last_user['app_id'];
    $query2 = "INSERT INTO patient_appointment (p_id,s_id,app_id) VALUES('$id','$s_id' ,'$last_id')";
    mysqli_query($db, $query2);
    
}

//create contact form
if (isset($_post['contact'])){
//receive the details
$lname = $_session['lname'];
$fname = $_session['fname'];
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$message = mysqli_real_escape_string($db, $_POST['message']);

//validation
if(empty($email)){array_push($errors, "your email is required");}
if(empty($phone)) {array_push($errors, "your phone number is required");}
if(empty($message)) {array_push($errors, "your message is required");}

$issues = "INSERT INTO issues ('fname', 'lname', 'email', 'phone', 'message') VALUES('$fname', '$lname', '$email', '$phone', '$message')";
mysqli_query($db, $issues);
}

?>