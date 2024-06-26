@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Announcement')
@section('content')
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
    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">All announcement list</h4>
        </div>
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($announcements as $announcement)
                        <tr>
                            <td class="table-plus">{{ $announcement->id }}</td>
                            <td>{{ $announcement->title }}</td>
                            <td>{{ Str::substr($announcement->description, 0, 30) }}</td>
                            <td>
                                <a href="{{ route('admin.announcement.show-announcement', $announcement->id) }}"
                                    class="btn btn-square btn-warning waves-effect waves-light"><i class="fa fa-eye"></i></a>

                                <a href="{{ route('admin.announcement.edit-announcement', $announcement->id) }}"
                                    class="btn btn-square btn-warning waves-effect waves-light"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.announcement.delete-announcement', $announcement->id) }}"
                                    onclick="return confirm('Are you Sure to Delete it ?')"
                                    class="btn btn-square btn-danger waves-effect waves-light"><i
                                        class="fa fa-close"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center">No data found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <!-- Export Datatable End -->

@endsection

