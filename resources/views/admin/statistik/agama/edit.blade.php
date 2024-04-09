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
                            <h3 class="box-title">Edit Statistik Agama</h3>
                        </div>
                    <!-- form start -->
                    <form action="{{route('update.agama')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="box-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Statistik: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="statistik" value="{{$data->statistik}}" placeholder="Enter statistik">
                                @error('statistik')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Pria: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="pria" value="{{$data->pria}}" placeholder="Enter pria">
                                @error('pria')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Perempuan: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="perempuan" value="{{$data->perempuan}}" placeholder="Enter perempuan">
                                @error('perempuan')
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
            </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    

</div> <!-- end content wrapper -->
@endsection