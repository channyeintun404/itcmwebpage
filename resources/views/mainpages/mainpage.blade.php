@extends('mainpages.layout')

 

@section('content')

   
      <p class="testing">Main Page</p>
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">93,139</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->

@endsection