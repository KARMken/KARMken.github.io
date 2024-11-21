// Function to play the video and unmute it
const playVideo = (video) => {
  video.play();
  video.muted = false;
};

// Function to pause the video and mute it
const pauseVideo = (video) => {
  video.pause();
  video.muted = true;
};

// Callback function for IntersectionObserver
const callback = (entries) => {
  entries.forEach((entry) => {
    const video = entry.target.querySelector("video");
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
  threshold: 0.5,
});

// Select all video containers
const videoContainers = document.querySelectorAll('[id^="video-container-"]');

// Start observing each video container
videoContainers.forEach((container) => {
  observer.observe(container);
});
