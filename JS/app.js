function toggle($key) {
    document.querySelector($key).classList.toggle("hide");
    // console.log('Working');
}

function signInUpToggle() {
    document.querySelector("#signIn").classList.toggle("hide");
    document.querySelector("#signUp").classList.toggle("hide");
}