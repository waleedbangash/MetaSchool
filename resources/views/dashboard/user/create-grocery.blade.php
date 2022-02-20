@extends('layouts.master')
@section('content')
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <div>
                    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
                </div>
                <div>
                    @if (\Session::has('error'))
                    <div class="alert alert-error">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                @endif
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                </div>
            <h3 class="box-title">Create grocery</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('grocery.storeGrocery')}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" class="form-control" name="description">
            </div>

            <div class="form-group">
                <label>Dead line</label>
                <input type="datetime-local"  name="deadline">
            </div>
        </div><!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
    </div>
 </section>
@endsection
<style>
    .error
    {
        color: red;
    }
</style>
