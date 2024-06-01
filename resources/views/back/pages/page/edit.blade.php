@extends('back.layout.editor-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Page')
@section('content')
    {{-- main content --}}

     <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <!-- alert -->
                <?php if( Session::get('success') != null){ ?>

                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon">
                        <i class="icon-check"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong><?php echo Session::get('success'); ?> </strong></span>
                    </div>
                </div>
                <?php Session::put('success',null); } ?>

                <?php if( Session::get('failed') != null){ ?>

                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon">
                        <i class="icon-close"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong><?php echo Session::get('failed'); ?> </strong></span>
                    </div>
                </div>
                <?php Session::put('failed',null); } ?>
                <!-- end alert -->

                {{-- alert message --}}
                <div id="success_message"></div>

                <div class="card card-box">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <i class="fas fa-table me-1"></i>Edit page
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.page.update-page',$page->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Page Titile</label>
                                <input type="text" name="title" class="form-control" value="{{ $page->title }}" placeholder="Page name" required>
                                @error('title')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label><br>
                                <textarea id="summernote" name="content"> {{ $page->content }} </textarea>

                                <script>
                                    $('#summernote').summernote({
                                      placeholder: 'Write page content',
                                      tabsize: 2,
                                      height: 300,
                                      toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'underline', 'clear']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['table', ['table']],
                                        ['insert', ['link', 'picture', 'video']],
                                        ['view', ['fullscreen', 'codeview', 'help']]
                                      ]
                                    });
                                  </script>
                                @error('content')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endsection
