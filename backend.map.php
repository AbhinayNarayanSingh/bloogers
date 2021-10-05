<?php
ob_start();
session_start();


$hostname = "localhost";
$username = "root"; 
$password = "";
$database = "bloogers 2.0";

$conn = mysqli_connect($hostname, $username, $password, $database); 
queryErrorCheck($conn, "Connection Failed");


function queryErrorCheck($query, $msg){
    if(!$query){
        echo "Error: ". $msg;
        mysqli_error($GLOBALS['conn']);
    }
}

function user($variable){
    if ($_SESSION) {
        switch ($variable) {
        case 'id':
        return $_SESSION['userId'];
        echo $_SESSION['userId'];
        break;
        case 'name':
        return $_SESSION['userName'];
        break;
        case 'email':
        return $_SESSION['userEmail'];
        break;  
        case 'mob':
        return $_SESSION['userMob'];
        break;  
        case 'profile':
        return $_SESSION['userProfileImage'];
        break;  
        }
    }
}

function msg(){

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        ?><div class='msg'><p><?php echo $msg ?><span onclick="toggle('.msg')">Dismiss</span></p></div><?php
     }
}

// Includes
include "./BACKEND/_index.php";
include "./BACKEND/_post.php";
include "./BACKEND/_profile.php";
include "./BACKEND/_sign.php";



// Function call

msg();
composeCreation();
composeDelete();
composeUpdate();
statusUpdate();
signUp();
signin();
logout();
profilePictureUpdate();