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

<form action="{{route('addconfirm')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
@csrf
  <div class="card-body">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="addactivity_title" name="addactivity_title" placeholder="Enter title" size="10">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea rows="10" cols="50" class="form-control" id="addactivity_description" name="addactivity_description" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
      <label for="image">Images:</label>
      <input type="file" id="addactivity_image" name="addactivity_image">
    </div>
    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" id="addactivity_date" name="addactivity_date" required class="form-control">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Confirm</button>
    <a href="/mainpage/activity" class="btn btn-primary">Back</a>
  </div>
</form>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection