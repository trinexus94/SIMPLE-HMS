<?php 
include('functions.php');
  //session_start(); 

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
            <a href="view.php">view users</a>
            </li>
            <li>
              <a href="#create_user">Create user</a>
            </li>
            <li>
              welcome<span style="color: black; size: 10px;"> <?php echo $_SESSION['lname']; ?></span>
            </li>
                <!-- logged in user information -->
            <li>

    	      <a href="index.php?logout='1'" style="color: red;">logout</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-demo">
    <li>
      <a href="#home">Home</a>
    </li>
   
      <a href="view.php">view users</a>
    </li>
    <li>
      <a href="#create_user">Create user</a>
    </li>
    <li>
      <?php  if (isset($_SESSION['username'])) : ?>
    	<a href="index.php?logout='1'" style="color: red;">logout</a>
       <?php endif ?>
    </li>
  </ul>

  <!-- Section: Slider -->
  <section class="slider">
    <ul class="slides">
      <li>
        <img src="images/hospital.jpg">
        <div class="caption center-align">
          <h2>Healthy living</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam non illo earum cumque id est!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>
      </li>
      <li>
        <img src="images/hospital1.jpg">
        <div class="caption left-align">
          <h2>Keep your body healthy</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam non illo earum cumque id est!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>
      </li>
      <li>
        <img src="images/healthyfood.jpg">
        <div class="caption right-align">
          <h2>Treat your body right</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam non illo earum cumque id est!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>
      </li>
    </ul>
  </section>

  <!-- Section: Search -->
  <section id="search" class="section card-panel teal darken-1 white-text center scrollspy">
    <div class="container">
      <div class="row">
      <div class="col s12 m6">
            <h5>Hello admin</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed praesentium delectus. Sit, mollitia
              quo. Veniam repellat voluptas ipsum doloremque?</p>
          
      </div>
      </div>
    </div>
  </section>


  <!-- Section: Create_user -->
  <section id="create_user" class="section section-contact scrollspy">
    <div class="container">
      <div class="row">
      <div class="col s12 m6">
          <div class="card-panel teal white-text center">
            <i class="material-icons medium">email</i>
            <h5>Enter any new users who request special entry</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed praesentium delectus. Sit, mollitia
              quo. Veniam repellat voluptas ipsum doloremque?</p>
          </div>
         
        </div>
        <div class="col s12 m6">
          <div class="card-panel grey lighten-3">
          <form method="post" action="admin.php">
          
          <div class="input-field">
  	          <label>User type</label>
  	          <input type="text" name="user_type">
  	        </div>
  	        <div class="input-field">
  	          <label>Last name</label>
  	          <input type="text" name="lname">
  	        </div>
            <div class="input-field">
  	          <label>First name</label>
  	          <input type="text" name="fname">
  	        </div>
  	        <div class="input-field">
  	          <label>Email</label>
  	          <input type="email" name="email">
  	        </div>
  	        <div class="input-field">
  	          <label>Password</label>
  	          <input type="password" name="password_1">
  	        </div>
  	        <div class="input-field">
  	          <label>Confirm password</label>
  	          <input type="password" name="password_2">
  	        </div>
  	        <div class="input-field">
  	          <button type="submit" class="btn" name="create_user">create user</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="section teal darken-2 white-text center">
    <p class="flow-text">trinexuscreates &copy; 2018</p>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <script>
    //sidevav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, { });
    //slider
    const slider = document.querySelector('.slider');
    M.Slider.init(slider, {
        indicators:false,
        height: 500,
        transition: 500,
        interval: 6000
    });
    //select
    const elems = document.querySelectorAll('.select');
     M.FormSelect.init(elems, {options:true});

    //autocomplete
    const ac = document.querySelector('.autocomplete');
    M.Autocomplete.init(ac,{
      data: {
        "Hospitals": null,
        "in patient": null,
        "Outpatient": null,
        "emergency": null,
        "Health workers": null,
      }
    });
  </script>
</body>
</html>
