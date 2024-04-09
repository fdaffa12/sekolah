@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Struktur</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Pendidikan</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($struktur as $post)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td><img src="{{asset($post->image)}}" width="100px;" height="80px;" style="border-radius:10px;" alt=""></td>
                  <td>{{ $post->nama }}</td>
                  <td>{{ $post->nip }}</td>
                  <td>{{ $post->tempat_lahir }}, {{$post->tanggal_lahir}}</td>
                  <td>{{ $post->pendidikan }}</td>
                  <td>{{ $post->jabatan }}</td>
                  <td>
                  @if( $post->status == 0 )
                  <a href="{{ url('admin/publish-struktur/'.$post->id) }}" class="btn btn-xs btn-primary">Publish</a>
                  @else
                  <label class="label label-info">Sudah Dipublish</label> 
                  <a href="{{ url('admin/draft-struktur/'.$post->id) }}" class="btn btn-xs btn-danger"> Draft</a>
                  @endif
                  </td>
                  <td>
                    <div style="width:60px">
                        <a href="{{url('admin/edit-struktur/'.$post->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{url('admin/delete-struktur/'.$post->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs btn-info" id="detail"><i class="fa fa-trash-o"></i></a>
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div> <!-- end content wrapper -->

@endsection