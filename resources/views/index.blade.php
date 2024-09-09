@extends('layout.app')
@section('content')
<button type="button" class="btn btn-warning" onclick="window.location.href='/student/create'">Add</button>
<button type="button" class="btn btn-warning" onclick="window.location.href='/student/update'">update</button>
<div class="alert alert-success">
  {{ session('message') }}
</div>


<ul>
  @foreach($student as $Student)
      <li>{{$Student->name}} - {{$Student->email}} </li>
  @endforeach
</ul>

@endsection
