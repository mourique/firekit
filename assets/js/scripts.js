  // Look for .hamburger
  var hamburger = document.querySelector(".hamburger");
  var menu_button = document.querySelector("#menu-button");
  // On click
  menu_button.addEventListener("click", function() {
    // Toggle class "is-active"
    hamburger.classList.toggle("is-active");
    // Do something else, like open/close menu
  });
