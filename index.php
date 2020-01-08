<?php 
include('functions.php');
// session_start();

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
              <a href="#search">Search</a>
            </li>
            <li>
              <a href="#level 5 hospitals">level 5 Hospitals</a>
            </li>
            <li>
            <a href="myrecords.php">Diagnosis records</a>
            </li>
            <li>
            <a href="myapps.php">Appointment records</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
            <li>
              welcome<span style="color: black; size: 10px;"><?php echo $_SESSION['lname']; ?></span>
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
    <li>
      <a href="#search">Search</a>
    </li>
    <li>
      <a href="#level 5 hospitals">Level 5 hospitals</a>
    </li>
    <li>
    <a href="myrecords.php">view my records</a>
    </li>
    <li>
      <a href="#contact">Contact</a>
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
  <section id="search" class="section section-search teal darken-1 white-text center scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h3>Search for services</h3>
          <div class="input-field">
            <input class="white grey-text autocomplete" placeholder="hospitals, in patient,emergency, etc..." type="text" id="autocomplete-input">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: level 5 hospitals -->
  <section id="level 5 hospitals" class="section section-popular scrollspy">
    <div class="container">
      <div class="row">
        <h4 class="center">
          <span class="teal-text">level 5 </span> Hospitals</h4>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="./images/nairobi.jpg">
              <span class="card-title">Nairobi Hospital</span>
            </div>
            <div class="card-content">
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas aliquid fugiat corporis laudantium, architecto
                delectus?
              </p>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="./images/aga.jpg">
              <span class="card-title">The Aga Khan Hospital</span>
            </div>
            <div class="card-content">
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas aliquid fugiat corporis laudantium, architecto
                delectus?
              </p>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="./images/knh.jpg">
              <span class="card-title">Kenyatta National Hospital</span>
            </div>
            <div class="card-content">
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas aliquid fugiat corporis laudantium, architecto
                delectus?
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Section: Follow -->
  <section class="section section-follow teal darken-2 white-text center">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h4>Follow Kenya Health Services</h4>
          <p>Follow us on social media for updates and news on matters health</p>
          <a href="htttps://facebook.com" target="_blank" class="white-text">
            <i class="fab fa-facebook fa-4x">facebook</i>
          </a>
          <a href="htttps://twitter.com" target="_blank" class="white-text">
            <i class="fab fa-twitter fa-4x">twitter</i>
          </a>
          <a href="htttps://linkedin.com" target="_blank" class="white-text">
            <i class="fab fa-linkedin fa-4x">linkedin</i>
          </a>
          <a href="htttps://googleplus.com" target="_blank" class="white-text">
            <i class="fab fa-google-plus fa-4x">google+</i>
          </a>
          <a href="htttps://pinterest.com" target="_blank" class="white-text">
            <i class="fab fa-pinterest fa-4x">pinterest</i>
          </a>
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
