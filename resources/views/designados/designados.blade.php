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
          <div class="modal-dialog modal-lg">
            <div class="modal-content" id="factura_compra">
              <div class="modal-header">
                  <h3><strong>ORDEN</strong></h3>
              </div>
              
              <div class="modal-body">
  
                    <form>
                        
{{-- <input type="text" style="display:none" class="form-control" id="id"> --}}
                            
                            
<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40" id="x">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th  style="display:none"></th>
                        <th  style="display:none"></th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Observacion</th>
                        <th>Colaboradores</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody id="tabla_items">
                    
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