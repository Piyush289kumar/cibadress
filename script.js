// Script for navigation bar

const bar = document.getElementById("bar");
const nav = document.getElementById("navbar");
const closeBtn = document.getElementById("clone");

if (bar) {
  bar.addEventListener("click", () => {
    nav.classList.add("active");
    return true;
 });
}

if (closeBtn) {
  closeBtn.addEventListener("click", () => {
    nav.classList.remove("active");
    return true;git 
  });
}


// For Dark Mode


function toggleFnc(input) {
    input.classList.toggle('fa-sun');
    document.querySelector('body').classList.toggle('nightTheme')
    // const hero = document.getElementById('hero').style.backgroundImage;
    if (hero == 'url("img/hero4-dark.png")') {
      // const hero = document.getElementById('hero').style.backgroundImage = "url('img/hero4.png')";
    } else {
      // const hero = document.getElementById('hero').style.backgroundImage = "url('img/hero4-dark.png')";
    }
}


