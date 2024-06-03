@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Important Link')
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
            <h4 class="text-blue h4">All important link list</h4>
        </div>
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">ID</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($importantlinks as $importantlink)
                        <tr>
                            <td class="table-plus">{{ $importantlink->id }}</td>
                            <td>{{ $importantlink->title }}</td>
                            <td>{{ Str::substr($importantlink->url, 0, 30) }}</td>
                            <td>
                                <a href="{{ route('admin.importantlink.show-importantlink', $importantlink->id) }}"
                                    class="btn btn-square btn-warning waves-effect waves-light"><i class="fa fa-eye"></i></a>

                                <a href="{{ route('admin.importantlink.edit-importantlink', $importantlink->id) }}"
                                    class="btn btn-square btn-warning waves-effect waves-light"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.importantlink.delete-importantlink', $importantlink->id) }}"
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

