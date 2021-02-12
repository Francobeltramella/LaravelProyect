<!-- modal -->
<div class="modal fade" id="modal-update-producto-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{route ('admin.categorias.update', $product->id)}}" method="POST">
            {{csrf_field()}}
              <div class="modal-body">
              <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" id="name"  value="{{$product->name}}" class="form-control">
              </div>
              <div class="form-group">
              <label for="name">Descripcion</label>
              <input type="text" name="description" id="description"  value="{{$product->description}}" class="form-control">
              </div>
              <div class="form-group">
              <label for="category_id">Categorias</label>
              <select name="category_id" id="category_id" class="form-control">
              @foreach($categorias as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
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