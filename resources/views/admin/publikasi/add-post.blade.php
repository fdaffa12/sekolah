@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
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
            <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
			@csrf
              <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Judul: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="post_title" value="{{old('title')}}" placeholder="Enter Judul">
                        @error('post_title')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Publikasi: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="postcat_id" data-placeholder="Choose Category">
                        <option label="Choose Category"></option>
                        @foreach($publikasi as $category)
                        <option value="{{$category->id}}">{{$category->nama}}</option>
                        @endforeach
                      </select>
                        @error('postcat_id')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="image" value="{{old('title')}}" placeholder="Enter Judul">
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