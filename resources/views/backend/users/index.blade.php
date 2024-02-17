@extends('backend.layouts.main')

@section('title', 'Users')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <livewire:backend.user>
        
    </div>
</div>
@endsection 
@push('js')
    <!-- password-addon init -->
    <script src="{{ url('backend/assets/js/pages/password-addon.init.js') }}"></script>
@endpush