<?php
require 'DBcon/dbcon.php';

$query = "SELECT * FROM about LIMIT 1";
$result = mysqli_query($con, $query);
$about = mysqli_fetch_assoc($result);


$query = "SELECT * FROM gallery_images";
$result = mysqli_query($con, $query);


// Fetch unread notifications
$notif_query = "SELECT * FROM notifications WHERE status = 'unread'";
$notif_result = mysqli_query($con, $notif_query);
$notifications = [];
while ($row = mysqli_fetch_assoc($notif_result)) {
    $notifications[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elias Private Pool Rental</title>
    <link rel="stylesheet" href="Css/style.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <!-- Add the Font Awesome CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>

     <header class="header">

            <a href="#" class="logo"> <i class="fas fa-house-flood-water"></i>Elias Resort</a>
            
            <nav class="navbar" id="nav-links">
                <a href="#home" class="navButton">Home</a>
                <a href="#about" class="navButton">About Us</a>
                <a href="#room" class="navButton">Room</a>
                <a href="#gallery" class="navButton">Gallery</a>
                <a href="#amenities" class="navButton">Amenities</a>
                <a href="#faqs" class="navButton">FAQs</a>
                <a href="#contactUs" class="navButton">Contact Us</a>
            </nav>

            <div class="icon" id="Icon">
            <a href="#search"><i class="fas fa-search" id="search-btn"></i></a>
            <a href="javascript:void(0);" id="notification-btn"><i class="fas fa-bell"></i></a>
            <div class="notification-popup" id="notificationPopup" style="display: none;">
            <?php if (!empty($notifications)): ?>
        <?php foreach ($notifications as $notification): ?>
            <p><?php echo $notification['message']; ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No notifications</p>
    <?php endif; ?>
             </div>
           </div>


            <form id="searchForm" class="search-bar-container">
                 <input type="search" id="search-bar" placeholder="Search here...">
                 <label for="search-bar" id="search-icon" class="fa fa-search"></label>
            </form>

            <div id="menu-btn" class="fas fa-bars"></div>
        </header>
        

        <!-- Home Page -->
    
    <section class="home" id="home">
      
         <div class="swiper home-slider">

            <div class="swiper-wrapper">
                 
                <div class="swiper-slide slide" style="background:linear-gradient(to left,rgba(70, 84, 152, 0.2), rgba(161, 178, 247, 0.2)), url(Images/home1.jpeg) no-repeat;">
                   <div class="content">
                    <h3><span>Welcome to</span><br> Elias Private Pool Rental</h3>
                    <a href="bookingform.php" class="btn">BOOK NOW</a>
                   </div>
                </div>

                <div class="swiper-slide slide" style="background:linear-gradient(to left,rgba(36, 47, 99, 0.2), rgba(81, 115, 253, 0.2)),  url(Images/home2.jpeg) no-repeat;">
                    <div class="content">
                     <h3><span>Welcome to </span><br> Elias Private Pool Rental</h3>
                     <a href="bookingform.php" class="btn">BOOK NOW</a>
                    </div>
                 </div>

                 <div class="swiper-slide slide" style="background:linear-gradient(to left,rgba(36, 47, 99, 0.2), rgba(81, 115, 253, 0.2)),  url(Images/home3.jpg) no-repeat;">
                    <div class="content">
                     <h3><span>Welcome to</span> <br> Elias Private Pool Rental</h3>
                     <a href="bookingform.php" class="btn">BOOK NOW</a>
                    </div>
                 </div>

                 <div class="swiper-slide slide" style="background:linear-gradient(to left,rgba(12, 26, 105, 0.3), rgba(50, 91, 252, 0.3)),  url(Images/home4.jpeg) no-repeat;">
                    <div class="content">
                     <h3><span>Welcome to</span> <br> Elias Private Pool Rental</h3>
                     <a href="bookingform.php" class="btn">BOOK NOW</a>
                    </div>
                 </div>

                 <div class="swiper-slide slide" style="background:linear-gradient(to left,rgba(36, 47, 99, 0.2), rgba(81, 115, 253, 0.2)),  url(Images/home5.jpeg) no-repeat;">
                    <div class="content">
                     <h3><span>Welcome to</span> <br> Elias Private Pool Rental</h3>
                     <a href="bookingform.php" class="btn">BOOK NOW</a>
                    </div>
                 </div>
            </div>
          
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
         </div>

    </section>    

    <!-- About page -->
    <section class="about" id="about">
        <div class="row">
            <div class="image">
                <img src="Images/aboutimg.jpg" alt="">
            </div>
            <div class="content">
                <h3 class="heading">About us</h3>
                <p>Welcome to Elias Private Pool Rental, located in Pansol, Calamba City, Laguna.  A lukewarm water temperature can be quite pleasant for swimming or relaxing. </p>
                <p>At Elias Private Resort, we believe in creating moments that last a lifetime. Whether it's a family vacation, or a solo retreat, our dedicated team is here to ensure your stay is nothing short of exceptional. Join us and discover the magic of Elias Private Resort, where every day is an opportunity to explore, relax, and create new memories.</p>
            </div>
        </div>
    </section>
<!-- <section class="about" id="about">
    <div class="row">
        <div class="image">
            <img src="<?= isset($about['image_path']) ? $about['image_path'] : 'Images/default.jpg' ?>" alt="">
        </div>
        <div class="content">
            <h3 class="heading">About us</h3>
            <p class="description"><?= isset($about['description']) ? nl2br($about['description']) : 'Default description about Elias Private Resort.' ?></p>
        </div>
    </div>
</section> -->

    <!-- Room Page -->
    <section class="room" id="room"> 
        
    <h1 class="heading">Our Room</h1>
        <div class="swiper room-slider">

         <div class="swiper-wrapper">

               <div class="swiper-slide slide">
                   <div class="images">
                      <img src="Images/room1.bg.jpg" alt="">
                   </div>
                   <div class="content">
                    <h3>Guest Room 1</h3>
                    <p>One double deck bed</p>
                    <a href="bookingform.php" class="btn">BOOK NOW</a>
                   </div>
               </div>
               
               <div class="swiper-slide slide">
                <div class="images">
                   <img src="Images/room2.bg.jpg" alt="">
                </div>
                <div class="content">
                 <h3>Guest Room 2</h3>
                 <p>One double deck bed</p>
                 <a href="bookingform.php" class="btn">BOOK NOW</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="images">
                   <img src="Images/room3.jpg" alt="">
                </div>
                <div class="content">
                 <h3>Guest Room 3</h3>
                 <p>Three double deck bed</p>
                 <a href="bookingform.php" class="btn">BOOK NOW</a>
                </div>
            </div>
            <div class="swiper-slide slide">
                <div class="images">
                   <img src="Images/room4.bg.jpg" alt="">
                </div>
                <div class="content">
                 <h3>Guest Room 4</h3>
                 <p>Four double deck bed</p>
                 <a href="bookingform.php" class="btn">BOOK NOW</a>
                </div>
            </div>
        </div>
            
            <div class="swiper-pagination"></div>

         </div>

    </section>

<!-- <?php 
$query = "SELECT * FROM gallery_images";
$result = mysqli_query($con, $query);
?> -->
    <!-- Gallery -->
    <!-- <section class="gallery" id="gallery">
        <h1 class="heading">Our Gallery</h1>
        <div class="swiper gallery-slider">
            <div class="swiper-wrapper">
                <?php
                $galleryQuery = "SELECT * FROM gallery_images";
                $galleryResult = mysqli_query($con, $galleryQuery);
                while ($galleryRow = mysqli_fetch_assoc($galleryResult)) {
                    echo '<div class="swiper-slide slide">';
                    echo '<img src="../Gallery/' . $galleryRow['image_path'] . '" alt="">';
                    echo '<div class="icon"><i class="fas fa-magnifying-glass"></i></div>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div> -->
    <section class="gallery" id="gallery">

        <h1 class="heading">our gallery</h1>

          <div class="swiper gallery-slider">
            
            <div class="swiper-wrapper">
               
                <div class="swiper-slide slide">
                    <img src="Images/gallery1.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery2.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery3.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery4.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery5.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery6.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery7.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery8.jpeg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/restroom1.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/restroom2.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery9.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <img src="Images/gallery10.jpg" alt="">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
    </section>


    <!-- Amenities -->
    <section class="amenities" id="amenities">
        
        <h1 class="heading">Amenities</h1>

        <div class="box-container">
           
            <div class="box">
              <img src="Images/swimming.png" alt="">
              <h3>Swimming Pool</h3>
            </div>

            <div class="box">
                <img src="Images/water-temperature.png" alt="">
                <h3>Luke Warm</h3>
              </div>

              <div class="box">
                <img src="Images/air-conditioner.png" alt="">
                <h3>Air Conditioner</h3>
              </div>

              <div class="box">
                <img src="Images/refrigerator.png" alt="">
                <h3>Refrigerator</h3>
              </div>

              <div class="box">
                <img src="Images/wifi.png" alt="">
                <h3>Wifi</h3>
              </div>

              <div class="box">
                <img src="Images/karaoke.png" alt="">
                <h3>Videoke</h3>
              </div>

              <div class="box">
                <img src="Images/gas-stove.png" alt="">
                <h3>Gas Stove</h3>
              </div>

              <div class="box">
                <img src="Images/garage-car.png" alt="">
                <h3>Parking</h3>
              </div>

        </div>
    </section>

    <!-- FAQS -->
    <section class="faqs" id="faqs">

         <h1 class="heading">frequently asked questions</h1>

         <div class="row">

            <div class="image">
            <img src="Images/faqs-img-unscreen.gif" alt="">
            </div>

         <div class="content">
             
            <div class="box active">
               <h3>WHAT PAYMENT METHODS ARE AVAILABLE?</h3>
               <p>Payment can be made through GCash, the most convenient way to pay online, and Cash.</p>
            </div>
            
            <div class="box">
                <h3>HOW MUCH? DO YOU HAVE ANY DISCOUNTS OR OFFERS?</h3>
                <p>Discover our discounts and special offers! Contact us through the contact section to find out more.</p>
             </div>

             <div class="box">
                <h3>HOW MANY GUESTS CAN OUR RESORT ACCOMMODATE?</h3>
                <p>Our resort can comfortably accommodate up to 60 guests for day use and 30 guests for overnight stays.</p>
             </div>


             <div class="box">
                <h3>LOOKING FOR CONVENIENT GROCERY STORES NEARBY?</h3>
                <p>Discover Rowena's sari-sari store, Open 24/7, your one-stop shop for all your essentials!</p>
             </div>

             <div class="box">
                <h3>CAN PETS COME TO THE RESORT?</h3>
                <p>The resort warmly welcomes pets, but please don't let them swim in the pool.</p>
             </div>


          </div>
        </div>
    </section>


    <!-- Contact -->
    <section class="contactUs" id="contactUs">
        <div class="contact-bg">
            <h1 class="heading">Contact Us</h1>
        </div>
    
        <div class="box">
            <div class="contact form">
                <h2 class="sub-heading">Send a Message</h2>
                <form action="contact-con.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="firstName" required>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="5"  placeholder="Write your Message here..." class="form-control" name="message" required></textarea>
                    </div>
                    <input type="submit" class="btns"  value="Send Message">
                </form>
            </div>
    
            <div class="contact info">

                <div class="info-item">
                    <span><i class="fas fa-envelope-open"></i></span>
                    <span class="name">E-mail</span>
                    <a href="mailto:eliasprivatepoolrental@gmail.com" class="text"><br>eliasprivatepoolrental@gmail.com</a>
                </div>

                <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i></span>
                    <span class="name">Address</span>
                    <span class="text"><br>939 Kamagong Street, Calamba, 4027 Laguna</span>
                </div>

                <div class="info-item">
                    <span><i class="fas fa-mobile-alt"></i></span>
                    <span class="name">Phone No.</span>
                    <a href="tel:09675511396" class="text"><br>09675511396</a>
                </div>
            </div>
    
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3868.302381261911!2d121.18613957460305!3d14.177059386260625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                     1!3m3!1m2!1s0x33bd616b63e92ac3%3A0x59e3798322786e3!2sElias%20Resort!5e0!3m2!1sen!2sph!4v1710933549125!5m2!1sen!2sph" 
                     style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <section class="footer">
    <div class="share">
        <a href="https://www.facebook.com/profile.php?id=61559871845817" class="fab fa-facebook"></a>
        <a href="https://www.instagram.com/eliaspoolrental/" class="fab fa-instagram"></a>
        <a href="https://www.youtube.com/channel/UCQULPo2jBRmKH6DVy1vuysg" class="fab fa-youtube"></a>
    </div>

    <div class="credit">&copy; Copyright @ 2024 By <span>elias private pool rental</span></div>
</section>




    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     <script src="Js/main.js"></script>
</body>
</html>