@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
        <small>Desa</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
            <!-- form start -->
            <form action="{{route('store.potensi')}}" method="POST" enctype="multipart/form-data">
			@csrf
              <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Potensi: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="potensi" value="{{old('potensi')}}" placeholder="Enter Judul">
                        @error('potensi')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                        <img src="{{asset('uploads')}}/default.png" onclick="triggerClick()" id="profileDisplay">
                        <input class="form-control" type="file" name="image" onchange="displayImage(this)" id="profileImage" >
                        @error('image')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleInputFile">Description</label>
                        <textarea id="editor1" name="description" rows="10" cols="80"></textarea>
                        @error('description')
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