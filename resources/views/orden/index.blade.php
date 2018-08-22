@extends('layout') 
@section('contenido')
<!-- Row -->
<!-- ***** estructura input crear producto **** -->
<br> {{-- AQUI INICIA LA PARTE DE COMPRAS--}}

<!-- Row -->
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header bg-info">
              <h4 class="m-b-0 text-white">REQUERIMIENTO</h4>
          </div>
          <div class="card-body">
              <form class="form-horizontal" role="form">
                  <div class="form-body">
                      <h4 class="box-title">My Perfil</h4>
                      <hr class="m-t-0 m-b-40">
                      <div class="row">
                            <input type="text" style="display:none" value={{ $consulta[0]->id_user }} class="form-control" id="id">
                          <div class="col-md-6">
                              <div class="form-group row">
                                  <label class="control-label text-right col-md-3">Nombres:</label>
                                  <div class="col-md-9">
                                      <p class="form-control-static">{{ $consulta[0]->nombres }}</p>
                                  </div>
                              </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                              <div class="form-group row">
                                  <label class="control-label text-right col-md-3">Apellidos:</label>
                                  <div class="col-md-9">
                                      <p class="form-control-static">{{ $consulta[0]->apellidos }}</p>
                                  </div>
                              </div>
                          </div>
                          <!--/span-->
                      </div>
                      <!--/row-->
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group row">
                                  <label class="control-label text-right col-md-3">Email:</label>
                                  <div class="col-md-9">
                                      <p class="form-control-static">{{ $consulta[0]->email }}</p>
                                  </div>
                              </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                              <div class="form-group row">
                                  <label class="control-label text-right col-md-3">Area:</label>
                                  <div class="col-md-9">
                                      <p class="form-control-static">{{ $consulta[0]->nombre_area }}</p>
                                  </div>
                              </div>
                          </div>
                          <!--/span-->
                      </div>
                      <!--/row-->
                      
                      <!--/row-->
                      <h4 class="box-title">AREAS:</h4>
                      <hr class="m-t-0 m-b-10">
                    <div class="form-group">
                            <select class="custom-select col-12" id="area">
                              <option value="" selected>Selecciona Un Area</option>
                            @for ($i = 0 ; $i < count($areas); $i++)
                                <option value={{ $areas[$i]['id'] }}>{{ $areas[$i]['nombre'] }}</option>
                            @endfor                    
                            </select>
                        </div>
                    <br>
                      <!--/row-->
                      
                      <form class="form-horizontal m-t-40">
                        
                        <div class="form-group">
                            <label>Agrega Un Item A Tú Requerimiento</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                  
                    </form>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                      {{-- <button type="submit" class="btn btn-danger"> <i class="fa fa-pencil"></i> Edit</button> --}}
                                      <button type="button" class="btn btn-danger" id="agregar_compra">
                                      <i class="fa fa-plus"></i>
                                      Agregar</button>
                                      <button type="button" class="btn btn-inverse">Cancel</button>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6"> </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- Row -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Contact Emplyee list</h4>
        <h6 class="card-subtitle"></h6>
        <div class="table-responsive">
          <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
            <thead id="encabezado_compras">
              <tr>
                <th>Referencia</th>
                <th style="display: none">id producto</th>
                <th>Nombre</th>
                <th>P/compra</th>
                <th>Cantidad</th>
                <th>P/detal</th>
                <th>P/mayor</th>
                <th>Desc</th>
                <th>% Desc</th>
                <th>Clasificación</th>
                <th>Aplicar IVA</th>
                <th>Acción</th>
              </tr>
            </thead>

            <tfoot>
              <tr>

                <td colspan="7">
                  <div class="text-right">
                    <ul class="pagination"> </ul>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="text-right">
          <button type="button" class="btn btn-success" id="crear_compra">
                <i class="fa fa-save"></i>
                Guardar
              </button>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

