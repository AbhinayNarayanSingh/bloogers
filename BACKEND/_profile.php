<?php

// profile page... compose list


function composeList(){

    $userId = user("id");
    // echo $userId;   //working here

    $query = "SELECT * FROM composes WHERE `userId` = '$userId'";
    $query = mysqli_query($GLOBALS['conn'], $query);

    while ($row = mysqli_fetch_assoc($query)) {
    ?>
        <a href="./post.php?id=<?php echo $row['composeId'] ?>">
            <div class="postListTitle"><h2><?php echo $row['composeTitle'] ?></h2><div>
                    <div class="postArchiveAction">
                        <a href="?alter=<?php echo $row['composeId'] ?>" ><i class="fas fa-pen"></i></a>

                    <?php 
                        if ($row['status'] == 'publish') {
                            ?><a href="?statusUpdate=<?php echo $row['composeId'] ?>&draft"><i class="fas fa-eye-slash"></i></a><?php
                        } else {
                            ?><a href="?statusUpdate=<?php echo $row['composeId'] ?>&publish"><i class="fas fa-eye"></i></a><?php
                        }
                    ?>
                        <a href="./backend.map.php?composeDelete=<?php echo $row['composeId'] ?>"><i class="fas fa-trash"></i></a>
                    </div>
                    <div class="postArchiveDate">
                        <p><?php echo $row['composeDate'] ?></p>
                    </div>
                    </div>
            </div>
        </a>
        
    <?php
    }
}

// composeDelete    working

function composeDelete(){
    if (isset($_GET['composeDelete'])) {
        $composeId = $_GET['composeDelete'];
        $query = "DELETE FROM `composes` WHERE `composeId` = $composeId";
        $query = mysqli_query($GLOBALS['conn'], $query);

        header("location: ./profile.php?msg=Compose Deleted");

    }
}


// alteration of compose... editor

function composeUpdate(){
    if (isset($_GET['update'])) {
        $composeId = $_GET['update'];
        $userId = user('id');
        $composeAuthor = mysqli_escape_string($GLOBALS['conn'], $_POST['composeAuthor']);
        $composeTitle = mysqli_escape_string($GLOBALS['conn'], $_POST['composeTitle']);
        $composeBody = mysqli_escape_string($GLOBALS['conn'], $_POST['composeBody']);
        $composeDescription = mysqli_escape_string($GLOBALS['conn'], $_POST['composeDescription']);


        $query = "UPDATE `composes` SET `composeAuthor`='$composeAuthor',`composeTitle`='$composeTitle',`composeBody`='$composeBody',`composeDescription`='$composeDescription' WHERE `composeId`='$composeId' and `userId`='$userId'";
        $query = mysqli_query($GLOBALS['conn'], $query);

        header("location: ./profile.php");

    }
}

function statusUpdate(){
    if (isset($_GET['statusUpdate'])) {

        function status($key,$msg){
            
            $userId = user('id');
            $composeId = $_GET['statusUpdate'];
            
            $query = "UPDATE `composes` SET `status` = '$key' WHERE `composeId`='$composeId' and `userId`='$userId'";
            $query = mysqli_query($GLOBALS['conn'], $query);
            
            header("location: ./profile.php?msg=$msg");
            
        }

        if (isset($_GET['publish'])) {
                status('publish','Compose published');
            } else {
                status('draft','Compose drafted');
        }
    }
}


function profilePictureUpdate(){
    if (isset($_GET['profilePictureUpdate'])) {
        if (isset($_FILES['userProfile'])) {

            // Array ( [userProfile] => Array ( [name] => WhatsApp Image 2021-10-05 at 10.24.19.jpeg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\phpEAB2.tmp [error] => 0 [size] => 64786 ) ) 
            
            $fileName = $_FILES['userProfile']['name'];
            $fileTmpName = $_FILES['userProfile']['tmp_name'];
            $fileLocation= './img/users_profile_img/';

            move_uploaded_file($fileTmpName, $fileLocation.$fileName);

            $userId = user('id');
            $userEmail = user('email');

            $query= "UPDATE `users` SET `userProfileImage`='$fileName' WHERE `userId`= '$userId' and `userEmail` = '$userEmail'";
            $query = mysqli_query($GLOBALS['conn'],$query);

            queryErrorCheck($query, "jjj");

            header("location: ./profile.php?msg=Profile Picture Updated");
        }
    }
}