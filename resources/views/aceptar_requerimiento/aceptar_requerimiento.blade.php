@extends('layout')
@section('contenido')

<br>
<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            {{-- <button class="btn btn-sm mdi mdi-account-plus btn-waves btn-outline" id="nuevo_colaborador">Nuevo Colaborador</button> --}}
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th># Requerimiento</th>
                        <th>My Area</th>
                        <th>Area Solicitante</th>
                        <th>Estado</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody id="requerimientos_tabla">
                    @for ($i = 0 ; $i < count($consulta_orden); $i++)
                        <tr>
                            <td>ORDEN - {{ $consulta_orden[$i]->consecutivo }}</td>                            
                            <td>{{ $consulta_orden[$i]->idAreaDestino->areaAreauser['nombre'] }}</td>
                            <td>{{ $consulta_orden[$i]->idAreaSolicita->areaAreauser['nombre'] }}</td>
                            @if($consulta_orden[$i]->id_estado == 3) <td><span class="label label-danger ">Sin Aceptar</span></td>
                            @else<td><span class="label label-success ">Aceptado</span></td>
                            @endif
                            <td><button class="btn btn-sm btn-info btn-outline ver_orden" name="{{ $consulta_orden[$i]['id'] }}">VER</button></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>





{{-- 
<div class="row menu_ocultar">
        <!-- sample modal content -->
        <div id="colaborador" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content" id="factura_compra">
              <div class="modal-header">
                  <h5>COLABORADOR</h5>
              </div>
              
              <div class="modal-body">
  
                    <form>
                        <div id="mensaje"></div>

                            <input type="text" style="display:none" class="form-control" id="id">

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
                    
  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_colaborador">Cerrar</button>
                          <button type="button" class="btn btn-success waves-effect" style="display:none" disabled data-dismiss="modal" id="guardar_colaborador">Guardar</button>
                          <button type="button" class="btn btn-info waves-effect" style="display:none" disabled data-dismiss="modal" id="crear_colaborador">Crear</button>
                      </div>
  
              </div>
              </div>
            </div>
          </div>
</div> --}}
@endsection