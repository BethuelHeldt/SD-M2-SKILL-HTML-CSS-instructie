nav__link = document.getElementsByClassName("nav__link");
for (var x = 0; x < nav__link.length; ++x) {
    nav__link[x].addEventListener("click", function () {
        this.previousElementSibling.checked = true;
        //this.previousElementSibling.style["background"]="red";
        console.log("input sibling is checked");
    })
}

// bij scrollen nav selected zetten
const sections = document.querySelectorAll("article");
const navLink = document.querySelectorAll("nav label a");
window.onscroll = () => {
    var current = "";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        if (pageYOffset >= sectionTop - 100) {
            current = section.getAttribute("id");
        }
    });

    navLink.forEach((a) => {
        a.previousElementSibling.checked = false;
        //console.log('a: '+a+' - current: '+current+' href: '+a.getAttribute("href"));
        if (a.getAttribute("href") == "#"+current) {
            a.previousElementSibling.checked = true;
        }
    });
};