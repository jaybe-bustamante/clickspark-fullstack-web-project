window.onscroll = function () {
    scrollFunction1();
    scrollFunction2();
};

//Navbar bg scroll effect
function scrollFunction1() {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > 10) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
}

//Scroll up button
function scrollFunction2() {
    var scrollUpButton = document.getElementById("scrollUpButton");
    if (
        document.body.scrollTop > 300 ||
        document.documentElement.scrollTop > 300
    ) {
        scrollUpButton.style.display = "block";
    } else {
        scrollUpButton.style.display = "none";
    }
}

document.getElementById("scrollUpButton").onclick = function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
};
