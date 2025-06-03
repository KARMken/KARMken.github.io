const regionButtons = document.getElementById("region-buttons");
const regionLoading = document.getElementById("region-loading");

let buttonPromises = regions.map((region) => {
  const url = `https://api.open-meteo.com/v1/forecast?latitude=${region.lat}&longitude=${region.lon}&current_weather=true`;

  return fetch(url)
    .then((res) => res.json())
    .then((data) => {
      const temp = data.current_weather.temperature;
      const btnColor = "#0056b3";
      const color = getColor(temp);

      // Create button
      const btn = document.createElement("button");
      btn.className = "region-btn btn me-2 mb-2";
      btn.textContent = region.name;
      btn.style.backgroundColor = btnColor;
      btn.style.border = "none";
      btn.style.color = "white";
      btn.onclick = () => {
        map.setView([region.lat, region.lon], 15);
        showExtendedForecast(region.lat, region.lon, region.name, color);
      };
      regionButtons.appendChild(btn);

      Promise.all(buttonPromises).then(() => {
        regionLoading.classList.add("d-none");
        regionButtons.classList.remove("d-none");
      });
    });
});

function showExtendedForecast(lat, lon, name) {
  const modal = new bootstrap.Modal(document.getElementById("forecastModal"));
  document.getElementById(
    "forecastModalLabel"
  ).textContent = `Forecast for ${name}`;
  document.getElementById("forecastContent").innerHTML = "Loading...";

  const forecastUrl = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&daily=temperature_2m_max,temperature_2m_min,precipitation_sum,windspeed_10m_max&timezone=auto`;

  fetch(forecastUrl)
    .then((res) => res.json())
    .then((data) => {
      const days = data.daily.time;
      const maxTemps = data.daily.temperature_2m_max;
      const minTemps = data.daily.temperature_2m_min;
      const rain = data.daily.precipitation_sum;
      const wind = data.daily.windspeed_10m_max;

      let html = `
        <div class="mb-3 d-flex flex-wrap gap-2">
            <span class="badge px-3 py-2" style="background-color: #d73027; color: rgb(234, 227, 227); font-weight: bold;">
                ≥ 38°C – Very Hot
            </span>
            <span class="badge px-3 py-2" style="background-color: #fc8d59; color: #000; font-weight: bold;">
                35–37°C – Hot
            </span>
            <span class="badge px-3 py-2" style="background-color: #fee08b; color: #000; font-weight: bold;">
                27–34°C – Warm
            </span>
            <span class="badge px-3 py-2" style="background-color: #d9ef8b; color: #000; font-weight: bold;">
                23–26°C – Mild
            </span>
            <span class="badge px-3 py-2" style="background-color: #91cf60; color: #000; font-weight: bold;">
                &lt;23°C – Cool
            </span>
            </div>

        <table class="table table-bordered text-center" style="background-color: #0056b3 !important; color: white !important;">
            <thead>
                <tr>
                    <th style="background-color: #004080 !important; color: white !important;">Date</th>
                    <th style="background-color: #004080 !important; color: white !important;">Max Temp (°C)</th>
                    <th style="background-color: #004080 !important; color: white !important;">Min Temp (°C)</th>
                    <th style="background-color: #004080 !important; color: white !important;">Rain (mm)</th>
                    <th style="background-color: #004080 !important; color: white !important;">Wind (km/h)</th>
                </tr>
            </thead>
            <tbody>
`;

      for (let i = 0; i < days.length; i++) {
        const rowColor = getColor(maxTemps[i]);
        html += `<tr style="background-color: rgb(33, 37, 40) !important; color: white !important;">
             <td style="background-color: ${rowColor} !important; color: ${
          maxTemps[i] >= 35 ? "white" : "black"
        } !important;">${days[i]}</td>
             <td style="background-color: ${rowColor} !important; color: ${
          maxTemps[i] >= 35 ? "white" : "black"
        } !important;"><strong>${maxTemps[i]}</strong></td>
             <td style="background-color: ${rowColor} !important; color: ${
          maxTemps[i] >= 35 ? "white" : "black"
        } !important;">${minTemps[i]}</td>
             <td style="background-color: ${rowColor} !important; color: ${
          maxTemps[i] >= 35 ? "white" : "black"
        } !important;">${rain[i]}</td>
             <td style="background-color: ${rowColor} !important; color: ${
          maxTemps[i] >= 35 ? "white" : "black"
        } !important;">${wind[i]}</td>
          </tr>`;
      }

      html += `</tbody></table>`;

      html += `</tbody></table>`;
      document.getElementById("forecastContent").innerHTML = html;
      modal.show();
    })
    .catch(() => {
      document.getElementById("forecastContent").innerHTML =
        "Failed to retrieve forecast data.";
      modal.show();
    });
}
