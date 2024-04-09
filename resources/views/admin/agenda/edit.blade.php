@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
        <small>Agenda</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
            <!-- form start -->
            <form action="{{route('update.agenda')}}" method="POST" enctype="multipart/form-data">
			@csrf
            <input type="hidden" name="id" value="{{$data->id}}">
              <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Nama Kegiatab: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="{{$data->nama}}" placeholder="Enter nama">
                        @error('nama')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Agenda: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="agenda" value="{{$data->agenda}}" placeholder="Enter Agenda">
                        @error('agenda')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Tanggal: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal" value="{{$data->tanggal}}" placeholder="Enter tanggal">
                        @error('tanggal')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Waktu: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="time" name="time" value="{{$data->time}}" placeholder="Enter Waktu">
                        @error('time')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Lokasi: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="lokasi" value="{{$data->lokasi}}" placeholder="Enter Lokasi">
                        @error('lokasi')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
              </div><!-- /.box-body -->

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