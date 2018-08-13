
<nav class="navbar">
    <div class="container">
    <strong><a class="brand-logo" href="home.php">BWAS DAMLAG</a></strong>
    <a href="home.php" class="list">HOME</a>
    <?php 
        if($current_user['type'] == 'Admin'){
    ?>
        <a href="index.php" class="list">USERS</a>
    <?php }else{ ?>
        <a href="index.php" class="list"><?php echo strtoupper($current_user['sport']);?> ATHLETES</a>
    <?php } ?>

    <?php 
        if($current_user['type'] == 'Admin'){
    ?>
        
        <div class="dropdown list">
            <button class="dropbtn" onclick="sportDropDown()">SPORTS</button>
            <div class="dropdown-content" id="dropdown">
                <a href="sport.php?sport=Basketball">Basketball</a>
                <a href="sport.php?sport=Football">Football</a>
                <a href="sport.php?sport=Volleyball">Volleyball</a>
            </div>
        </div>
        
        <div class="dropdown list">
            <button class="dropbtn" onclick="schoolDropdown()">SCHOOLS</button>
            <div class="dropdown-content" id="school-dropdown">
                <a href="school.php?school=UNOR">UNO-R</a>
                <a href="school.php?school=LCC">LCC-B</a>
                <a href="school.php?school=USLS">USLS</a>
                <a href="school.php?school=STI">STI-WEST NEGROS</a>
                <a href="school.php?school=CSAB">CSAB</a>
            </div>
        </div>
    <?php }?>
            
        <?php if($current_user['type'] == 'Admin'){ ?>
            <a href="DeactivatedUsers.php" class="user-profile list">COACH ACTIVATIONS</a>
        <?php } ?>
        
        <div class="dropdown user-profile list">
            <button class="dropbtn" onclick="profileDropdown()"><?php echo $current_user['name']?></button>
            <div class="dropdown-content" id="profile-dropdown">
                <?php 
                    if($current_user['type'] == 'Admin'){ ?>
                        <a href="signout.php">Sign-out</a>
                <?php }else{ ?>
                    <a href="userProfile.php?id=<?php echo $current_user['id'] ?>">Profile</a>
                    <a href="userEdit.php?id=<?php echo $current_user['id'] ?>">Settings</a>
                    <hr>
                    <a href="signout.php">Sign-out</a>
                <?php } ?>
                
            </div> 
        </div>
    </div>
</nav>

<script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function sportDropDown() {
                document.getElementById("dropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
                if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("dropdown");
                    if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                    }
                }
            }
        </script>
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function schoolDropdown() {
                document.getElementById("school-dropdown").classList.toggle("view");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
                if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("school-dropdown");
                    if (myDropdown.classList.contains('view')) {
                        myDropdown.classList.remove('view');
                    }
                }
            }
        </script>
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function profileDropdown() {
                document.getElementById("profile-dropdown").classList.toggle("profile");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
                if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("profile-dropdown");
                    if (myDropdown.classList.contains('profile')) {
                        myDropdown.classList.remove('profile');
                    }
                }
            }
        </script>