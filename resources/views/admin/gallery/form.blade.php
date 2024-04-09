  

                <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"class="form-control" name="title" id="title">
                        @error('title')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="20" rows="15" class="form-control"></textarea>
                    @error('body')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                    <img src="{{asset('uploads')}}/default.png" onclick="triggerClick()" id="profileDisplay">
                    <input class="form-control" type="file" name="image" onchange="displayImage(this)" id="profileImage" >
                    @error('image')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>