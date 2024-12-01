@extends('superadmin.layouts.app')
@section('breadcrumbs')
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('superadmin.admin.index')}}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin Edit</li>
        </ol>
    </nav>
</div>
@endsection
@section('content')
    <div class="row layout-spacing mt-3">
        <div id="flLoginForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Admin</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form method="post" action="{{ route('superadmin.admin.update',$admin) }}" name="form" class="row g-3" id="adminEditForm">
                        @method('put')
                        @csrf
                        <div class="col-md-8">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$admin->name}}">
                        </div>

                        <div class="col-md-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{$admin->email}}">
                        </div>

                        <div class="col-md-8">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('assets/src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endpush
@push('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/src/assets/js/scrollspyNav.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>
        $(document).ready(function() {
            $('#adminEditForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        minlength: 6
                    }
                },
                messages: {
                    name: {
                        required: "Please enter the admin's name"
                    },
                    email: {
                        required: "Please enter the admin's email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        minlength: "Your password must be at least 6 characters long"
                    }
                },
                errorPlacement: function(error, element) {
                    error.css('color', 'red');
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
