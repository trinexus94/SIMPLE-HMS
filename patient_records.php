<?php 
  session_start(); 

  if (!isset($_SESSION['lname']) && !isset($_SESSION['fname'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!--Import materialize.css-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <script defer src="/your-path-to-fontawesome/js/all.js"></script> <!--load all styles -->
   <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
  <title>HMS</title>
</head>
<body id="home" class="scrollspy">
  <div class="navbar-fixed">
    <nav class="teal">
      <div class="container">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">Kenya HMS</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
           <ul class="right hide-on-med-and-down">
            <li>
              <a href="#home">Home</a>
            </li>

            <li>
              welcome<span style="color: black; size: 10px;"> <?php echo $_SESSION['lname']; ?></span>
            </li>
                <!-- logged in user information -->
            <li>
 
    	      <a href="doctor.php" style="color: red;">back</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <!-- Section: view patient records -->
  <h3>patient records</h3>
  <?php
    $db = mysqli_connect('localhost', 'root', '', 'hosi');
 
    $lname=$_SESSION['lname'];
    $fname=$_SESSION['fname'];
    $sql3 = "SELECT doc_id from doctor WHERE doc_lname= '$lname' AND doc_fname= '$fname'";
    $result3 = mysqli_query($db, $sql3);
    $user3 = mysqli_fetch_assoc($result3);
    $doc_id = $user3['doc_id'];

    $sql4 = "SELECT p_id,d_id from patient_diagnosis";
    $result4 = mysqli_query($db, $sql4);
    $user4 = mysqli_fetch_assoc($result4);

    if($result4 -> num_rows > 0){
      echo "<table>";
      echo "<tr><th>LAST NAME</th><th>FIRST NAME</th><th>DIAGNOSIS</th><th>PRESCRIPTION</th><th>DIAGNOSIS DATE</th></tr>";
      while($user4 = $result4 -> fetch_assoc()){ 
        $d_id = $user4['d_id'];  
        $p_ids = $user4['p_id'];
        $sql5 = "SELECT  p_lname, p_fname from patient where p_id = '$p_ids'";
        $results5 = mysqli_query($db, $sql5);  
    $sql = " SELECT AES_DECRYPT(d_details, 'secret') AS 'd_details',d_prescription, d_date from diagnosis WHERE d_id = '$d_id'";
    $result2 = mysqli_query($db, $sql);  
    if(($result2 -> num_rows > 0) && ($results5 -> num_rows > 0)){
      while(($row = $result2 -> fetch_assoc()) && ($row2 = $results5 -> fetch_assoc())){
        echo "<tr><td>" ;
        echo $row2["p_lname"];
        echo "</td><td>" ;
        echo $row2["p_fname"];
        echo "</td><td>" ;
        echo $row["d_details"];
        echo "</td><td>" ;
        echo $row["d_prescription"];
        echo  "</td><td>" ;
        echo $row["d_date"];
        echo  "</td></tr>";
      }
    }
    else "0 results";
  }
  echo"</table>"; 
  }
  else "0 results";
  ?>
  <!-- Footer -->
  <footer class="section teal darken-2 white-text center">
    <p class="flow-text">Kenya Health Services &copy; 2018</p>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js">
  </script>

</body>
</html>
