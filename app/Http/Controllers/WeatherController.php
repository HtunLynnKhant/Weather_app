<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather.index');
    }

    // Fetch weather data from API
    public function fetchweather(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENWEATHERMAP_API_KEY');
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

        try {
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                $weatherData = $response->json();

                // Ensure the expected data is available in the response
                $cityName = $weatherData['name'] ?? 'Unknown';
                $temperature = $weatherData['main']['temp'] ?? 'N/A';
                $description = $weatherData['weather'][0]['description'] ?? 'No description';

                return view('weather.showresult', [
                    'city' => $cityName,
                    'temperature' => $temperature,
                    'description' => $description,
                    'dateTime' => now()->format('Y-m-d H:i:s')
                ]);
            } else {
                // Log the API error and return with an error message
                \Log::error('Weather API Error: ' . $response->body());
                return redirect()->back()->withErrors('City not found');
            }
        } catch (\Exception $e) {
            // Log the exception and return with a generic error message
            \Log::error('Weather API Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors('Something went wrong. Please try again later.');
        }
    }
}
