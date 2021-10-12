@extends('homepages.layout')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8" style="align=center;">
<div class="card">
  <div class="card-header card-primary">
    <h2 class="card-title" style="color:white;">Add Activities</h3>
  </div>

<form action="{{route('store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
@csrf
  <div class="card-body">
    <div class="form-group">
      <label for="title">Title: {{$activity->Title}}</label>
      <input type="text" class="form-control" id="addactivity_title" name="addactivity_title" placeholder="Title" value="{{$activity->Title}}" hidden>
    </div>
    <div class="form-group">
      <label for="description">Description: {{$activity->Description}}</label>
      <textarea rows="10" cols="50" class="form-control" id="addactivity_description" name="addactivity_description" placeholder="Description" hidden>{{$activity->Description}}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Images: </label>
      <input type="file" id="addactivity_image" name="addactivity_image" value=" {{$activity->Images}}">
      <img src="/storage/activityimages/{{$activity->Images}}" alt="" style="width: 100px">
    </div>
    <div class="form-group">
      <label for="date">Activity_Date: {{$activity->Activities_Date}}</label>
      <input type="date" id="addactivity_date" name="addactivity_date" required class="form-control" value="{{$activity->Activities_Date}}" hidden>
    </div>
  </div>
  <div class="card-footer">
  <a href="mainpage/activity"><button class="btn btn-default btn-close">Cancel</button></a>
    <button type="submit" class="btn btn-primary">Save</button>
    <!-- <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a> -->
  </div>
</form>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection