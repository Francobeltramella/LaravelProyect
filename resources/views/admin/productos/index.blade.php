@extends('admin.home')

@section('title', 'Productos')

@section('content_header')
<h1>
    Productos
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-producto">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Productos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="productos" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Descripcion</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $product)
                        <tr >
                        <td>{{$product->id}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                        <img src="{{asset($product->imgProduct)}}" alt="{{$product->name}}" class="img-fluid" width="120px">
                        </td>
                     
                        <td class="btn row">
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-update-producto-{{$product->id}}">
                        <i class="glyphicon glyphicon-refresh"></i></button>

                        
                        <form class="form" action="{{route('admin.productos.delete', $product->id)}}" method="post">
                        {{csrf_field()}}
                        @method('DELETE')
                        <button class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i></button>
                        </form>

                        </td>
                        </tr>
                    @include('admin.productos.modal-update-product')
                        
 

                        @endforeach
                    </tbody>
                   
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-producto">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{route ('admin.productos.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="modal-body">
              <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="form-group">
              <label for="name">Descripcion</label>
              <input type="text" name="description" id="description" class="form-control">
              </div>
              <div class="form-group">
              <label for="productos">Imagen Producto</label>
              <input type="file" name="imgProduct" id="imgProduct" class="form-control">
              </div>
              <div class="form-group">
              <label for="category_id">Categorias</label>
              <select name="category_id" id="category_id" class="form-control">
              <option value="">Seleccionar Categorioa Producto</option>
              @foreach($categorias as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              </select>
              </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submint" class="btn btn-outline-primary">Guardar</button>
              </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop
<script src="{{ asset('js/app.js') }}"></script>

@section('js')
<script>
$(document).ready(function() {
    $('#productos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop


