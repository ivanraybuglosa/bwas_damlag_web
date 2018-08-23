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

        p {
            text-indent: 50px;
            line-height: 30px;
        }
        </style>
    </head>
    <body>
        <?php include_once('navbar.php'); ?>
        <div class="container top">
            <div class="row">
                <div class="column">
                    <img src="images/roger.jpg" class="image">
                    <h1>Roger Jaime B. Ramos</h1>
                    <h2>LEAD PROGRAMMER</h2>
                    <h2>21 - USLS</h2>
                </div>
                <div class="column">
                    <img src="images/vince.jpg" class="image">
                    <h1>Vince Arthur I. Tolentino</h1>
                    <h2>SYSTEMS ANALYST</h2>
                    <h2>21 - USLS</h2>
                </div>
                <div class="column">
                    <img src="images/xenon.jpg" class="image">
                    <h1>Xenon S. Debulgado</h1>
                    <h2>ASST PROGRAMMER</h2>
                    <h2>21 - USLS</h2>
                </div>
            </div>
        </div>
    </body>
</html>