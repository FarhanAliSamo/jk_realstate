@extends('frontend.template')

@section('styles')

<form action="/appointment" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="datetime-local" name="date_time" required>
    <button type="submit">Submit</button>
</form>
@endsection