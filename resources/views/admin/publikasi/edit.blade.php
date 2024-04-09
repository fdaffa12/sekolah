@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Publikasi</h3>
                </div>
            <!-- form start -->
            <form action="{{route('update-publikasi')}}" method="POST" enctype="multipart/form-data">
			      @csrf
                  <input type="hidden" name="id" value="{{$publikasi->id}}">
              <div class="box-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="{{$publikasi->nama}}" placeholder="Enter Nama">
                        @error('nama')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
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
      <!-- /.row -->
    </section>
    <!-- /.content -->

    

</div> <!-- end content wrapper -->
@endsection