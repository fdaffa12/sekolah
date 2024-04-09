@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Message</small>
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
              <input type="hidden" name="id" value="{{encrypt('id')}}">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pengirim</th>
                  <th>Image</th>
                  <th>Pekerjaan</th>
                  <th>No Handpohone</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $dt)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $dt->nama }}</td>
                  <td><img src="{{asset($dt->image)}}" width="100px;" height="80px;" style="border-radius:10px;" alt=""></td>
                  <td>{{ $dt->pekerjaan }}</td>
                  <td>{{ $dt->phone }}</td>
                  <td>{{ $dt->email }}</td>
                  <td>{{substr($dt->comment,0,100)}} <a href="#expand{{$dt->id}}" data-toggle="modal">Expand</a> </td>
                  <td>{{ $dt->created_at->format('Y-m-d') }}</td>
                  <td>
                    <div style="width:60px">
                        <a href="{{url('admin/delete-message/'.$dt->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs btn-info" id="detail"><i class="fa fa-trash-o"></i></a>
                    </div>
                  </td>
                  <div class="modal" id="expand{{$dt->id}}">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="modal-title">Message Sent by : {{$dt->nama}}</h4>
                        </div>
                        <div class="modal-body">
                        {{$dt->comment}}
                        </div>
                        <div class="modal-footer">
                        <p>Sent on : {{$dt->created_at}}</p>
                        <p>Phone : {{$dt->phone}}</p>
                        <p>Email : {{$dt->email}}</p>
                        <a href="{{url('admin/reply-message/'.$dt->id)}}">Balas Pesan</a>
                        </div>
                    </div>
                    </div>
                </div>              
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