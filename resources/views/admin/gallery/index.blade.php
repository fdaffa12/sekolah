@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">

<section class="content">
    <div class="row">
        <div class="col-md-12">
        <h3>All Category</h3>
            <button type="button" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#create">
                    Add New Category
            </button>

            <table id="myTable" class="table table-bordered table-striped text-center" >
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="title">Category Name</th>
                            <th style="width: 30%;" class="Image">Image</th>
                            <th style="width: 30%;" class="body">Description</th>
                            <th style="width: 20%;" class="modify">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                    <td class="title">{{$category->title}}</td>
                                    <td class="body"><img src="{{asset($category->image)}}" alt="" width="100px" height="80px"></td>
                                    <td class="body">{!! substr($category->description,0,300) !!}</td>
                                    <td class="modify">
                                    <a href="{{route('gallery.getByID', $category->id)}}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{route('gallery.images', $category->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/gallery/delete/'.$category->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger " id="detail"><i class="fa fa-trash-o"></i></a>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            {{$categories->links()}}

            <!-- Button trigger modal -->


            <!-- Create Modal -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create new category" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                @include('admin.gallery.form')
                                <div class="form-group">
                                    Select images: <input type="file" name="cover_image[]" multiple>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection

<script>
    $('#edit').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget) // Button that triggered the modal
    //var title = button.data('mytitle')
    //const title = button.data('mybody')
    const id = button.data('myid')
    const route = button.data('route') + '/'

    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    const modal = $(this)

    $.ajax({
        url: route + id,
        method: 'GET',
        success: function(data){
            //check if status true or false -- true means data is there else not
            if(data.status){
                modal.find('.modal-body #category_id').val(data.result.id)
                modal.find('.modal-body #title').val(data.result.title)
                modal.find('.modal-body #body').val(data.result.description)
            }
        }
    });

  })

  $('#delete').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget) // Button that triggered the modal
    const id = button.data('myid')
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    const modal = $(this)
    modal.find('.modal-body #category_id').val(id)
  })
</script>

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
