 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--=============== FAVICON ===============-->
     <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

     <!--=============== BOXICONS ===============-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

     <!--=============== SWIPER CSS ===============-->
     <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

     <!--=============== CSS ===============-->
     <link rel="stylesheet" href="assets/css/styles.css">

     <title>Footwear Frenzy</title>
 </head>

 <body>
     <?php
        include_once("config/config.php");
        include_once("config/db.php");

        // if 
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // if (CRUD)
        if (!empty($_SESSION['accounts'])) {
            $account = $_SESSION['accounts'];
        }

        ?>

     <!--==================== HEADER ====================-->
     <header class="header" id="header">
         <nav class="nav container">
             <a href="index.php" class="nav__logo">
                 <i></i> Footwear Frenzy
             </a>

             <div class="nav__menu" id="nav-menu">
                 <ul class="nav__list">
                     <li class="nav__item">
                         <a href="#home" class="nav__link active-link">Home</a>
                     </li>
                     <li class="nav__item">
                         <a href="#featured" class="nav__link">Featured</a>
                     </li>
                     <li class="nav__item">
                         <a href="#products" class="nav__link">Products</a>
                     </li>
                     <li class="nav__item">
                         <a href="#new" class="nav__link">New</a>
                     </li>
                 </ul>

                 <div class="nav__close" id="nav-close">
                     <i class='bx bx-x'></i>
                 </div>
             </div>

             <div class="nav__btns">
                 <!-- Theme change button -->
                 <i class='bx bx-moon change-theme' id="theme-button"></i>

                 <div class="nav__shop" id="cart-shop">
                     <i class='bx bx-shopping-bag'></i>
                 </div>

                 <div class="nav__toggle" id="nav-toggle">
                     <i class='bx bx-grid-alt'></i>
                 </div>

                 <div class="nav__shop" id="login-button">
                     <i class='bx bxs-user'></i>
                 </div>
             </div>
         </nav>
        
         <div class="email-container" id="email-container">
             <!-- if-else -->
             <?php if (isset($account)) : ?>
                 <div class="email-value"><?= $account['email'] ?></div>
                 <div class="update-profile-container">
                     <a href="login-form-new/change-password.php">Change Password</a>
                 </div>
                 <div class="logout-container"><a href="logout.php">Logout</a></div>
                 <div class="update-profile-container">
                     <a href="login-form-new/delete-account.php">Delete Account</a>
                 </div>
             <?php else : ?>
                 <div class="login-container">
                     <a href="login-form-new/login.php">Login</a>
                 </div>
             <?php endif; ?>
         </div>
     </header>

     <!--==================== CART ====================-->
     <div class="cart" id="cart">
         <i class='bx bx-x cart__close' id="cart-close"></i>

         <h2 class="cart__title-center">My Cart</h2>

         <div class="cart__container">
             <!-- to be populated by the carts.js -->
         </div>

         <div class="cart__prices">
             <span class="cart__prices-item">3 items</span>
             <span class="cart__prices-total">$2880</span>
         </div>
     </div>

     <!--==================== MAIN ====================-->
     <main class="main">
         <!--==================== HOME ====================-->
         <section class="home" id="home">
             <div class="home__container container grid">
                 <div class="home__img-bg">
                     <img src="assets/img/home.jpg" alt="" class="home__img">
                 </div>

                 <div class="home__social">
                     <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                         Facebook
                     </a>
                     <a href="https://twitter.com/" target="_blank" class="home__social-link">
                         Twitter
                     </a>
                     <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                         Instagram
                     </a>
                 </div>

                 <div class="home__data">
                     <h1 class="home__title">NEW JORDAN 1 <br> HIGH BREAD TOE</h1>
                     <p class="home__description">
                         Introducing the latest arrival of the highly sought-after Jordan 1 High Bred Toe sneakers,
                         combining iconic style and unparalleled quality.
                     </p>
                     <span class="home__price">Php 20,000</span>

                     <div class="home__btns">
                         <a href="https://www.gq.com/story/air-jordan-1-bred-toe-release-2018" target="_blank" class="button button--gray button--small">
                             Discover
                         </a>

                         <button class="button home__button">ADD TO CART</button>
                     </div>
                 </div>
             </div>
         </section>

         <!--==================== FEATURED ====================-->
         <section class="featured section container" id="featured">
             <h2 class="section__title">
                 Featured
             </h2>

             <div class="featured__container grid">
                 <article class="featured__card">
                     <span class="featured__tag">Sale</span>

                     <img src="assets/img/flyby.png" alt="" class="featured__img">

                     <div class="featured__data">
                         <h3 class="featured__title">Nike Flyby 3</h3>
                         <span class="featured__price">Php 4,500</span>
                     </div>

                     <button class="button featured__button">ADD TO CART</button>
                 </article>

                 <article class="featured__card">
                     <span class="featured__tag">Sale</span>

                     <img src="assets/img/elevate.png" alt="" class="featured__img">

                     <div class="featured__data">
                         <h3 class="featured__title">Nike Renew Elevate 3</h3>
                         <span class="featured__price">Php 5,200</span>
                     </div>

                     <button class="button featured__button">ADD TO CART</button>
                 </article>

                 <article class="featured__card">
                     <span class="featured__tag">Sale</span>

                     <img src="assets/img/ride.png" alt="" class="featured__img">

                     <div class="featured__data">
                         <h3 class="featured__title">Nike Renew Ride 3</h3>
                         <span class="featured__price">Php 4995</span>
                     </div>

                     <button class="button featured__button">ADD TO CART</button>
                 </article>
             </div>
         </section>

         <!--==================== STORY ====================-->
         <section class="story section container">
             <div class="story__container grid">
                 <div class="story__data">
                     <h2 class="section__title story__section-title">
                         Our Story
                     </h2>

                     <h1 class="story__title">
                         Inspirational Sneaker Of <br> The Year
                     </h1>

                     <p class="story__description">
                         Introducing the Air Jordan I High G Midnight Navy sneakers, the latest and most modern footwear of this year.
                         These sneakers are available in various eye-catching presentations at this store.
                     </p>

                     <a href="https://sneakernews.com/2022/10/23/air-jordan-1-high-golf-white-metallic-silver-midnight-navy-dq0660-100/" target="_blank" class="button button--small">Discover</a>
                 </div>

                 <div class="story__images">
                     <img src="assets/img/highg.png" alt="" class="story__img">
                     <div class="story__square"></div>
                 </div>
             </div>
         </section>

         <!--==================== PRODUCTS ====================-->
         <section class="products section container" id="products">
             <h2 class="section__title">
                 Products
             </h2>

             <div class="products__container grid">
                 <article class="products__card">
                     <img src="assets/img/retro.png" alt="" class="products__img">

                     <h3 class="products__title">Nike Dunk High Retro Premium</h3>
                     <span class="products__price">Php 23,000</span>

                     <button class="products__button">
                         <i class='bx bx-shopping-bag'></i>
                     </button>
                 </article>

                 <article class="products__card">
                     <img src="assets/img/flyease.png" alt="" class="products__img">

                     <h3 class="products__title">Air Jordan 1 Low FlyEase</h3>
                     <span class="products__price">Php 8,300</span>

                     <button class="products__button">
                         <i class='bx bx-shopping-bag'></i>
                     </button>
                 </article>

                 <article class="products__card">
                     <img src="assets/img/take4.png" alt="" class="products__img">

                     <h3 class="products__title">Jordan One Take 4 PF</h3>
                     <span class="products__price">Php 12,000</span>

                     <button class="products__button">
                         <i class='bx bx-shopping-bag'></i>
                     </button>
                 </article>

                 <article class="products__card">
                     <img src="assets/img/courtvision.png" alt="" class="products__img">

                     <h3 class="products__title">Nike Court Vision Low Next Nature</h3>
                     <span class="products__price">Php 3,900</span>

                     <button class="products__button">
                         <i class='bx bx-shopping-bag'></i>
                     </button>
                 </article>

                 <article class="products__card">
                     <img src="assets/img/sbforce.png" alt="" class="products__img">

                     <h3 class="products__title">Nike SB Force 58</h3>
                     <span class="products__price">Php 5,200</span>

                     <button class="products__button">
                         <i class='bx bx-shopping-bag'></i>
                     </button>
                 </article>
             </div>
         </section>

         <!--==================== TESTIMONIAL ====================-->
         <section class="testimonial section container">
             <div class="testimonial__container grid">
                 <div class="swiper testimonial-swiper">
                     <div class="swiper-wrapper">
                         <div class="testimonial__card swiper-slide">
                             <div class="testimonial__quote">
                                 <i class='bx bxs-quote-alt-left'></i>
                             </div>
                             <p class="testimonial__description">
                                 They are the best Nike shoes that one can acquire, always incorporating the latest news and trends in footwear. With their exceptional comfort and competitive pricing, these Nike shoes are a must-have for any sneaker enthusiast.
                                 Moreover, the attention you receive from the store is unparalleled, as they are always attentive to your questions and provide excellent customer service.
                             </p>
                             <h3 class="testimonial__date">March 27. 2021</h3>

                             <div class="testimonial__perfil">
                                 <img src="assets/img/john.jpg" alt="" class="testimonial__perfil-img">

                                 <div class="testimonial__perfil-data">
                                     <span class="testimonial__perfil-name">John Donahoe</span>
                                     <span class="testimonial__perfil-detail">Nike Chief Executive Officer</span>
                                 </div>
                             </div>
                         </div>

                         <div class="testimonial__card swiper-slide">
                             <div class="testimonial__quote">
                                 <i class='bx bxs-quote-alt-left'></i>
                             </div>
                             <p class="testimonial__description">
                                 Nike shoes are renowned for being the pinnacle of athletic footwear, consistently delivering exceptional quality and performance. Just like the best watches one can acquire, Nike shoes embody a perfect blend of style and functionality.
                                 With their cutting-edge designs and constant innovation, Nike stays ahead of the game by keeping up with the latest news and trends in the sneaker industry.
                             </p>
                             <h3 class="testimonial__date">February 2. 2021</h3>

                             <div class="testimonial__perfil">
                                 <img src="assets/img/peter.jpg" alt="" class="testimonial__perfil-img">

                                 <div class="testimonial__perfil-data">
                                     <span class="testimonial__perfil-name">Peter Henry</span>
                                     <span class="testimonial__perfil-detail">Nike Board of Director</span>
                                 </div>
                             </div>
                         </div>

                         <div class="testimonial__card swiper-slide">
                             <div class="testimonial__quote">
                                 <i class='bx bxs-quote-alt-left'></i>
                             </div>
                             <p class="testimonial__description">
                                 When it comes to customer experience, Nike goes above and beyond to provide exceptional service. Just like the attention you receive when acquiring the best watches, Nike is committed to delivering a personalized and attentive shopping experience. Whether you have questions about specific shoe models, sizing, or styling tips,
                                 the knowledgeable staff at Nike stores or their online platforms are always ready to assist you.
                             </p>
                             <h3 class="testimonial__date">April 22. 2023</h3>

                             <div class="testimonial__perfil">
                                 <img src="assets/img/thusanda.jpg" alt="" class="testimonial__perfil-img">

                                 <div class="testimonial__perfil-data">
                                     <span class="testimonial__perfil-name">Thusanda Brown</span>
                                     <span class="testimonial__perfil-detail">Nike Board of Director</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="swiper-button-next">
                         <i class='bx bx-right-arrow-alt'></i>
                     </div>
                     <div class="swiper-button-prev">
                         <i class='bx bx-left-arrow-alt'></i>
                     </div>
                 </div>

                 <div class="testimonial__images">
                     <div class="testimonial__square"></div>
                     <img src="assets/img/nike.png" alt="" class="testimonial__img">
                 </div>
             </div>
         </section>

         <!--==================== NEW ====================-->
         <section class="new section container" id="new">
             <h2 class="section__title">
                 New Arrivals
             </h2>

             <div class="new__container">
                 <div class="swiper new-swiper">
                     <div class="swiper-wrapper">
                         <article class="new__card swiper-slide">
                             <span class="new__tag">New</span>

                             <img src="assets/img/airmax.png" alt="" class="new__img">

                             <div class="new__data">
                                 <h3 class="new__title">Nike Air Max 97 SE</h3>
                                 <span class="new__price">Php 15,000</span>
                             </div>

                             <button class="button new__button">ADD TO CART</button>
                         </article>

                         <article class="new__card swiper-slide">
                             <span class="new__tag">New</span>

                             <img src="assets/img/airmax2.png" alt="" class="new__img">

                             <div class="new__data">
                                 <h3 class="new__title">Nike Air Max 90</h3>
                                 <span class="new__price">Php 13,000</span>
                             </div>

                             <button class="button new__button">ADD TO CART</button>
                         </article>

                         <article class="new__card swiper-slide">
                             <span class="new__tag">New</span>

                             <img src="assets/img/golf.png" alt="" class="new__img">

                             <div class="new__data">
                                 <h3 class="new__title">Nike Infinity Ace Next Nature NRG</h3>
                                 <span class="new__price">Php 6,200</span>
                             </div>

                             <button class="button new__button">ADD TO CART</button>
                         </article>

                         <article class="new__card swiper-slide">
                             <span class="new__tag">New</span>

                             <img src="assets/img/golf1.png" alt="" class="new__img">

                             <div class="new__data">
                                 <h3 class="new__title">Nike Air Zoom Victory Tour 3</h3>
                                 <span class="new__price">Php 5,800</span>
                             </div>

                             <button class="button new__button">ADD TO CART</button>
                         </article>
                     </div>
                 </div>
             </div>
         </section>

         <!--==================== NEWSLETTER ====================-->
         <section class="newsletter section container">
             <div class="newsletter__bg grid">
                 <div>
                     <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
                     <p class="newsletter__description">
                         Don't miss out on your discounts. Subscribe to our email
                         newsletter to get the best offers, discounts, coupons,
                         gifts and much more.
                     </p>
                 </div>

                 <form action="#home" class="newsletter__subscribe">
                     <input type="email" placeholder="Enter your email" class="newsletter__input">
                     <button class="button">
                         SUBSCRIBE
                     </button>
                 </form>
             </div>
         </section>
     </main>

     <!--==================== FOOTER ====================-->
     <footer class="footer section">
         <div class="footer__container container grid">
             <div class="footer__content">
                 <h3 class="footer__title">Our information</h3>

                 <ul class="footer__list">
                     <li>Ramon Alejandro Rodriguez</li>
                     <li>James Rodolfo L. Abalus</li>
                     <li>BSCS 3-B1</li>
                     <li>Computer Studies Department</li>
                 </ul>
             </div>
             <div class="footer__content">
                 <h3 class="footer__title">About Us</h3>

                 <ul class="footer__links">
                     <li>
                         <a href="#home" class="footer__link">Support Center</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">Customer Support</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">About Us</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">Copy Right</a>
                     </li>
                 </ul>
             </div>

             <div class="footer__content">
                 <h3 class="footer__title">Products</h3>

                 <ul class="footer__links">
                     <li>
                         <a href="#home" class="footer__link">Jordan</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">Zoom</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">Air Max</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">SB</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">Dunk</a>
                     </li>
                     <li>
                         <a href="#home" class="footer__link">Running</a>
                     </li>
                 </ul>
             </div>

             <div class="footer__content">
                 <h3 class="footer__title">Social</h3>

                 <ul class="footer__social">
                     <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                         <i class='bx bxl-facebook'></i>
                     </a>

                     <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                         <i class='bx bxl-twitter'></i>
                     </a>

                     <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                         <i class='bx bxl-instagram'></i>
                     </a>
                 </ul>
             </div>
         </div>

         <span class="footer__copy">&#169; Rodriguez-Abalus. All Rights Reserved 2023</span>
     </footer>

     <!-- if -->
     <?php if (isset($_GET['ad'])) : ?>
         <script>
             alert("Account deleted successfully");
         </script>
     <?php endif; ?>

     <!--=============== SCROLL UP ===============-->
     <a href="#" class="scrollup" id="scroll-up">
         <i class='bx bx-up-arrow-alt scrollup__icon'></i>
     </a>

     <!--=============== CARTS JS ===============-->
     <script src="assets/js/carts.js"></script>

     <!--=============== SWIPER JS ===============-->
     <script src="assets/js/swiper-bundle.min.js"></script>

     <!--=============== MAIN JS ===============-->
     <script src="assets/js/main.js"></script>
 </body>

 </html>