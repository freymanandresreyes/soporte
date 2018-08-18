@extends('layout')
@section('contenido')

<br>
<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <button class="btn btn-sm mdi mdi-account-plus btn-waves btn-outline" id="nuevo_colaborador">Nuevo Colaborador</button>
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Lider Acargo</th>
                        <th>Area</th>
                        <th>Nombre Colaborador</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="vendedores_tabla">
                    @for ($i = 0 ; $i < count($consulta_colaboradores); $i++)
                        <tr>
                            <td>{{ $consulta_colaboradores[$i]->AreaUserColaboradores->AreaUserUser['name']}}</td>
                            <td>{{ $consulta_colaboradores[$i]->AreaUserColaboradores->AreaUserAreas['nombre'] }}</td>
                            <td>{{ $consulta_colaboradores[$i]->UserColaboradores['name'] }}</td>
                            <td><button class="btn btn-sm mdi mdi-border-color btn-success btn-outline editar_vendedor" name="{{ $consulta_colaboradores[$i]->id }}"></button></td>
                            @if($consulta_colaboradores[$i]->estado == 1) <td><button class="btn-sm mdi mdi-delete-forever btn-info btn-outline eliminar_vendedor" name="{{ $consulta_colaboradores[$i]->id }}"></button></td> 
                            @else<td><button class="btn-sm mdi mdi-delete-forever btn-danger btn-outline eliminar_vendedor" name="{{ $consulta_colaboradores[$i]->id }}"></button></td>
                            @endif
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>






<div class="row menu_ocultar">
        <!-- sample modal content -->
        <div id="colaborador" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h3>COLABORADOR</h3>
              </div>
              
              <div class="modal-body">
  
                    <form>

                            <div class="form-group" >
                              <label for="recipient-name" class="control-label">Numero De Documento:</label>
                              <input type="text" class="form-control" id="documento">
                            </div>
                            
                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Nombres:</label>
                                <input type="text" disabled class="form-control" id="nombres">
                            </div>
                            
                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Apellidos:</label>
                                <input type="text" disabled class="form-control" id="apellidos">
                            </div>

                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Telefono:</label>
                                <input type="text" disabled class="form-control" id="telefono">
                            </div>

                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Correo:</label>
                                <input type="text" disabled class="form-control" id="correo">
                            </div>

                            <div class="form-group" >
                                <label for="recipient-name" id="label_contraseña" style="display:none" class="control-label">Contraseña:</label>
                                <input type="text" style="display:none" disabled class="form-control" id="contraseña">
                            </div>

                            <div class="form-group" >
                                <label for="recipient-name" id="label_area" style="display:none" class="control-label">Area:</label>
                                <input type="text" style="display:none" disabled class="form-control" id="area">
                            </div>
                    </form>
                    {{-- <label for="recipient-name" class="control-label" >Tiendas:</label>
                      <select class="form-control custom-select" name="tienda_vendedor" id="tienda_vendedor">
                        <option value="" selected>Selecciona Una Opción</option>
                        @foreach ( $consulta_tiendas as $reg)
                            <option  value="{{ $reg->id }}">{{ $reg->slug }}</option>
                        @endforeach
                      </select> --}}

                      {{-- <label for="recipient-name" class="control-label" id="label_ocultar">Estado:</label>
                      <select class="form-control custom-select" name="estado_vendedor" id="estado_vendedor">
                        <option value="" selected>Selecciona Una Opción</option>
                        <option value=1 >Activo</option>
                        <option value=2 >Inactivo</option>                        
                      </select> --}}
  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_colaborador">Cerrar</button>
                          <button type="button" class="btn btn-success waves-effect" style="display:none" disabled data-dismiss="modal" id="guardar_colaborador">Guardar</button>
                          <button type="button" class="btn btn-info waves-effect" style="display:none" disabled data-dismiss="modal" id="crear_colaborador">Crear</button>
                      </div>
  
              </div>
              </div>
            </div>
          </div>
</div>
@endsection