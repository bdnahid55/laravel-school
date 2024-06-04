@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview Slider')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <div class="card card-box">

                    <div class="card-body">
                        <h2>Title : {{ $preview_slider->title }}</h2><br>
                        Slider Image : <img src="/uploads/slider/{{ $preview_slider->image }}">
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
@endpush
