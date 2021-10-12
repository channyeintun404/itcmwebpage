@extends('mainpages.layout')
<link href="{{ asset('css/activities_list.css') }}" rel="stylesheet"> 
@section('content')
@include('navbar')

<div class="list-type2">    
<ul  id="top">
@foreach ($activities as $activity)   
  <li>
    <div class="content"><a href="/mainpage/activity/{{$activity->id}}">{{ $activity->Title }}, {{ $activity->Images }}, {{ $activity->Activities_Date }}, {{Str::limit($activity->Description, 20)}}  </a></div>
   </li>
  @endforeach
</ul>
</div>
<a href="mainpage/activity">go activity</a>
@include('footer')
@endsection