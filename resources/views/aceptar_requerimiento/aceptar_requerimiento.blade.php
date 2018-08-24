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
                            @if($consulta_orden[$i]->id_estado == 3) <td><span class="label label-info ">Sin Aceptar</span></td>
                            @elseif($consulta_orden[$i]->id_estado == 4)<td><span class="label label-success ">Aceptado</span></td>
                            @elseif($consulta_orden[$i]->id_estado == 5)<td><span class="label label-warning ">Remitido</span></td>
                            @else <td><span class="label label-danger ">Rechazado</span></td>
                            @endif
                            <td><button class="btn btn-sm btn-waves btn-outline ver_orden" name="{{ $consulta_orden[$i]['id'] }}">VER</button></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>






<div class="row menu_ocultar">
        <!-- sample modal content -->
        <div id="orden" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content" id="factura_compra">
              <div class="modal-header">
                  <h5>ORDEN</h5>
              </div>
              
              <div class="modal-body">
  
                    <form>
                        
                            <input type="text" style="display:none" class="form-control" id="id">

                            <div class="form-group" >
                              <label for="recipient-name" class="control-label">My Area:</label>
                              <input type="text" disabled class="form-control" id="my_area">
                            </div>
                            
                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Fecha De La Orden:</label>
                                <input type="text" disabled class="form-control" id="fecha">
                            </div>
                            
                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Area Solicitante:</label>
                                <input type="text" disabled class="form-control" id="area_solicita">
                            </div>

                            <div class="form-group" >
                                <label for="recipient-name" class="control-label">Numero De Orden:</label>
                                <input type="text" disabled class="form-control" id="numero_orden">
                            </div>

                            <label for="recipient-name" class="control-label" >Estados:</label>
                            <select class="form-control custom-select" name="" id="estado">
                            <option value="" selected>Selecciona Una Opción</option>
                            @foreach ( $consulta_estados as $reg)
                                <option  value="{{ $reg }}">{{ $reg}}</option>
                            @endforeach
                            </select>

                            <label for="recipient-name" class="control-label" >Areas:</label>
                            <select disabled class="form-control custom-select" name="" id="area_de_remision">
                            <option value="" selected>Selecciona Una Area</option>
                            @for ($i = 0; $i < count($consulta2); $i++)
                                <option  value="{{ $consulta2[$i]->id_area_user }}">{{ $consulta2[$i]->area_nombre}}</option>
                            @endfor
                            </select>

                            <div class="form-group">
                            <label>OBSERVACIONES</label>
                            <textarea class="form-control" id="observaciones" rows="5"></textarea>
                            </div>

                            <div class="form-group" id="aca">
                            
                            </div>

                    </form>
  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_orden">Cerrar</button>
                          <button type="button" class="btn btn-info waves-effect" data-dismiss="modal" id="aceptar_orden">Guardar</button>
                      </div>
  
              </div>
              </div>
            </div>
          </div>
</div>
@endsection