@extends('backend.layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{ route('frontend.dashboard') }}" class="btn btn-primary mb-3">Dashboard</a>
    </div>
    <div class="col-lg-12">

        <livewire:frontend.message>
        
    </div>
</div>
@endsection 