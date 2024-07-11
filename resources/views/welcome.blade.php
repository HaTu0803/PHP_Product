@extends('layouts.app')
@section('title', 'Welcome')
@push('head')
<!-- <link rel="stylesheet" href="{{asset('customer/vendors/select2-4.0.13/dist/css/select2.min.css')}}"> -->
 <link rel="stylesheet" href="{{asset('customer/vendors/select2-4.0.13/dist/css/select2.min.css')}}">

@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    Welcome to the Customer package.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

