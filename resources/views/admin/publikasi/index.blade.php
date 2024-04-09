@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Publikasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($publikasi as $page)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $page->nama }}</td>
                  <td>
                  @if( $page->status == 0 )
                  <a href="{{ url('admin/publish-publikasi/'.$page->id) }}" class="btn btn-xs btn-primary">Publish</a>
                  @else
                  <label class="label label-info">Sudah Dipublish</label> 
                  <a href="{{ url('admin/draft-publikasi/'.$page->id) }}" class="btn btn-xs btn-danger"> Draft</a>
                  @endif
                  </td>
                  <td>
                    <div style="width:60px">
                        <a href="{{url('admin/edit-publikasi/'.$page->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{url('admin/delete-publikasi/'.$page->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs btn-info" id="detail"><i class="fa fa-trash-o"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Publikasi</h3>
                </div>
            <!-- form start -->
            <form action="{{route('publikasi-store')}}" method="POST" enctype="multipart/form-data">
			      @csrf
              <div class="box-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="{{old('title')}}" placeholder="Enter Nama">
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