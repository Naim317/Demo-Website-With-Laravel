@extends('Layout.app')

@section('title','Home')
@section('content')

<div class="container mt-2">
<div class="row">


<div class="col-md-4 p-2 ">
<div class="card bg-primary text-dark">
<div class="card-body">
<h4 class="count-card-title text-center">{{$Total_visitor}}</h4>
<h4 class="count-card-text text-center">Total Visitor</h4>
</div>
</div>
</div>

<div class="col-md-4 p-2">
<div class="card bg-warning text-dark">
<div class="card-body">
<h4 class="count-card-title text-center">{{$Total_service}}</h4>
<h4 class="count-card-text text-center">Total Service</h4>
</div>
</div>
</div>

<div class="col-md-4 p-2">
<div class="card bg-info text-dark">
<div class="card-body">
<h4 class="count-card-title text-center">{{$Total_course}}</h4>
<h4 class="count-card-text text-center">Total Course</h4>
</div>
</div>
</div>

<div class="col-md-4 p-2">
<div class="card bg-secondary text-dark">
<div class="card-body">
<h4 class="count-card-title text-center">{{$Total_project}}</h4>
<h4 class="count-card-text text-center">Total Project</h4>
</div>
</div>
</div>

<div class="col-md-4 p-2">
<div class="card bg-danger text-dark">
<div class="card-body">
<h4 class="count-card-title text-center">{{$Total_contact}}</h4>
<h4 class="count-card-text text-center">Total Contact</h4>
</div>
</div>
</div>

<div class="col-md-4 p-2">
<div class="card bg-secondary text-dark">
<div class="card-body">
<h4 class="count-card-title text-center">{{$Total_review}}</h4>
<h4 class="count-card-text text-center">Total Review</h4>
</div>
</div>
</div>



</div>
</div>
@endsection