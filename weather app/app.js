const apikey = "41e9a0b27ad8899435870af2ed565a71";
const apiurl =
  "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

const searchBox = document.querySelector(".search input");
const searchBtn = document.querySelector(".search button");
const weatherIcon = document.querySelector(".weather-icon");
const currBtn = document.querySelector(".currLocation");

async function checkWeather(city) {
  const response = await fetch(apiurl + city + `&appid=${apikey}`);
  let data = await response.json();

  if (response.status == 404) {
    document.querySelector(".error").style.display = "block";
    document.querySelector(".weather").style.display = "none";
    document.querySelector(".loading").style.display = "none";
    return;
  } else {
    document.querySelector(".error").style.display = "none";
  }

  const time_date_api = `http://api.weatherapi.com/v1/current.json?key=37cbd93d48f4431e8f851637240207&q=${data.coord.lat},${data.coord.lon}&aqi=yes`;
  let time_date = await fetch(time_date_api);
  let data3 = await time_date.json();
  console.log(data3);
  let data3_arr = data3.location.localtime.split(" ");

  document.querySelector(".city").innerHTML = data.name;
  document.querySelector(".status").innerHTML = data.weather[0].main;
  document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "°c";
  document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
  document.querySelector(".Wind-Speed").innerHTML = data.wind.speed + " kmph";
  document.querySelector(".time").innerHTML = data3_arr[1];
  document.querySelector(".date").innerHTML = data3_arr[0];

  let time = data3_arr[1].split(":");
  time[0] = parseInt(time[0]);
  if (time[0] >= 0 && time[0] < 12) {
    document.querySelector(".isDay").innerHTML = "It's Morning!";
  } else if (time[0] >= 12 && time[0] < 16) {
    document.querySelector(".isDay").innerHTML = "It's afternoon!";
  } else if (time[0] >= 16 && time[0] < 18) {
    document.querySelector(".isDay").innerHTML = "It's evening!";
  } else {
    document.querySelector(".isDay").innerHTML = "It's night!";
  }

  if (data.weather[0].main == "Clouds") {
    weatherIcon.src = "cloudy.png";
    document.body.style.backgroundImage =
      "url('cloudy_weather_background.jpg')";
  } else if (data.weather[0].main == "Clear") {
    weatherIcon.src = "clear.png";
    document.body.style.backgroundImage = "url('clear_background.jpg')";
  } else if (data.weather[0].main == "Rain") {
    weatherIcon.src = "rain-image.png";
    document.body.style.backgroundImage = "url('rain_background.jpg')";
  } else if (data.weather[0].main == "Drizzle") {
    weatherIcon.src = "drizzle.png";
    document.body.style.backgroundImage = "url('drizzle_background.jpg')";
  } else if (data.weather[0].main == "Mist") {
    weatherIcon.src = "mist.png";
    document.body.style.backgroundImage = "url('mist_background.jpg')";
  } else if (data.weather[0].main == "Wind") {
    weatherIcon.src = "wind.png";
    document.body.style.backgroundImage = "url('wind_background.jpg')";
  } else if (data.weather[0].main == "Snow") {
    weatherIcon.src = "snow.png";
    document.body.style.backgroundImage = "url('snow_background.jpg')";
  } else if (data.weather[0].main == "Humid") {
    weatherIcon.src = "humid.png";
    document.body.style.backgroundImage = "url('humid_background.jpg')";
  }

  document.querySelector(".loading").style.display = "none";
  //document.querySelector(".weather").style.display = "block";

  document.querySelector(".weather").style.display = "block";
}

searchBtn.addEventListener("click", (evt) => {
  document.querySelector(".loading").style.display = "block";
  document.querySelector(".weather").style.display = "none";
  checkWeather(searchBox.value);
});

searchBox.addEventListener("keydown", (evt) => {
  document.querySelector(".loading").style.display = "block";
  document.querySelector(".weather").style.display = "none";
  checkWeather(searchBox.value);
});

async function getData(lat, long) {
  const url2 = `http://api.weatherapi.com/v1/current.json?key=37cbd93d48f4431e8f851637240207&q=${lat},${long}&aqi=yes`;
  const data2 = await fetch(url2);
  return await data2.json();
}

async function gotLocation(position) {
  const result = await getData(
    position.coords.latitude,
    position.coords.longitude
  );
  searchBox.value = result.location.name;
  checkWeather(result.location.name);
}
function failedToGetLocation() {
  console.log("There is some issue");
}

currBtn.addEventListener("click", (evt) => {
  document.querySelector(".loading").style.display = "block";
  document.querySelector(".weather").style.display = "none";
  let location = navigator.geolocation.getCurrentPosition(
    gotLocation,
    failedToGetLocation
  );
});
