@extends('mainpages.layout')
@section('content')
<link href="{{ asset('css/activities_list.css') }}" rel="stylesheet"> 

<div class="list-type2"> 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('mainpages.index') }}"> Back Mainpage</a>
        </div>
    </div>
</div>  
<h1>Activities list</h1>
<form action="{{route('deleteall')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >

{{ csrf_field() }}


<ul  id="top">
@if($activities->isEmpty())
<input type="checkbox" id="master"style="margin-left: 12px" disabled>
<button  style="margin-bottom: 10px" class="btn btn-primary delete_all button delete-confirm" value="delete" disabled >Delete All Selected</button>
@else
<input type="checkbox" id="master"style="margin-left: 12px">
<button  style="margin-bottom: 10px" class="btn btn-primary delete_all button delete-confirm" value="delete"  >Delete All Selected</button>

@endif
@foreach ($activities as $activity)   
  <li id="li_{{$activity->id}}">
    <div class="content"><input type="checkbox" name="activity[]" class="sub_chk" data-id="{{$activity->id}}" value="{{ $activity->id }}">
    <a href="/mainpage/activity/{{$activity->id}}">{{ $activity->Title }}, {{ $activity->Images }}, {{ $activity->Activities_Date }},{{Str::limit($activity->Description, 20)}}  </a>
    </div>
   </li>
@endforeach

</ul>

<div class="row" >
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" id="top">
            <a class="btn btn-success" href="activity/create"> Activities Add</a>
        </div>
    </div>
</div>

</form>
@endsection
