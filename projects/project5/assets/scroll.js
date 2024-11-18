let listBg = document.querySelectorAll(".bg");

let titleBanner = document.querySelector(".banner h1");
window.addEventListener("scroll", (event) => {
  let top = this.scrollY;

  titleBanner.style.transform = `translateY(-${(top * 3) / 5}px)`;
  listBg.forEach((bg, index) => {
    if (index === 1) {
      bg.style.transform = `translateY(${top / 2}px)`;
    } else if (index === 2) {
      bg.style.transform = `translateY(-${top / 8}px)`;
    } else if (index === 3) {
      bg.style.transform = `translateY(-${top / 3}px) translateX(${
        top / 10
      }px)`;
    } else if (index === 4) {
      bg.style.transform = `translateY(-${top / 4}px) `;
    } else if (index === 5) {
      bg.style.transform = `translateY(-${top / 8}px) translateX(${
        top / 12
      }px)`;
    } else if (index === 6) {
      const scale = 1 + top / 500;
      let xMovement;

      if (top < 112) {
        xMovement = top / 12;
      } else {
        xMovement = -scale - top / 5;
      }

      bg.style.transform = `scale(${scale}) translateX(${xMovement}px)`;
    } else if (index === 7) {
      bg.style.transform = `translateY(-${top / 15 / 4}px)`;
    }
  });
});
