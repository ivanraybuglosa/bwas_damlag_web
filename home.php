<?php
    include_once('web_db.php');
    include_once('authentication.php');
?>
<html>
    <head>
        <title>Home</title>
        <link href="styles.css" rel="stylesheet" />
        <link href="fontawesome.min.css" rel="stylesheet" />
        <style>
        * {box-sizing:border-box}

        /* Slideshow container */
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        margin-top: 30px;
        }

        .about {
            max-width: 1000px;
            margin: auto;
            text-align: justify;
        }

        h1 {
            text-align: center;
        }

        p {
            text-indent: 50px;
            line-height: 30px;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }
        </style>
    </head>
    <body>
    <?php include_once('navbar.php'); ?>

     <!-- Slideshow container -->
    <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
    <div class="numbertext">1 / 14</div>
    <img src="images/1.jpg" style="width:100%">
    <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">2 / 14</div>
    <img src="images/2.jpg" style="width:100%">
    <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">3 / 14</div>
    <img src="images/3.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">4 / 14</div>
    <img src="images/4.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">5 / 14</div>
    <img src="images/5.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">6 / 14</div>
    <img src="images/6.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">7 / 14</div>
    <img src="images/7.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">8 / 14</div>
    <img src="images/8.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">9 / 14</div>
    <img src="images/9.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">10 / 14</div>
    <img src="images/10.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">11 / 14</div>
    <img src="images/11.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">12 / 14</div>
    <img src="images/12.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">13 / 14</div>
    <img src="images/13.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">14 / 14</div>
    <img src="images/14.jpg" style="width:100%">
    <div class="text">Caption Three</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>


    <div class="container about">
    <h1>About Bwas Damlag</h1>
    <hr>
    <p>
        Sports have become a major business and attraction for the Filipino public. 
        The print, radio, television, internet, and cinema media have contributed to 
        the explosive popularity of both professional and collegiate sports. It is not surprising, 
        therefore, that the popularity of professional and collegiate sports has been reflected in the 
        sports programs of Filipino schools. The reality is that playing sports in college is very challenging 
        and very few students end up doing so. University presidents and college coaches have battled over the 
        academic requirements necessary to receive athletic scholarships, eligibility requirements, and even the 
        advising of student athletes.
    </p> 
    <p>
	    Understanding the recruitment process can be very helpful to make sure that the athlete can get into the 
        right college and in the right situation in the end. A regular cause of concern is that when the rest of 
        the University has little contact with prospective student athletes until late in the recruiting process. 
        The interests of recruited student athletes and the institutions they attended are better served when recruiting 
        is grounded in the full process. Without having an experience guide, an athlete can be lost in complicated world 
        of sports recruitment. To be considered a recruited aspiring athlete, athletes must be approached by a college coach 
        or representative about participating in that college athletics program, guidelines specify how and when they can be 
        contacted. Letters, telephone calls, and in person conversations are limited to certain frequency. We thus explore the
        athletics recruiting of aspiring athletes with a view towards conceptualizing it, giving an approach that improves the 
        process across universities as a whole by enhancing transparency.
    </p>
    </div>
    <script>
    var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i
        ].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }
    </script>
    </body>
</html>