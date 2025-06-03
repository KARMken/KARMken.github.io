const regions = [
  { name: "Manila", lat: 14.5995, lon: 120.9842 },
  { name: "Cebu", lat: 10.3157, lon: 123.8854 },
  { name: "Davao", lat: 7.1907, lon: 125.4553 },
  { name: "Baguio", lat: 16.4023, lon: 120.596 },
  { name: "Zamboanga", lat: 6.9214, lon: 122.079 },
];

const map = L.map("map").setView([12.8797, 121.774], 6.2);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "&copy; OpenStreetMap contributors",
}).addTo(map);
