function toggle($key) {
    document.querySelector($key).classList.toggle("hide");
    // console.log('Working');
}

function signInUpToggle() {
    document.querySelector("#signIn").classList.toggle("hide");
    document.querySelector("#signUp").classList.toggle("hide");
}

function preview_image(event) {
    let reader = new FileReader();
    reader.onload = function () {
        let output = document.getElementById('profileImagePreview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}