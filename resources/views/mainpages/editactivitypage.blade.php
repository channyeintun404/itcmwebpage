
@extends('homepages.layout')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8" style="align=center;">
<div class="card">
  <div class="card-header card-primary">
    <h3 class="card-title">Confirm Upadate Activities</h3>
  </div>
<form action="{{route('updateconfirm')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
@csrf
  <div class="card-body">
      
  <input type="text" name="id" value="{{$activity->id}}" hidden>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="activity_title" name="activity_title" placeholder="Enter email" value="{{$activity->Title}}" >
    </div>
    <div class="form-group">
      <label for="description">Description: </label>
      <textarea rows="10" cols="50" class="form-control" id="activity_description" name="activity_description" placeholder="Description" >{{$activity->Description}}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Images:</label>
      <input type="file" id="activity_image" name="activity_image" value="{{$activity->Images}}" >
    </div>
    <div class="form-group">
      <label for="date">Activity_Date:</label>
      <input type="date" id="activity_date" name="activity_date" required class="form-control" value="{{$activity->Activities_Date}}" >
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Confirm</button>
  </div>
</form>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection