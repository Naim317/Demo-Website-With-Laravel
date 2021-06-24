@extends('Layout.app')
@section('title','Home Page')

@section('content')

 @include('Component.HomeBanner')
 @include('Component.HomeService')
 @include('Component.HomeCourse')
 @include('Component.HomeProject')
 @include('Component.HomeContact')
 @include('Component.HomeQuote')





@endsection
