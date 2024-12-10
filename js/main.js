(function () {
  const player = new Plyr("video");

  console.log("fired");

  let button = document.querySelector(".burger-menu");
  let burgerCon = document.querySelector(".burger-con");

  function hamburgerMenu() {
    burgerCon.classList.toggle("slide-toggle");
    button.classList.toggle("expanded");
  }

  button.addEventListener("click", hamburgerMenu, false);
})();
