@extends ('admin.layouts.master')
@section ('content')

<div class="content-wrapper">

<section class="content">
    <div class="row">
        <div class="col-md-12">
        <h3>All Category Items</h3>

    <button type="button" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#create">
            Add New Image
    </button>



    <table id="myTable" class="table table-bordered table-striped text-center" >
            <thead>
                <tr>
                    <th>Category Item</th>
                    <th>Preview</th>
                    <th style="width: 20%;">Modify</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryitems as $item)
                    <tr>
                            <td>{{$item->cover_image}}</td>
                            <td><img style="width:20%;" src="{{asset($item->cover_image)}}" alt="image"></td>
                            <td><a href="{{url('admin/gallery/image/delete/'.$item->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger " id="detail"><i class="fa fa-trash-o"></i></a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$categoryitems->links()}}



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
                <form action="{{route('gallery.image.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" name='id' value="{{$id}}">
                            @include('admin.gallery.view.form')
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

<script src="{{asset('js/gallery/images/scripts.js')}}"></script>
