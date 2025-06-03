function getColor(temp) {
  if (temp >= 38) return "#d73027";
  if (temp >= 35) return "#fc8d59";
  if (temp >= 27) return "#fee08b";
  if (temp >= 23) return "#d9ef8b";
  return "#91cf60";
}
