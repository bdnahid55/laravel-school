@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Make Menu')
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
            <h4 class="text-blue h4">Page list</h4>
        </div>
        <div class="pb-20">
            {{-- <table class="table hover data-table-export nowrap"> --}}
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">ID</th>
                        <th>Page Name</th>
                        <th>Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $pagedata)
                        <tr>
                            <td class="table-plus">{{ $pagedata->id }}</td>
                            <td>{{ $pagedata->title }}</td>
                            <td>{{ env('APP_URL') }}/{{ $pagedata->slug }}</td>
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

    <!-- Menu Add form -->

    <div class="col-sm-12 mb-30">
        <div class="card-body">

            <div class="card card-box">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <i class="fas fa-table me-1"></i>Create Menu
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.menu.store-menu') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Menu Title</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Type menu title" required>
                            @error('name')
                                <div style="color: red">{{ $message }}</div><br>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Parent Menu</label>
                            <select class="form-control" name="parent_id">
                                <option value="" selected></option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>

                            @error('parent_id')
                                <div style="color: red">{{ $message }}</div><br>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Menu Link</label>
                            <input type="url" name="url" class="form-control" value="{{ old('url') }}"
                                placeholder="Type url" required>
                            @error('url')
                                <div style="color: red">{{ $message }}</div><br>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Menu Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order') }}"
                                placeholder="Type order" required>
                            @error('order')
                                <div style="color: red">{{ $message }}</div><br>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Menu Add form end -->

    <!-- Menu output preview -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Preview Menu</h4>
        </div>
        <div class="pb-20">
            <ul class="nav justify-content-center">
                @foreach ($menus as $menu)
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
    </div>
    <!-- Menu output preview -->

@endsection
