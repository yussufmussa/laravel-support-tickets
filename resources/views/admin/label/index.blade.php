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
       @if(Session::has('message'))
       <div class="alert alert-success alert-dismissible">
        {{ Session::get('message') }}
       </div>
       @endif
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">label List</h3>
                <div class="card-tools">
                  <a href="{{route('admin.label.create')}}" class="btn btn-primary">New label</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    <tbody>
                        @foreach($categories as $key => $label)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$label->name}}</td>
                            <td>
                                <a href="{{route('admin.label.edit', $label->id)}}"><i class="fa fa-pen-alt"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#label{{$label->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!--  -->
                                <div class="modal fade" id="label{{$label->id}}">
                                    <div class="modal-dialog">
                                        <form action="{{route('admin.label.destroy', $label->id)}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Alert</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure??</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Yes,I do</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>

        </div><!-- /.container-fluid -->
</section>


@endsection
@section('extra_js')