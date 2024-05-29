@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Website Settings')
@section('content')
    <div class="pd-20 card-box mb-4">
        <div class="tab">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#generalSettings" role="tab" aria-selected="false">Generel Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#logoFavicon" role="tab" aria-selected="false">Logo & Favicon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#socialNetworks" role="tab" aria-selected="true">Social Networks</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#paymentMethods" role="tab" aria-selected="true">Payment Methods</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="generalSettings" role="tabpanel">
                    <div class="pd-20">

                        <form action="{{ route('admin.settings-update') }}" method="POST">
                            @csrf

                            <div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label><b>Website Name</b></label>
										<input type="text" name="site_name" value="{{ $GeneralSettings->site_name }}" placeholder="Enter Website name" class="form-control">
                                        @error('site_name')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label><b>Website Email</b></label>
										<input type="email" name="site_email"value="{{ $GeneralSettings->site_email }}" placeholder="Enter Website email" class="form-control">
                                        @error('site_email')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror
									</div>
								</div>
                                <div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label><b>Website Phone</b></label>
										<input type="number" name="site_phone" value="{{ $GeneralSettings->site_phone }}" placeholder="Enter Website phone number" class="form-control">
                                        @error('site_phone')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label><b>Website Meta Keywords</b></label>
                                        <small class="text-muted">
                                            Separate multiple by comma (Ex: a,b,c)
                                        </small>
										<input type="text" name="site_meta_keywords" value="{{ $GeneralSettings->site_meta_keywords }}"  placeholder="Enter Website meta keywords" class="form-control">
                                        @error('site_meta_keywords')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror
									</div>
								</div>
                                <div class="col-md-12 col-sm-12">
									<div class="form-group">
                                        <label><b>Website Meta Description</b></label>
                                        <textarea class="form-control" name="site_meta_description" placeholder="Enter Website meta description">{{ $GeneralSettings->site_meta_description }}</textarea>
                                        @error('site_meta_description')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror
									</div>
								</div>
							</div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
                <div class="tab-pane fade" id="logoFavicon" role="tabpanel">
                    <div class="pd-20">
                        Logo & Favicons comming soon .............
                    </div>
                </div>
                <div class="tab-pane fade" id="socialNetworks" role="tabpanel">
                    <div class="pd-20">
                        Social Networks comming soon .......
                    </div>
                </div>
                <div class="tab-pane fade" id="paymentMethods" role="tabpanel">
                    <div class="pd-20">
                        Payment Methods comming soon ........
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
