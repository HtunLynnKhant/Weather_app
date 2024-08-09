@extends('layout.main')

@section('content')
<h1>Check Weather</h1>

<form action="{{ route('weather.fetch') }}" method="POST">
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">City:</label>
        </div>
        <div class="col-auto">
            <input type="text" id="city" class="form-control" name="city" required>
        </div>
        <div class="col-auto">
        <button type="submit" class="btn btn-primary">Check Weather</button>
        </div>
    </div>   
</form>

@if($errors->any())
    <div class="alert alert-danger mt-3">
        <strong>{{ $errors->first() }}</strong>
    </div>
@endif

@endsection