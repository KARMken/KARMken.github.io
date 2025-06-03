const markerLoading = document.getElementById("marker-loading");
const markerGroup = L.layerGroup().addTo(map);
const markers = [];

const markerPromises = regions.map((region) => {
  const url = `https://api.open-meteo.com/v1/forecast?latitude=${region.lat}&longitude=${region.lon}&current_weather=true`;

  return fetch(url)
    .then((res) => res.json())
    .then((data) => {
      const temp = data.current_weather.temperature;
      const wind = data.current_weather.windspeed;
      const color = getColor(temp);

      const popupContent = `<strong>${
        region.name
      }</strong><br>🌡️ ${temp.toFixed(1)}°C<br>💨 ${wind} km/h`;

      const icon = L.divIcon({
        className: "",
        html: `<div style="
          background-color: ${color};
          width: 20px;
          height: 20px;
          border-radius: 50%;
          border: 2px solid white;
          box-shadow: 0 0 5px #333;
        "></div>`,
        iconSize: [20, 20],
        iconAnchor: [10, 10],
      });

      const marker = L.marker([region.lat, region.lon], { icon }).bindTooltip(
        popupContent
      );
      markers.push(marker);
    })
    .catch((err) =>
      console.error("Failed to load weather for " + region.name, err)
    );
});

Promise.all(markerPromises).then(() => {
  markerLoading.classList.add("d-none");
  markers.forEach((marker) => markerGroup.addLayer(marker));
});
