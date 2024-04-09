@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-9">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Statistik Goldarah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Statistik</th>
                  <th>Laki-laki</th>
                  <th>Perempuan</th>
                  <th>Jumlah Penduduk</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($goldarah as $data)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $data->statistik }}</td>
                  <td>{{ $data->pria }}</td>
                  <td>{{ $data->perempuan }}</td>
                  <td>{{ $data->jumlah }}</td>
                  <td>
                  @if( $data->status == 0 )
                  <a href="{{ url('admin/publish-goldarah/'.$data->id) }}" class="btn btn-xs btn-primary">Publish</a>
                  @else
                  <label class="label label-info">Sudah Dipublish</label> 
                  <a href="{{ url('admin/draft-goldarah/'.$data->id) }}" class="btn btn-xs btn-danger"> Draft</a>
                  @endif
                  </td>
                  <td>
                    <div style="width:60px">
                        <a href="{{url('admin/edit-goldarah/'.$data->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{url('admin/delete-goldarah/'.$data->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs btn-info" id="detail"><i class="fa fa-trash-o"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
                <tfoot>
                <tr>
                  <th colspan="2" style="text-align:right;">Total</th>
                  <th>{{$pria}}</th>
                  <th>{{$perempuan}}</th>
                  <th>{{$total}}</th>
                  <th colspan="2"></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Statistik Goldarah</h3>
                </div>
            <!-- form start -->
            <form action="{{route('goldarah-store')}}" method="POST" enctype="multipart/form-data">
			      @csrf
              <div class="box-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Statistik: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="statistik" value="{{old('statistik')}}" placeholder="Enter statistik">
                        @error('statistik')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Pria: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="pria" value="{{old('pria')}}" placeholder="Enter pria">
                        @error('pria')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Perempuan: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="perempuan" value="{{old('wanita')}}" placeholder="Enter perempuan">
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
        <!-- /.col-->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    

</div> <!-- end content wrapper -->
@endsection