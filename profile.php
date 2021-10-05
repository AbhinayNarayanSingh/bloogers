<?php include "./header.php";
        SignInFirst();
?>

<div class="container">
<div class="postContainer">

<div class="profile">
    <div class="profileImage">
        <i class="fas fa-cog"></i>
    </div>
    <h2>Welcome, <?php echo user('name') ?></h2>
</div>

<?php composeList(); ?>


</div>
</div>


