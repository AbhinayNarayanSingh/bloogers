<?php



function composeReadIndividual(){
    $composeId = $_GET['id'];
    $query = "SELECT * FROM composes WHERE `composeId` = '$composeId'";
    $query = mysqli_query($GLOBALS['conn'], $query);

    while ($row = mysqli_fetch_assoc($query)) {
    ?>
        <div class="article-heading">
            <h1><?php echo $row['composeTitle'] ?></h1>
        </div>
        <div class="article-content">

        <div class="article-date">
            <p>By <?php echo $row['composeAuthor'] ?></p>
        </div>
            <?php echo $row['composeBody'] ?>
        </div>
    <?php
    }
}

