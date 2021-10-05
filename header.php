<?php include "./backend.map.php"; 
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloogers</title>

    <link rel="stylesheet" href="./CSS/style.css">

    <!-- font-family -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Text:wght@400;500;700" rel="stylesheet" nonce="">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="./JS/app.js"></script>
</head>
<body>

<div class="headerContainer">
    <header class="">
        <div class="branding">
            <a href="./ ">Bloogers</a>
        </div>


        <?php  
        
        if ($_SESSION) {
            ?>
                <div style="display: flex; align-items: center;">
                <div   onclick="toggle('.editorContainer')" class="addNewPost"><p>New Compose</p></div>
                <div class="profile " onclick="toggle('.popup-container')">
                     <img src="./img/users_profile_img/<?php echo user('profile') ?>">
                </div>
                </div>
            <?php  
        } else {
            ?>
                <a href="./sign.php?signin">
                    <p class="signIn">Sign In</p>
                </a>
            <?php
        }
        
        ?>




    </header>
</div>



<div class="popup-container hide" onclick="toggle('.popup-container')">

    <div class="popup">
        <div class="userProfile">
        <img src="./img/users_profile_img/<?php echo user('profile') ?>">

        </div>
        <div class="userDetails">
        <p class="userName"><?php echo user('name') ?></p>
        <p class="userEmail"  style="margin-bottom: 1rem;"><?php echo user('email') ?></p>
    </div>


    <a href="./profile.php" class="popup-section"><p>Dashboard</p></a>
    <a href="./backend.map.php?logout" class="popup-section">
        <p>Sign Out</p>
    </a>

</div>
</div>

<?php  include "./editor.php" ?>