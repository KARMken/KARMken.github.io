const coords = { x: 0, y: 0 };
const circles = document.querySelectorAll(".circle");

const colors = [
  "#e6f2ff", // Light Blue
  "#cce0ff",
  "#99c2ff",
  "#66a3ff",
  "#3385ff",
  "#0073ff",
  "#0066e6",
  "#0059cc",
  "#0051b3",
  "#004b99",
  "#004080",
  "#003366", // Dark Blue
  "#002d5c",
  "#002752",
  "#002244",
  "#001f3f",
  "#001a33",
  "#00152b",
  "#001122",
  "#000d1a",
  "#000a12",
  "#000600",
  "#000300",
  "#000000",
  "#000000", // Repeating for uniformity
  "#000000",
  "#000000",
  "#000000",
  "#000000",
  "#000000",
  "#000000",
  "#000000",
  "#000000",
];
circles.forEach(function (circle, index) {
  circle.x = 0;
  circle.y = 0;
  circle.style.backgroundColor = colors[index % colors.length];

  circle.style.width = "24px"; // Adjust this size
  circle.style.height = "24px"; // Adjust this size
});

window.addEventListener("mousemove", function (e) {
  coords.x = e.clientX;
  coords.y = e.clientY;
});

function animateCircles() {
  let x = coords.x;
  let y = coords.y;

  circles.forEach(function (circle, index) {
    circle.style.left = x - 12 + "px";
    circle.style.top = y - 12 + "px";

    const scale = (0.7 * (circles.length - index)) / circles.length;
    circle.style.transform = `scale(${scale})`;

    circle.x = x;
    circle.y = y;

    const nextCircle = circles[index + 1] || circles[0];
    x += (nextCircle.x - x) * 0.3;
    y += (nextCircle.y - y) * 0.3;
  });

  requestAnimationFrame(animateCircles);
}

animateCircles();
