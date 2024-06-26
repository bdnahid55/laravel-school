@extends('back.layout.editor-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview Page')
@section('content')
    {{-- main content --}}

     <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <div class="card card-box">

                    <div class="card-body">
                        <h2>Page Name: {{ $preview_page->title }}</h2>
                        <i>Page display on section: {{ $preview_page->display_section }}</i>
                        <p>Slug: <b>{{ $preview_page->slug }}</b></p>
                        <p>{!! $preview_page->content !!}</p>
                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')

    @endpush
