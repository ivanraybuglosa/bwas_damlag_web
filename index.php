<?php
    include_once('web_db.php');
    include_once('authentication.php');

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        if($pdo->deleteUser($id)){
            echo "<script>alert('User Information has been successfully removed!');window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Unable to remove the user.');window.location.href='index.php';</script>";
        }
    }
?>
<html>
    <head>
        <title>Dashboard</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include('navbar.php') ?>
        <center>
        <h1>List of Registered Users</h1>
            <table id="users">
            <tr>
                <th>Username</th>
                <th>E-mail</th>
                <th>School</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Actions</th>
            <tr>
        <?php 
            $dbh = new PDO('mysql:host=localhost;dbname=android_db', 'root', '');
            $stmt = $dbh->query("SELECT * FROM users");
            while ($row = $stmt->fetch()) {
        ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['school']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                    <a class="edit-button" href="userEdit.php?id=<?php echo $row['id']?>">Edit</a>
                    <form method="post" class="delete-form">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                        <button class="delete-button" type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </table>
        </center>
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
    </body>
    
</html>