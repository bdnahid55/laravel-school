@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Menu List')
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


    <!-- Menu output preview -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4 text-center"><u>Preview Menu</u></h4>
        </div>



        <div class="pb-20">
            <ul class="nav justify-content-center">
                @foreach ($menupreview as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $menu->url }}">{{ $menu->name }}</a>
                        <ul>
                            @foreach ($menu->children as $submenu)
                                <li class="nav-item"><a href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- test bootstarp preview --}}
        {{-- <div class="pb-20">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav justify-content-center">

                        @foreach ($menupreview as $menu)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"
                                    href="{{ $menu->url }}">{{ $menu->name }}
                                    @if (!empty($menu->children))
                                        <span class="caret"></span>
                                    @endif
                                </a>
                                @if (!empty($menu->children))
                                    <ul class="dropdown-menu">
                                        @foreach ($menu->children as $submenu)
                                            <li class="nav-item"><a href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </div>
            </nav>
        </div> --}}
        {{-- end test bootstarp preview --}}

    </div>
    <!-- Menu output preview -->

    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Page list</h4>
        </div>
        <div class="pb-20">
            {{-- <table class="table hover data-table-export nowrap"> --}}
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">ID</th>
                        <th>Menu Name</th>
                        <th>Parent id</th>
                        <th>Order</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menudata)
                        <tr>
                            <td class="table-plus">{{ $menudata->id }}</td>
                            <td>{{ $menudata->name }}</td>
                            <td>{{ $menudata->parent_id }}</td>
                            <td>{{ $menudata->order }}</td>
                            <td>{{ Str::substr($menudata->url, 0, 30) }}</td>
                            <td>
                                <a href="{{ route('admin.menu.edit-menu', $menudata->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.menu.delete-menu', $menudata->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">No data found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <!-- Export Datatable End -->


@endsection
