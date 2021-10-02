<?php include "./header.php" ?>
<style>header{display: none;}</style>

<section class="sign-container">

    <div class="signInForm" id="signIn">

         <div class="branding">
             <a href="./ ">Bloogers</a>
            </div>
            <P style="text-align: center;">Sign In to continue to Bloogers</P>
            <!-- <p>Sorry, something went wrong there. Try again</p> -->
            
            <form action="">
            <p>Email or phone</p>
            <input type="text">
            <p>Password</p>
            <input type="text">
            <div class="btnDiv" >
                <p class="signUpBtn" onclick="signInUpToggle()">Quick Sign Up!</p>
                <button type="submit">Sign In</button>
            </div>

        </form>
        
    </div>

    <div class="signInForm hide" id="signUp">

         <div class="branding">
             <a href="./ ">Bloogers</a>
            </div>
            <P style="text-align: center;">Quick Sign Up to Bloogers</P>
            <!-- <p>Sorry, something went wrong there. Try again</p> -->
            
            <form action="">
            <p>Email</p>
            <input type="text">
            <p>Phone</p>
            <input type="text">
            <p>Password</p>
            <input type="text">
            <p>Confirm password</p>
            <input type="text">
            <div class="btnDiv" >
               <p class="signUpBtn" onclick="signInUpToggle()">Sign In Insted</p>
                <button type="submit">Sign Up</button>
            </div>

        </form>
        
    </div>


</section>


