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
                        <th>Observacion</th>
                        <th>Estado</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody id="requerimientos_tabla_asignar">
                    @for ($i = 0 ; $i < count($consulta_orden); $i++)
                        <tr>
                            <td>ORDEN - {{ $consulta_orden[$i]->consecutivo }}</td>                            
                            <td>{{ $consulta_orden[$i]->idAreaDestino->areaAreauser['nombre'] }}</td>
                            <td>{{ $consulta_orden[$i]->idAreaSolicita->areaAreauser['nombre'] }}</td>
                            <td>{{ $consulta_orden[$i]->idOrden['observacion'] }}</td>
                            @if($consulta_orden[$i]->id_estado == 4)<td><span class="label label-success ">Aceptado</span></td>
                            @elseif($consulta_orden[$i]->id_estado == 5)<td><span class="label label-warning ">Remision</span></td>
                            @endif
                            <td><button class="btn btn-sm btn-waves btn-outline ver_orden_asignar" name="{{ $consulta_orden[$i]['id'] }}">Distribuir</button></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>






<div class="row menu_ocultar">
        <!-- sample modal content -->
        <div id="orden_asignar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content" id="factura_compra">
              <div class="modal-header">
                  <h5>ORDEN</h5>
              </div>
              
              <div class="modal-body">
  
                    <form>
                        
                            {{-- <input type="text" style="display:none" class="form-control" id="id">
                            <input type="text" style="display:none" class="form-control" id="id_my_areauser">
                            <input type="text" style="display:none" class="form-control" id="id_area_solicitante"> --}}

                            {{-- <div class="form-group" >
                              <label for="recipient-name" class="control-label">My Area:</label>
                              <input type="text" value="" disabled class="form-control" id="my_area">
                            </div> --}}
                            
                            {{-- <div class="form-group" >
                                <label for="recipient-name" class="control-label">Fecha De La Orden:</label>
                                <input type="text" disabled class="form-control" id="fecha">
                            </div> --}}
                            
                            {{-- <div class="form-group" >
                                <label for="recipient-name" class="control-label">Area Solicitante:</label>
                                <input type="text" disabled class="form-control" id="area_solicita">
                            </div> --}}

                            {{-- <div class="form-group" >
                                <label for="recipient-name" class="control-label">Numero De Orden:</label>
                                <input type="text" disabled class="form-control" id="numero_orden">
                            </div> --}}

                            {{-- <label for="recipient-name" class="control-label" >Estados:</label>
                            <select class="form-control custom-select" name="" id="estado">
                            <option value="" selected>Selecciona Una Opción</option>
                            @foreach ( $consulta_estados as $reg)
                                <option  value="{{ $reg }}">{{ $reg}}</option>
                            @endforeach
                            </select> --}}

                            {{-- <label for="recipient-name" class="control-label" >Areas:</label>
                            <select disabled class="form-control custom-select" name="" id="area_de_remision">
                            <option value="" selected>Selecciona Una Area</option>
                            @for ($i = 0; $i < count($consulta2); $i++)
                                <option  value="{{ $consulta2[$i]->id_area_user }}">{{ $consulta2[$i]->area_nombre}}</option>
                            @endfor
                            </select> --}}

                            {{-- <div class="form-group">
                            <label>OBSERVACIONES</label>
                            <textarea class="form-control" id="observaciones" rows="5"></textarea>
                            </div> --}}

                            {{-- <div class="form-group" id="aca">
                            
                            </div> --}}

                        {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="styled_max_checkbox" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required class="custom-control-input" id="customCheck4">
                                                            <label class="custom-control-label" for="customCheck4">I am unchecked checkbox</label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="styled_max_checkbox" class="custom-control-input" id="customCheck5">
                                                            <label class="custom-control-label" for="customCheck5">I am unchecked too</label>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="styled_max_checkbox" class="custom-control-input" id="customCheck6">
                                                            <label class="custom-control-label" for="customCheck6">You can check me</label>
                                                        </div>
                                                    </fieldset>
                                                </div> 
                                                <small>Select any 2 options</small> 
                                            </div>
                                        </div>
                                    </div> --}}


        <br>
<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            {{-- <button class="btn btn-sm mdi mdi-account-plus btn-waves btn-outline" id="nuevo_colaborador">Nuevo Colaborador</button> --}}
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Observacion</th>
                        <th>Colaboradores</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody id="tabla_items">
                    {{-- @for ($i = 0 ; $i < count($consulta_orden); $i++)
                        <tr>
                            <td>ORDEN - {{ $consulta_orden[$i]->consecutivo }}</td>                            
                            <td>{{ $consulta_orden[$i]->idAreaDestino->areaAreauser['nombre'] }}</td>
                            <td>{{ $consulta_orden[$i]->idAreaSolicita->areaAreauser['nombre'] }}</td>
                            @if($consulta_orden[$i]->id_estado == 4)<td><span class="label label-success ">Aceptado</span></td>
                            @elseif($consulta_orden[$i]->id_estado == 5)<td><span class="label label-warning ">Remision</span></td>
                            @endif
                            <td><button class="btn btn-sm btn-waves btn-outline ver_orden_asignar" name="{{ $consulta_orden[$i]['id'] }}">Distribuir</button></td>
                        </tr>
                    @endfor --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

                    </form>
  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_modal_orden_asignar">Cerrar</button>
                          {{-- <button type="button" class="btn btn-info waves-effect" data-dismiss="modal" id="aceptar_orden_asignar">Guardar</button> --}}
                      </div>
  
              </div>
              </div>
            </div>
          </div>
</div>
@endsection