document.getElementById('mlogo').addEventListener('click', () =>{
    window.location.href = ('index.html');
})

document.getElementById('planeB').addEventListener('click', () =>{
    window.location.href = ('fbooking.html');
})

document.getElementById('busB').addEventListener('click', () =>{
    window.location.href = ('bbooking.html');
})

document.getElementById('trainB').addEventListener('click', () =>{
    window.location.href = ('serach.html');
})

document.getElementById('carB').addEventListener('click', () =>{
    window.location.href = ('cbooking.html');
})



function togglePassword() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}