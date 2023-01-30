@extends('admin.layouts.base')
@section('extra_css')
@section('contents')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">

        <div class="card card-default">
            <div class="card-header">
            <h3 class="card-title">New user</h3>
                <div class="card-tools">
                  <a href="{{route('admin.user.index')}}" class="btn btn-primary">user List</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('admin.user.store')}}" method="post">@csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <user for="ForuserName">Full Name</user>
                                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <user for="ForuserName">Email</user>
                                <input type="email" name="email" id="name" class="@error('email') is-invalid @enderror form-control">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <user for="ForuserName">Password</user>
                                <input type="password" name="password" id="name" class="@error('password') is-invalid @enderror form-control">
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
            </div>
            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
        </div>



    </div><!-- /.container-fluid -->
</section>


@endsection
@section('extra_js')