@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update
        <small>Pages</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
            <!-- form start -->
            <form action="{{route('update-pages')}}" method="POST" enctype="multipart/form-data">
			@csrf
            <input type="hidden" name="id" value="{{$pages->id}}">
              <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Judul: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="judul" value="{{$pages->judul}}" placeholder="Enter Judul">
                        @error('judul')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleInputFile">Description</label>
                        <textarea id="editor1" name="description" rows="10" cols="80">{{$pages->description}}</textarea>
                        @error('judul')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection