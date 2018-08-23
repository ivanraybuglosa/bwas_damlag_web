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

        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: 10px auto;
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
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active {
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

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
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
    </div>

    <div class="mySlides fade">
    <div class="numbertext">2 / 14</div>
    <img src="images/2.jpg" style="width:100%">
    </div>


    <div class="mySlides fade">
    <div class="numbertext">3 / 14</div>
    <img src="images/3.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">4 / 14</div>
    <img src="images/4.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">5 / 14</div>
    <img src="images/5.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">6 / 14</div>
    <img src="images/6.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">7 / 14</div>
    <img src="images/7.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">8 / 14</div>
    <img src="images/8.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">9 / 14</div>
    <img src="images/9.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">10 / 14</div>
    <img src="images/10.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">11 / 14</div>
    <img src="images/11.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">12 / 14</div>
    <img src="images/12.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">13 / 14</div>
    <img src="images/13.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <div class="numbertext">14 / 14</div>
    <img src="images/14.jpg" style="width:100%">
    </div>

    <br>

    <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span>
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span>  
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    </div>


    <div class="container about">
    <h1>Buas Damlag</h1>
    <hr>
    <p>
    <h3>Summary</h3>
        <p>Helping student athletes continue their academic and sports careers by providing a web and mobile application, 
            and improve their education. These student athletes are from the town of Bacolod City full of talent and skills 
            to excel as a varsity and professional sport player in their own respective fields.
        </p>
    <h3>Challenge</h3>
        <p>Bacolod City and its neighboring towns are full of young people full of raw sports talents. However, 
            these individuals are not provided with full access to sports training and equipment that could better equip them 
            with the necessary skills and mindset to pursue professional sports and academic careers. Student athletes are given 
            the basics to sports life- one that is both promising and fulfilling.
        </p>
    <h3>Solution</h3>
        <p>The project aims to provide quality sports and academic life to student athletes. With little or no access to opportunities,
            the project will help elevate the status of local sports. Not to mention the fact that it will help them improve their
             academic standing thereby not only helping themselves, but their parents and community as well.
        </p>
    <h3>Long-Term Impact</h3>
        <p>On a long-term basis, this project will help student athletes pursue a College Degree and sports career at the same time. 
            Taking note the local community adoption process, this project will enable to kickstart a new trend in local sports 
            development in the Bacolod City. With a strong network already established.
        </p>
    </div>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
    </body>
</html>