{{-- -------------------------------------------------------------------------//////////////////////////////////////////-----------------------------------------------------------
{{-- -------------------------------------------------------------------------//////////////////////////////////////////-----------------------------------------------------------
{{-- -------------------------------------------------------------------------//////////////////////////////////////////-----------------------------------------------------------
{{-- -------------------------------------------------------------------------//////////////////////////////////////////-----------------------------------------------------------
--}}

<!--  modal subcategorias -->
<div id="modal_crear_proveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear Proveedor</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" id="">
            <label for="recipient-name" class="control-label">Proveedor:</label>
            <input type="text" class="form-control" id="nombre">
          </div>
          <div class="form-group" id="">
            <label for="recipient-name" class="control-label">Nit:</label>
            <input type="text" class="form-control" id="nit">
          </div>
          <div class="form-group" id="">
            <label for="recipient-name" class="control-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion">
          </div>
          <div class="form-group" id="">
            <label for="recipient-name" class="control-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_crear_proveedor">Cerrar</button>
        <button type="button" class="btn btn-success waves-effect waves-light" id="guardar_crear_proveedor">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal subcategorias -->

<!--  modal productos -->
<div id="modal_crear_producto_compras" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear Producto</h4>
      </div>
      <div class="modal-body">
        <form>


          <!--fin de tienda -->

          <div class="form-group">
            <label class="control-label">codigo:</label> 
            {!! Form::text('codigo', null, ['class'=>'form-control', 'id'=>'codigo_modal',"placeholder"=>"Codigo
            del producto"]) !!}

          </div>


          <!--fin row-->
          <!--inicio del row-->

          <!--categoria-->

          <div class="form-group">
            <label class="control-label">Categoria:</label>
            <div class="col-md-12">
              <div class="input-group mb-3">
                <select name="id_categoria" id="categoria_modal" class="form-control">
                        <option value="">Seleccione una categoria</option>
                      </select>

                <div class="input-group-append">
                  <button class="btn btn-outline-primary" id="agregar_categoria_compras" type="button" data-toggle="tooltip" data-placement="left"
                    title="" data-original-title="Agregar una categoria"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!--fin categoria-->

          <!--subcategoria-->

          <div class="form-group">
            <label class="control-label">Subcategoria:</label>
            <div class="col-md-12">
              <div class="input-group mb-3">
                <select name="" id="subcategoria_modal" class="form-control">
                      <option value="">Seleccione una subcategoria.</option>
                    </select>
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" id="agregar-subcategoria" type="button" data-toggle="tooltip" data-placement="left"
                    title="" data-original-title="Agregar una subcategoria"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>


          <!--fin subcategoria-->
          <!--/span-->
          <div class="form-group">
            <label class="control-label">Titulo:</label> {!! Form::text('titulo', null, ['class'=>'form-control','disabled',
            'id'=>'titulo_modal',"placeholder"=>"Titulo del producto"]) !!}
          </div>
          <!--/span-->
          <div class="form-group">
            <label class="control-label">Descripcion:</label> {!! Form::text('descripcion', null, ['class'=>'form-control','disabled',
            'id'=>'descripcion_modal',"placeholder"=>"Descripción del producto"]) !!}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_producto">Cerrar</button>
        <button type="button" class="btn btn-success waves-effect waves-light" id="guardar_modal_producto">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal productos -->




{{-- //********************* --}}
<!--  modal categorias -->
<div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear categoria</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" id="error-categoria">
            <label for="recipient-name" class="control-label">Categoria:</label>
            <input type="text" class="form-control" id="categoria_modal_crear">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar-categoria">Cerrar</button>
        <button type="button" class="btn btn-success waves-effect waves-light" id="guardar_categoria_compras">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal categorias -->

<!--  modal subcategorias -->
<div id="modal-subcategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear subcategoria</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" id="error-subcategoria">
            <label for="recipient-name" class="control-label">Subcategoria:</label>
            <input type="text" class="form-control" id="subcategoria_modal_crear">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar-subcategoria">Cerrar</button>
        <button type="button" class="btn btn-success waves-effect waves-light" id="guardar_subcategoria_compras">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal subcategorias -->
@endsection