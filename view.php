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
    	      <a href="admin.php" style="color: red;">back</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <!-- Section: view users -->
  <h1>USERS LIST</h1>
  <?php
    //include('functions.php');
    $db = mysqli_connect('localhost', 'root', '', 'hosi');
    $sql = "SELECT email, user_type from users";
    $result2 = mysqli_query($db, $sql);  
    if($result2 -> num_rows > 0){
      echo "<table>";
      echo "<tr><th>EMAIL</th><th>USER TYPE</th></tr>";
      while($row = $result2 -> fetch_assoc()){
        echo "<tr><td>" ;
        echo $row["email"];
        echo "</td><td>" ;;
        echo $row["user_type"];
        echo  "</td></tr>";
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
