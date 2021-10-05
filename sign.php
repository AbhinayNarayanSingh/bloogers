<?php include "./header.php";

function errorMsg(){
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        switch ($error) {
        case 'Invalid Credentials':
        echo "Invalid credentials, please verify them and retry.";
        break;
        case 'email':
        echo "Email address is already associated with different account.";
        break;
        case 'mob':
        echo "Mobile number is already associated with different account.";
        break;

        }
    } 
}

NotAllowedAfterSignIn();
?>
<style>header{display: none;}</style>



<section class="sign-container">

<?php
if (isset($_GET['signin'])) {
    ?>
        <div class="signInForm" id="signIn">
    
             <div class="branding">
                 <a href="./ ">Bloogers</a>
            </div>

            <P style="text-align: center;">Sign In to continue to Bloogers</P>
                
            <form action="./backend.map.php?signin" method="POST">
                <p>Email or phone</p>
                <input type="text" required name="userName">
                <p>Password</p>
                <input type="password" name="userPassword">
                <p id="error"><?php errorMsg() ?></p>
                <div class="btnDiv" >
                    <p class="signUpBtn"><a href="./sign.php?signup">Quick Sign Up!</a></p>
                    <button type="submit" name="signin">Sign In</button>
                </div>
        
            </form>
            
        </div>

<?php
}

if (isset($_GET['signup'])) {

    ?>
        <div class="signInForm" id="signUp">

            <div class="branding">
                <a href="./ ">Bloogers</a>
                </div>
                <P style="text-align: center;">Quick Sign Up to Bloogers</P>
                <!-- <p>Sorry, something went wrong there. Try again</p> -->
                
                <form action="./backend.map.php?signUp" method="POST">
                <p>Name</p>
                <input type="text" required name="userName">
                <p>Email</p>
                <input type="email" required name="userEmail">
                <p>Phone</p>
                <input type="tel" required name="userMob">
                <p>Password</p>
                <input type="password" required name="userPassword">
                <p>Confirm password</p>
                <input type="password" required name="userPasswordConfirm">
                 <p id="error"><?php errorMsg() ?></p>
                <div class="btnDiv" >
                <p class="signUpBtn"><a href="./sign.php?signin">Sign In Insted</a></p>
                    <button type="submit" name="signUp">Sign Up</button>
                </div>

            </form>
            
        </div>





<?php
}





?>












</section>


