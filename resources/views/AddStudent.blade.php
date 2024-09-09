@extends('layout.app')
@section('content')


<form action="/student/store" method="post">
    @csrf

    <label for="name" class="form-label">Name</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="phone" class="form-label">Phone</label>
    <input type="text" id="phone" name="phone">
    <br>
    <label for="email" class="form-label">Email</label>
    <input type="text" id="email" name="email">
    <br>
    <label for="address" class="form-label">Address</label>
    <input type="text" id="address" name="address">
    <br>
    <label for="class" class="form-label">class</label>
    <input type="text" id="class" name="class">
    <br>
    <label for="section" class="form-label">section</label>
    <input type="text" id="section" name="section">
    <br>
    <button type="submit" class="btn btn-primary" >Submit</button>
    
</form>
@endsection