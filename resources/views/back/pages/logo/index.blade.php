@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Update School Logo')
@section('content')
    {{-- --- --}}
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

    <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <!-- alert -->
            <div class="card-body">
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
                                <i class="fas fa-table me-1"></i>Update School Logo
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update-logo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Alterative name</label>
                                <input type="text" name="name" value="{{ $Logo->name }}" class="form-control"
                                    required>
                                @error('name')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label><u>Select new School Logo</u></label><br>
                                Old Image: <img src="{{url('uploads/logo',$Logo->image)}}"> <br><br>

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


    @push('scripts')
        <script>
            //$(document).ready(function() {
            //
            //});
        </script>
    @endpush
