@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Setting</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
            <!-- form start -->
            @if ($data->count() < 1)
            <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
              <div class="box-body">
                    <div class="form-group">
                        <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                        <input type="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                        @error('phone')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Fax: <span class="tx-danger">*</span></label>
                        <input type="fax" name="fax" class="form-control" placeholder="Enter your fax number">
                        @error('fax')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">About</label>
                        <textarea name="about" class="form-control" rows="10"></textarea>
                        @error('about')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                        <textarea name="address" class="form-control"></textarea>
                        @error('address')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div id="socialFieldGroup">
                        <div class="form-group">
                            <label>Social</label>
                            <input type="url" name="social[]" class="form-control" >
                            <p class="text-muted">e.g https://www/facebook.com/webtrickshome</p>
                        </div>
                    </div>
                    <div class="text-right form-group">
                        <span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Sorry !</strong> You've reached the social fields limit.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                        <img src="{{asset('uploads')}}/default.png" onclick="triggerClick()" id="profileDisplay">
                        <input class="form-control" type="file" name="image" onchange="displayImage(this)" id="profileImage" >
                        @error('image')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <script>
            var socialCounter = 1;
            $('#addSocialField').click(function(){
                socialCounter++;
                if(socialCounter > 5){
                    $('#socialAlert').removeClass('noshow');
                    return;
                }
                    newDiv = $(document.createElement('div')).attr("class","form-group");
                    newDiv.after().html('<input type="url" name="social[]" class="form-control" ></div>');
                    newDiv.appendTo("#socialFieldGroup");
                })
            </script>
            @else
            <form action="{{route('update.setting')}}" method="POST" enctype="multipart/form-data">
			@csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="box-body">
                    <div class="form-group">
                        <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                        <input type="phone" name="phone" class="form-control" placeholder="Enter your phone number" value="{{$data->phone}}">
                        @error('phone')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Fax: <span class="tx-danger">*</span></label>
                        <input type="fax" name="fax" class="form-control" placeholder="Enter your fax number" value="{{$data->fax}}">
                        @error('fax')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{$data->email}}">
                        @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">About</label>
                        <textarea name="about" class="form-control" rows="10">{{$data->about}}</textarea>
                        @error('about')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                        <textarea name="address" class="form-control">{{$data->address}}</textarea>
                        @error('address')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                <div id="socialFieldGroup">
					<div class="form-group">
						<label>Social</label>
                            @foreach($data->social as $social)
                            <div class="form-group" >
                                <input type="url" name="social[]" class="form-control socialCount" value="{{$social}}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-right form-group">
                        <span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Sorry !</strong> You've reached the social fields limit.
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                        <img src="{{asset($data->image)}}" onclick="triggerClick()" id="profileDisplay">
                        <input class="form-control" type="file" name="image" onchange="displayImage(this)" id="profileImage" >
                        @error('image')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <script>
            socialCounter = $('.socialCount').length;
            $('#addSocialField').click(function(){
                socialCounter++;
                if(socialCounter > 5){
                    $('#socialAlert').removeClass('noshow');
                    return;
                }
                    newDiv = $(document.createElement('div')).attr("class","form-group");
                    newDiv.after().html('<input type="url" name="social[]" class="form-control" ></div>');
                    newDiv.appendTo("#socialFieldGroup");
                })
            </script>
            @endif
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

<style>
  #profileDisplay {
    display: block;
    width: 60%;
    height: 120px;
    margin: 10px auto;
    border-radius: 16px;
  }
</style>
<style>
	.noshow{display: none;}
</style>

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