@extends('back.layout.editor-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview important link')
@section('content')
    {{-- main content --}}

     <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <div class="card card-box">

                    <div class="card-body">
                        <p><b>Important Link Name:</b> {{ $preview_importantlink->title }}</p>
                        <p><b>Important Link url:</b> {{ $preview_importantlink->url }}</p>

                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')

    @endpush
