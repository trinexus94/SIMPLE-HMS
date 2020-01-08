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
              <a href="#contact">Contact</a>
            </li>
                <!-- logged in user information -->
                <li>
            <?php  if (isset($_SESSION['username'])) : ?>
    	      
    	       <a href="index.php?logout='1'" style="color: red;">logout</a> 
            <?php endif ?>
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
    <li>
      <a href="#contact">Contact</a>
    </li>
    <li>
    <?php  if (isset($_SESSION['username'])) : ?>
    	      
            <a href="index.php?logout='1'" style="color: red;">logout</a> 
           <?php endif ?>
    </li>
  </ul>
    <!-- Section: welcome-->
    <section id="Home" class="section section-search teal darken-1 white-text center scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h3>WELCOME!<?php echo $_SESSION['lname']; ?> YOU ARE NOW REGISTERED. </h3>        
						<br>
            <P style="font size: 30px;">PLEASE LOGIN TO VIEW FULL FEATURES OF THE WEBSITE</P>
						<a href="index.php?logout='1'" style="color: red;" class="btn btn-large">login</a>    
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Contact -->
  <section id="contact" class="section section-contact scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-panel teal white-text center">
            <i class="material-icons medium">email</i>
            <h5>Contact Us For Enquiries</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed praesentium delectus. Sit, mollitia
              quo. Veniam repellat voluptas ipsum doloremque?</p>
          </div>
          <ul class="collection with-header">
            <li class="collection-header">
              <h4>Location</h4>
            </li>
            <li class="collection-item">KNHS</li>
            <li class="collection-item">Moi Avenue </li>
            <li class="collection-item">Nairobi KE, 55555</li>
          </ul>
        </div>
        <div class="col s12 m6">
          <div class="card-panel grey lighten-3">
            <h5>Please fill out this form</h5>
            <div class="input-field">
              <input type="text" placeholder="Name" id="name">
              <label for="name">Name</label>
            </div>
            <div class="input-field">
              <input type="email" placeholder="Email" id="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <input type="text" placeholder="Phone" id="phone">
              <label for="phone">Phone</label>
            </div>
            <div class="input-field">
              <textarea class="materialize-textarea" placeholder="Enter Message" id="message"></textarea>
              <label for="message">Message</label>
            </div>
            <input type="submit" value="Submit" class="btn">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="section teal darken-2 white-text center">
    <p class="flow-text">Kenya Health Services &copy; 2018</p>
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
  </script>

	</div>
</body>
</html>