@extends('layout')
@section('contenido')

{{-- AQUI INICI LA PARTE DE EDITAR EL IVA DE UNA TIENDA --}}
<br>
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">CREAR AREA</h4>
        </div>
        <div class="card-body">
          <form action="#" class="form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Nombre Del Area:</label>
                    <div class="col-md-9">
                      <input type="text" id="area"  class="form-control">
                      <small class="form-control-feedback"> Area a crear. </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Lider:</label>
                    <div class="col-md-9">
                      <select  class="form-control custom-select" id="lider">
                        @if($consulta_users=='[]')
                          <option value="0">NO HAY LIDERES CREADOS</option>
                        @elseif($consulta_users!='[]')
                          <option value="0">Seleciona una opcion</option>
                        @foreach ( $consulta_users as $reg )
                          <option value="{{ $reg->id }}">{{ $reg->name }}</option>
                        @endforeach
                        @endif
                      </select>
                      <small class="form-control-feedback"> Lider que estará a cargo del area. </small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-success" id="crear_area">Crear</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


{{-- ******************************************************************** --}}
{{-- AQUI INICI LA PARTE DE EDITAR EL IVA DE UNA TIENDA --}}
{{-- ************************************************************************* --}}
<br>
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">QUITAR AREA A UN LIDER</h4>
        </div>
        <div class="card-body">
          <form action="#" class="form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Lideres:</label>
                    <div class="col-md-9">
                      <select  class="form-control custom-select" id="lider_area">
                        @if($consulta_users=='[]')
                          <option value="0">NO HAY LIDERES CREADOS</option>
                        @elseif($consulta_users!='[]')
                          <option value="0">Seleciona una opcion</option>
                        @foreach ( $consulta_users as $reg )
                          <option value="{{ $reg->id }}">{{ $reg->name }}</option>
                        @endforeach
                        @endif
                      </select>
                      <small class="form-control-feedback"> Lider A Cargo De Un Area. </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Area:</label>
                    <div class="col-md-9" id="quitar">
                      <input type="text" disabled id="area_lider"  class="form-control">
                      <small class="form-control-feedback"> Area Del Lider Seleccionado. </small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-success" id="quitar_area">QUITAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


{{-- ***************************************************************************************************** --}}
{{-- {{-- ***************************************************************************************************** --}}
{{-- {{-- ***************************************************************************************************** --}}
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        
        <div class="card">
          <div class="card-body">
            <h3 class="box-title">AREAS</h3>
            <hr>
            
            <div class="table-responsive m-t-40" id="">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre Del Area</th>
                    <th>Encargado Del Area</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="" >
                  {{-- @foreach($consulta_areas as $reg) --}}
                  @for($i = 0 ; $i < (count($consulta_areas)); $i++)
                  <tr>
                    <td>{{ $consulta_areas[$i]->nombre_area }}</td>
                    <td>@if($consulta_areas[$i]['userArea']){{ $consulta_areas[$i]['userArea']->name }}@else NO TIENE LIDER @endif</td>
                    <td>
                        <input type="button" class="ti-pencil btn btn-warning" value="editar" id="{{ $consulta_areas[$i]->id }}"></input>
                    </td>
                  </tr>
                  {{-- @endforeach --}}
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row -->




  <div class="row menu_ocultar">
      <!-- sample modal content -->
      <div id="editar_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h3>EDITAR AREA</h3>
            </div>
            <div class="modal-body">

                  <form id="form">

                  </form>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="cerrar_editar">Cerrar</button>
                  <button type="button" class="btn btn-danger waves-effect waves-light" id="guardareditar">Guardar</button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>


@endsection
