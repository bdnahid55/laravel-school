@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Update Footer')
@section('content')
    {{-- --- --}}

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
                                <i class="fas fa-table me-1"></i>Update Footer
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.footer.update-footer') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Footer Text</label>
                                <input type="text" name="title" value="{{ $Footer->title }}" class="form-control"
                                    required>
                                @error('title')
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

    @endpush
