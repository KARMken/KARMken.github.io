const regions = [
  { name: "Nacpan Beach", lat: 11.2257, lon: 119.5059 },
  { name: "Kawasan Falls", lat: 9.9076, lon: 123.3696 },
  { name: "Kayangan Lake", lat: 11.9815, lon: 119.8755 },
  { name: "Puerto Princesa", lat: 9.74, lon: 118.7353 },
  { name: "Carabao Island", lat: 12.0635, lon: 121.9359 },
  { name: "Boracay Beach", lat: 11.9674, lon: 121.9246 },
  { name: "Banaue Rice Terraces", lat: 16.927, lon: 121.134 },
  { name: "Tubbataha Reef", lat: 8.95, lon: 119.9167 },
  { name: "Chocolate Hills", lat: 9.8075, lon: 124.1999 },
  { name: "Mount Mayon", lat: 13.257, lon: 123.6854 },
];

const map = L.map("map").setView([12.8797, 121.774], 6.2);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {}).addTo(map);
