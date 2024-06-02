@extends('back.layout.editor-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview download')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <div class="card card-box">

                    <div class="card-body">
                        <h2>Page Name: {{ $preview_download->title }}</h2><br>

                        File: <a class="btn btn-sm btn-primary" href="{{url('uploads/download',$preview_download->description)}}">Open</a><br><br>

                        [নোটিশ : পিডিএফ পড়তে মজিলা ফায়ারফক্স বা গুগল ক্রোমের সর্বশেষ সংস্করণ ব্যবহার করুন।] <br>
                        [Notice: Use Mozilla Firefox or Google Chrome latest vesion to open pdf. ]
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
@endpush
