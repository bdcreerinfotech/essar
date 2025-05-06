
// sidebar open close js code
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.right = "-30px";
}
menuCloseBtn.onclick = function() {
navLinks.style.right = "-110%";
}


// sidebar submenu open close js code
document.querySelector(".htmlcss-arrow").addEventListener("click", function(e) {
  e.preventDefault();
  navLinks.classList.toggle("show1");
});




document.querySelector(".js-arrow").addEventListener("click", function(e) {
  e.preventDefault();
  navLinks.classList.toggle("show3");
});

// let jsArrow = document.querySelector(".js-arrow");
// jsArrow.onclick = function() {
//  navLinks.classList.toggle("show3");
// }



  const header = document.querySelector(".navigation");
const toggleClass = "is-sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll > 200) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});



if($(window).width()<768){
  $("body").addClass("mobileview");
} 
else {
  $("body").removeClass("mobileview");
}
// this is used whenever the window is resized
$(window).resize(function(){
if($(window).width()<768){
      $("body").addClass("mobileview");
  } 
  else {
      $("body").removeClass("mobileview");
  }
});