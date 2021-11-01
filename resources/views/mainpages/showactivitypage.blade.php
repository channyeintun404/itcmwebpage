@extends('mainpages.layout')
<link href="{{ asset('css/activities_list.css') }}" rel="stylesheet"> 
@section('content') 

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="/mainpage/activity"> Back</a>
            </div>
        </div>
    </div>

<div class="center " id="top"  >
    <div class="col-md-7 "  >
        <div class="card card-success">
            <div class="head">
                <div class="card-header">           
                <h3 class="card-title"> {{ $activity->Title }}</h3>
                </div>
            </div>

<div class="card-body">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">              
            <img src="{{ asset('storage/activityimages/'.$activity->Images) }}" class="img-fluid" >          
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Activities_Date:</strong>{{ $activity->Activities_Date }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>{{ $activity->Description }}
        </div>
    </div> 
</div>

<div class="delete">
     
        <form method="POST" action="{{route('delete')}}" >
        @csrf
          <input type="text" name="id" value="{{$activity->id}}" hidden>
           <div  class="row">
                <a class="btn btn-primary" href="/mainpage/activity/{{$activity->id}}/edit">Update</a>
                <div class="col-sm-2"><button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this activity?')"> Delete </button></div>                            
           </div>               
       </form>
</div> 

@endsection
