@extends('back.layout.editor-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview Page')
@section('content')
    {{-- main content --}}

     <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <div class="card card-box">

                    <div class="card-body">
                        <h2>Notice Name: {{ $preview_notice->title }}</h2>
                        <p>{!! $preview_notice->content !!}</p>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @push('scripts')

    @endpush
