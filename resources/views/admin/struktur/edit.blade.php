@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
        <small>Struktur</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
            <!-- form start -->
            <form action="{{route('update.struktur')}}" method="POST" enctype="multipart/form-data">
			@csrf
            <input type="hidden" name="id" value="{{$data->id}}">
              <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="{{$data->nama}}" placeholder="Enter nama">
                        @error('nama')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Nip: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nip" value="{{$data->nip}}" placeholder="Enter nip">
                        @error('nip')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Tempat Lahir: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" placeholder="Enter tempat lahir">
                        @error('tempat_lahir')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Tanggal Lahir: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" placeholder="Enter tanggal_lahir">
                        @error('tanggal_lahir')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Pendidikan: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="pendidikan" value="{{$data->pendidikan}}" placeholder="Enter pendidikan">
                        @error('pendidikan')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Jabatan: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="jabatan" value="{{$data->jabatan}}" placeholder="Enter jabatan">
                        @error('jabatan')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Foto Pejabat: <span class="tx-danger">*</span></label>
                        <img src="{{asset($data->image)}}" onclick="triggerClick()" id="profileDisplay">
                        <input class="form-control" type="file" name="image" onchange="displayImage(this)" id="profileImage" >
                        @error('image')
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
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection

<script>
  function triggerClick(){
    document.querySelector('#profileImage').click();
  }

  function displayImage(e){
    if(e.files[0]){
      var reader = new FileReader();

      reader.onload = function(e){
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }
</script>

<style>
  #profileDisplay {
    display: block;
    width: 60%;
    height: 120px;
    margin: 10px auto;
    border-radius: 16px;
  }
</style>