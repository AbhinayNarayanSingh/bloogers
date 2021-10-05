<?php

// creation of compose... editor

function composeCreation(){
    if (isset($_POST['compose'])) {
        $composeTitle = mysqli_escape_string($GLOBALS['conn'], $_POST['composeTitle']);
        $composeBody = mysqli_escape_string($GLOBALS['conn'], $_POST['composeBody']);
        $composeAuthor = mysqli_escape_string($GLOBALS['conn'], $_POST['composeAuthor']);
        $composeDescription = mysqli_escape_string($GLOBALS['conn'], $_POST['composeDescription']);
        $userId = user("id");
        $composeDate = date(" F d");

        $query = "INSERT INTO `composes` (`userId`, `composeAuthor`, `composeTitle`, `composeBody`, `composeDescription`, `composeDate`) VALUES ('$userId', '$composeAuthor', '$composeTitle', '$composeBody', '$composeDescription', '$composeDate')";
        $query = mysqli_query($GLOBALS['conn'], $query);
        queryErrorCheck($query, "Compose Creation Failed");
        header("location: ./profile.php?msg=Compose published");
    }
}

// landing page...list of compose

function composeRead(){
    $query = "SELECT * FROM composes WHERE `status` = 'publish'";
    $query = mysqli_query($GLOBALS['conn'], $query);

    while ($row = mysqli_fetch_assoc($query)) {
    ?>
        <div class="post postContainer" >
        <div class="post_title">
            <div class="post_title_bullet"></div>
            <h2><?php echo $row['composeTitle'] ?></h2>
        </div>
        <div class="post_body"><p><?php echo $row['composeDescription'] ?></p></div>
        <a href="./post.php?id=<?php echo $row['composeId'] ?>" class="post-body-read-more-link">Read more</a>
        </div>
    <?php
    }
}

