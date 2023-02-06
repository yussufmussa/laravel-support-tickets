@extends('customer.layouts.base')
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
    @if(Session::has('message'))
   <div class="alert alert-success" >
   {{ Session::get('message') }}
   </div>
    @endif
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Create Ticket</h3>
                <div class="card-tools">
                    <a href="{{route('customer.ticket.index')}}" class="btn btn-primary">Ticket list</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('customer.ticket.store')}}" method="post">@csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ForlabelName">Title</label>
                                <input type="text" name="title" id="name" class="@error('title') is-invalid @enderror form-control" value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ForlabelName">Description</label>
                                <textarea  name="description" id="name" class="@error('description') is-invalid @enderror form-control" rows="5" cols="10" value="{{old('description')}}"></textarea>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ForlabelName">Labels</label><br/>
                                
                                @foreach($labels as $label)
                                <div class="form-check">
                                <input type="checkbox"  name="label_id[]" class="@error('label_id') is-invalid @enderror form-check-input" value="{{$label->id}}">{{ $label->name }}
                                </div>
                                @endforeach

                                @error('label_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ForlabelName">Categories</label><br/>
                                
                                @foreach($categories as $category)
                                <div class="form-check">
                                <input type="checkbox"  name="category_id[]" class="@error('category_id') is-invalid @enderror form-check-input" value="{{$category->id}}">{{ $category->name }}
                                </div>
                                @endforeach

                                @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ForlabelName">Priority</label>
                               <select name="priority"  class="form-control">
                                <option value="">--Select Priority--</option>
                                @foreach ($priorities as  $priority)
                                <option value="{{$priority->name}}">{{$priority->name}}</option>
                                @endforeach

                               </select>
                                @error('priority')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ForlabelName">Attach Screenshot</label>
                               <input type="file" name="attachments"  class="form-control">
                               </select>
                                @error('attachments')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>



        </div><!-- /.container-fluid -->
</section>


@endsection
@section('extra_js')