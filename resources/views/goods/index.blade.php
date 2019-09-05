@extends('goods.templates.layout')
@section('title')
    Goods
@endsection
@section('content')    
    <div class="container">
        <div class="row bg-white mt-5 p-3 rounded">
            <h3>
                Show Goods | <button class="btn btn-primary plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </h3>
            <table class="table table-datatables">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 0 ?>
                    @foreach($all as $a)
                    <?php $i++ ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td> {{ $a->name }} </td>
                            <td> {{ $a->price }} </td>
                            <td> {{ $a->category }} </td>
                            <td> {{ $a->stock }} </td>
                            <td>
                            
                                <img width="200px" src="{{ url('image/' . $a->img) }}" alt="">
                            </td>
                            <td class="text-center" style="width: 10px;"><a class="btn btn-primary rounded-circle edit" data-id="{{ $a->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
                            <td style="width: 10px;" class="text-center"><a href="goods/delete/{{$a->id}}" class="btn btn-danger rounded-circle"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>

                        </tr>            
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="goods/add" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="image_hidden" name="image_hidden">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock">
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" class="form-control" name="file" id="img">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
</div>
<script>
    $('body').addClass('bg-secondary');
    $('.plus').click(function () { 
        $('#id').val("");
        $('#name').val(" ");
                $('#price').val(" ");
                $('#category').val(" ");
                $('#stock').val(" ");
        $('#modal').modal(true);
        
    });

    $('.edit').click(function () { 
        var id = $(this).data('id');
        $('#id').val(id);
        $.ajax({
            url: 'goods/edit/' + id,
            method: 'get',
            dataType: 'JSON',
            success: function (data) { 
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('#category').val(data.category);
                $('#stock').val(data.stock);
                $('#image_hidden').val(data.img);
                $('#modal').modal(true);

             }
        });
        
    });
</script>
@endsection

