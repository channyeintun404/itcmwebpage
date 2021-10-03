@extends('homepages.layout')

 

@section('content')
<h1>Add Activities</h1>
<form action="{{route('store')}}" method="POST">
@csrf
<input type="button">
<button type="submit">send</button>

</form>

@endsection