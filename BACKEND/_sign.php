<?php

function validation($key1, $key2){
    $query = "SELECT * from `users` where `$key1` = '$key2'";
    $query = mysqli_query($GLOBALS['conn'], $query);
    
    $row = mysqli_num_rows($query);

    if ($row == 0) {
        echo "validation";
        return true;
    } else {
        return false;
    }
}


function signUp(){
    if (isset($_GET['signUp'])) {
        $userName = mysqli_escape_string($GLOBALS['conn'], $_POST['userName']);
        $userEmail = mysqli_escape_string($GLOBALS['conn'], $_POST['userEmail']);
        $userMob = mysqli_escape_string($GLOBALS['conn'], $_POST['userMob']);
        $userPassword = mysqli_escape_string($GLOBALS['conn'], $_POST['userPassword']);
        $userJoin = date("l, jS \of F Y");

        if (validation('userEmail',$userEmail)) {
            if (validation('userMob', $userMob)) {
                $query = "INSERT INTO `users`(`userName`, `userEmail`, `userMob`, `userPassword`, `userJoin`) VALUES ('$userName', '$userEmail', '$userMob', '$userPassword', '$userJoin')";
                $query = mysqli_query($GLOBALS['conn'], $query);
            }else {
                header("location: ./sign.php?signup&error=mob");
            }
        } else {
            header("location: ./sign.php?signup&error=email");
        }
        
        header("location: ./sign.php?signin&msg=Quick Signup Complete");
    }
}


function signin(){
    if (isset($_GET['signin'])) {
    if (isset($_POST['signin'])) {
        $userEmail = mysqli_escape_string($GLOBALS['conn'], $_POST['userName']);
        $userMob = mysqli_escape_string($GLOBALS['conn'], $_POST['userName']);
        $userPassword = mysqli_escape_string($GLOBALS['conn'], $_POST['userPassword']);

        $query = "SELECT * FROM `users` WHERE (`userEmail` = '$userEmail' or `userMob` = '$userMob') and `userPassword` = '$userPassword'";
        $query = mysqli_query($GLOBALS['conn'], $query);

        queryErrorCheck($query,'signin');


        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_assoc($query);
            session_start();
            $_SESSION['signIn'] = true;
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userEmail'] = $row['userEmail'];
            $_SESSION['userMob'] = $row['userMob'];
            $_SESSION['userProfileImage'] = $row['userProfileImage'];

            echo $_SESSION['userProfileImage'];
            header("location: ./profile.php?msg=User Signed In");
        } else {
            header("location: ./sign.php?signin&error=Invalid Credentials");
        }
        }
    }
}


function logout(){
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
    header("Location: ./sign.php?signin");
    }
}


function SignInFirst(){
    if (!$_SESSION) {
        header("location: ./sign.php?signin");
    }
}
function NotAllowedAfterSignIn(){
    if ($_SESSION) {
        header("location: ./profile.php");
    }
}