<?php include "./header.php";
        SignInFirst();
?>

<div class="container">
<div class="postContainer">

<div class="profile">
    <div class="profileImage" onclick="toggle('.setting-popup-container')">
        <img src="./img/users_profile_img/<?php echo user('profile') ?>">
        
    </div>
    <h2>Welcome, <?php echo user('name'); ?></h2>
</div>


<?php composeList(); ?>


</div>
</div>



<div class="setting-popup-container hide" >

        
    <div class="setting-popup">
        
        <form action="./backend.map.php?profilePictureUpdate" method="POST" class="profile-picture-update" enctype="multipart/form-data">
            <div class="profile">
                <div class="profileImage">
                    <img src="./img/users_profile_img/<?php echo user('profile'); ?>" alt="" id="profileImagePreview">
                </div>
            </div>

        <h2>Profile picture</h2>
        <p>A picture helps people recognize you and lets you know when you’re signed in to your account</p>

            <input type="file" name="userProfile" id="profileImage" onchange="preview_image(event)" required>
            <span style="font-weight: 500; cursor: pointer;" onclick="toggle('.setting-popup-container')">Cancel <button type="submit" style=" margin-left: 1rem;" name="uploadProfile">Save as profile Picture</button></span>
        </form>

    </div>

</div>


