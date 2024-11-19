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

// Function to play the video and unmute it
const playVideo = (video) => {
  video.play();
  video.muted = false; // Ensure the video is unmuted
};

// Function to pause the video and mute it
const pauseVideo = (video) => {
  video.pause();
  video.muted = true; // Mute the video when paused
};

// Callback function for IntersectionObserver
const callback = (entries) => {
  entries.forEach((entry) => {
    const video = entry.target.querySelector("video"); // Get the video inside the observed element
    if (entry.isIntersecting) {
      // Video enters the viewport, play it
      playVideo(video);
    } else {
      // Video leaves the viewport, pause and mute it
      pauseVideo(video);
    }
  });
};

// Create an IntersectionObserver instance
const observer = new IntersectionObserver(callback, {
  root: null, // Use the viewport as the root
  threshold: 0.5, // Trigger when 50% of the video is visible
});

// Select all video containers
const videoContainers = document.querySelectorAll('[id^="video-container-"]');

// Start observing each video container
videoContainers.forEach((container) => {
  observer.observe(container);
});
