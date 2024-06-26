@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Backup')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-md-12 mb-30">
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
                                <i class="fas fa-table me-1"></i>All backup List
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="pd-20">
                            <h4 class="text-blue text-center h4">All Backup list</h4>
                        </div>
                        <div class="pb-20">
                            @if (count($backups) > 0)
                                <ul class="list-group">
                                    @foreach ($backups as $backup)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a class="text-primary" href="{{ url('backups/laravel/' . $backup->getFilename()) }}"
                                                target="_blank">
                                                {{ $backup->getFilename() }}
                                            </a> <span class="badge badge-primary badge-pill">
                                                {{ number_format($backup->getSize() / (1024 * 1024), 2) }} MB</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-center h4">No backups found.</p>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')
    @endpush
