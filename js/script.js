nav__link = document.getElementsByClassName("nav__link");
for (var x = 0; x < nav__link.length; ++x) {
    nav__link[x].addEventListener("click", function () {
        this.previousElementSibling.checked = true;
        //this.previousElementSibling.style["background"]="red";
        console.log("input sibling is checked");
    })
}