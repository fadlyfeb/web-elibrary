window.addEventListener("DOMContentLoaded", function() {
    var hash = window.location.hash;

    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "";

    if (hash === "#popupForm") {
        document.getElementById("tamp").style.display = "none";
        document.getElementById("tamp-login").style.height = "40px"; 
        document.getElementById("home-menu").classList.add("blur");
        document.getElementById("popupForm").style.display = "block";
    } else if (hash === "#popupRegisAdmin") {
        document.getElementById("tamp").style.display = "none";
        document.getElementById("tamp-login").style.height = "40px"; 
        document.getElementById("home-menu").classList.add("blur");
        document.getElementById("popupRegisAdmin").style.display = "block";
    } else if (hash === "#popupRegisUser") {
        document.getElementById("tamp").style.display = "none";
        document.getElementById("tamp-login").style.height = "40px"; 
        document.getElementById("home-menu").classList.add("blur");
        document.getElementById("popupRegisUser").style.display = "block";
    } else {
        document.getElementById("tamp").style.display = "block";
        document.getElementById("home-menu").classList.remove("blur");
        document.getElementById("popupForm").style.display = "none";
        document.getElementById("popupRegisAdmin").style.display = "none";
        document.getElementById("popupRegisUser").style.display = "none";
    }
});
document.getElementById("login").addEventListener("click", function() {
    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "40px"; 
    document.getElementById("tamp").style.display = "none";
    document.getElementById("home-menu").classList.add("blur");
    document.getElementById("popupForm").style.display = "block";
});
document.getElementById("btnClose").addEventListener("click", function() {
    document.getElementById("home-menu").classList.remove("blur");
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("tamp").style.display = "block";
    document.getElementById("tamp-login").style.height = "";
    window.location.href = "index.php";  
});
document.getElementById("regis").addEventListener("click", function() {
    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "40px"; 
    document.getElementById("tamp").style.display = "none";
    document.getElementById("home-menu").classList.add("blur");
    document.getElementById("popupRegis").style.display = "block";
});
document.getElementById("btnClose-regis").addEventListener("click", function() {
    document.getElementById("home-menu").classList.remove("blur");
    document.getElementById("popupRegis").style.display = "none";
    document.getElementById("tamp").style.display = "block";
    document.getElementById("tamp-login").style.height = "";
    window.location.href = "index.php";  
});
document.getElementById("a-login").addEventListener("click", function() {
    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "40px"; 
    document.getElementById("tamp").style.display = "none";
    document.getElementById("home-menu").classList.add("blur");
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("popupRegis").style.display = "none";
});
document.getElementById("a-regis").addEventListener("click", function() {
    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "40px"; 
    document.getElementById("tamp").style.display = "none";
    document.getElementById("home-menu").classList.add("blur");
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("popupRegis").style.display = "block";
});
document.getElementById("btn-regis-admin").addEventListener("click", function() {
    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "40px"; 
    document.getElementById("tamp").style.display = "none";
    document.getElementById("home-menu").classList.add("blur");
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("popupRegis").style.display = "none";
    document.getElementById("popupRegisAdmin").style.display = "block";
});
document.getElementById("btn-regis-user").addEventListener("click", function() {
    document.getElementById("tamp-login").style.display = "block";
    document.getElementById("tamp-login").style.height = "40px"; 
    document.getElementById("tamp").style.display = "none";
    document.getElementById("home-menu").classList.add("blur");
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("popupRegis").style.display = "none";
    document.getElementById("popupRegisUser").style.display = "block";
});