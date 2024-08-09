@extends('layout.main')

@section('content')
<div class="text-center">
    <p class="lead"><strong>City:</strong> {{ $city }}</p>
    <p class="lead"><strong>Temperature:</strong> {{ $temperature }}°C</p>
    <p class="lead"><strong>Weather:</strong> {{ $description }}</p>
    <p class="lead"><strong>Date and Time:</strong> {{ $dateTime }}</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Check another city</a>
</div>
    
@endsection