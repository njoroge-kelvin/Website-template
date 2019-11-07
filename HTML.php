<?php
  session_start();
  include('subscription.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="T.K.V" content="dev">
  <link rel="stylesheet" href="fontawesome-free-5.11.2-web/font/all.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="CSS.css">

  <title>My Blog</title>
</head>

<body id="body">

  <header class="header" style="background-image: url(images/header.JPG);">
    <nav id="my_navbar" class="my_navbar">
      <i class=" fas fa-power-off logo" style="opacity: 1; padding-top: 3rem;"></i>
      <i class="items fa fa-bars" id="show_menu"></i>

      <ul class="list" id="list" style="opacity: 1; padding: 3rem 4rem; margin: 0;">
        <li id="items" class="items"> <a href="#about">about</a></li>
        <li id="items" class="items"> <a href="#photos">photos</a></li>
        <li id="items" class="items"> <a href="#events">hobbies</a></li>
        <li id="items" class="items"> <a href="contact">events</a></li>
        <li id="items" class="items"><button class="button" ><?php echo $_SESSION["email"]; ?></button></li>
      </ul>
    </nav>

    <div class="quote">
      <p>Welcome to my world. <br />
        <span>*Hello world!*</span></p>
    </div>
  </header>
  
  <h1 style="padding-top: 5%;" id="about">about</h1>
  <div class="profile">
    <img src="images/purple.JPG" alt="" class="image_about">
  </div>
  <hr class="strike_through" style="margin: 0 25%;">
  <div class="about" >
    <p class="about_info" style="color: black;">
      Hmm!! I wouldn't say I'm antisocial, but its sarcastic to be writing on a social platform or even to be 
      writing at all. So I'm a bit social you can say that. Writing about yourself could be a test to knowing 
      who you even are, so as to share with others. So I tried to make my life fit a webpage to create an insight 
      that is a journey through school, job, work and a hell lot of 
      crazy fun. 
    </p>
    <p class="about_info" style="margin-top: 15px; color: black;">With my unhealthy eating habits and the home 
    workouts I couldnt say I have a really bad personality. I'm preety much about the good things in life and 
    being an art in my favouritism. Life is all about living once so I travel, I'm sometimes a serious book-reader 
    and love camping out or just a bask at the warm coastal beaches.
    </p>
    
  </div>
  
  <div style="background-color: rgb(241, 248, 252);"> 
      <h1 style="padding-top: 5%; padding-bottom: 5%; " id="photos"> photos</h1>
      <div id="carouselExampleControls" class="carousel slide" style="padding-top: 2%; padding-bottom: 10%; object-fit: cover;" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/bakgroun.PNG" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/hear.JPG" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/flash.JPG" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" style="color: black;" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" style="color: black;" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    
  </div>
  
  <div class="card_wrapper" style="padding-top: 0;" id="events">
    <div class="card">
      <img src="images/hike.jpg" alt="flash image" class="background-img">
      <h1>Mara Hike</h1>
      <p class="job-title">3 Day Tour</p>
      <p class="about">Went out with my dog for food hunting. This is my best therapy,
        I couldn't resist!...
      </p>
    </div>


    <div class="card">
      <img src="images/office.jpg" alt="flash image" class="background-img">
      <h1>Dev Fest </h1>
      <p class="job-title">Annual Summit</p>
      <p class="about">Held just 3km away from my house, how could I miss the codes 
        and crazy tech talk...
    </div>

    <div class="card" style="margin-bottom: 0;">
      <img src="images/android.jpg" alt="flash image" class="background-img">
      <h1>School Clinic</h1>
      <p class="job-title">Community Development</p>
      <p class="about">Volunteered at the school clinic and of all traits I acquired 
        are of good public relation. Was a hell lot of fun...
      </p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small indigo" id="contact">
    <div class="container" style="padding-top: 10px;">
      <p style="font-size: 2em; color: black;  font-weight: 500; font-family: italic;"> Stay in touch:</p>
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">

        <div class="row icons pb-3" style="text-align: center; font-size: 2em; margin: 0 20px;">

          <div class="col-md-12 col-lg-12">

            <div class=" flex-center">
              <a class="fb-ic">
                <i class="fab fa-facebook-f fa-lg white-text"> </i>
              </a>

              <a class="tw-ic">
                <i class="fab fa-twitter fa-lg white-text"> </i>
              </a>

              <a class="gplus-ic">
                <i class="fab fa-google-plus-g fa-lg white-text"> </i>
              </a>

              <a class="li-ic">
                <i class="fab fa-linkedin-in fa-lg white-text"> </i>
              </a>

              <a class="ins-ic">
                <i class="fab fa-instagram fa-lg"> </i>
              </a>

              <a class="pin-ic">
                <i class="fab fa-pinterest fa-lg"> </i>
              </a>

            </div>

          </div>
        </div>

      </div>
      <!-- Grid row-->
      <hr class="rgba-white-light" style="margin: 0 15%;">

      <!-- Material form subscription -->
      <div class="card-house mt-5">
        <div class="card1">

          <h5 class="card-header info-color white-text text-center py-4">
            <strong>Subscribe</strong>
          </h5>

          <!--Card content-->
          <div class="card-body px-lg-5">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" method="POST">

              <p>Stay Up To Date on my_events..</p>
              
              <!-- Name -->
              <div class="md-form mt-3">
                <input type="text" name="sub_name" class="form-control">
                <label for="subname">Name</label>
              </div>

              <!-- E-mai -->
              <div class="md-form">
                <input type="email" name="sub_email" class="form-control">
                <label for="subemail">E-mail</label>
              </div>

              <!-- Sign in button -->
              <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" 
              type="submit" name="signin">Signin</button>

            </form>
            <!-- Form -->

          </div>

        </div>
      </div>

      <!-- Material form subscription -->

    </div>

    <hr class="clearfix d-md-none rgba-white-light" style="margin: 5% 3%;">

    <div class="footer-copyright text-center py-3">© 2030 Copyright:
      <a href="#"> MYBLOG.com</a>
    </div>

  </footer>
  <!-- Footer -->
  <script src="CombinedScroll\jquery.combinedscroll"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="jquery-3.4.1.min.js"></script>

</body> 

</html> 