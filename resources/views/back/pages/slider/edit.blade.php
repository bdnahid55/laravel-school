@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit slider')
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
                                <i class="fas fa-table me-1"></i>Edit slider
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.slider.update-slider',$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $slider->title }}" placeholder="Title" required>
                                @error('title')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Select File</label><br>
                                <div style="color: red">[Note: Your image size for slider need to be 1000x300]</div><br>

                                @if ($slider->image == null)
                                    <p></p>
                                @else
                                    <p>Old Image: <img src="{{url('uploads/slider',$slider->image)}}"> <br><br></p>
                                @endif

                                <input type="file" name="image" class="form-control-file form-control height-auto">
                                @error('image')
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
