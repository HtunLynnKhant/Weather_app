<h1>Brief explanation</h1>
  -I used laravel, openweathermap api, and bootstrap to develop this weather app
  -Created a WeatherController to submit the form and get the weather data, handle request and output
  -In WeatherController,Validation is used to ensure city input.Constructs a URL using the provided city and the OpenWeatherMap API key from the environment variables. Makes an HTTP GET request to fetch weather data.
-If the API request is successful, it extracts and displays the city name, temperature, and weather description in the weather.showresult view.
-Logs errors if the API request fails or if an exception occurs, then redirects back with an error message.
