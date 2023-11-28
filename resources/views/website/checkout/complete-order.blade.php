@extends('website.master')
@section('title', 'complete order')
@section('body')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('home')}}" rel="nofollow">Home</a>
            <span></span> Checkout
            <span></span> Checkout complete
        </div>
    </div>
</div>
@if(Session::has('message'))
    <div class="alert alert-block alert-success col-8 offset-2">
        <i class=" fa fa-check cool-green "></i>
        {{ nl2br(Session::get('message')) }}
    </div>
@endif

@endsection
