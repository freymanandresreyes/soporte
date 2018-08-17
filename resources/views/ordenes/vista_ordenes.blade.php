@extends('layout')
@section('contenido')

{{-- AQUI INICI LA PARTE DE EDITAR EL IVA DE UNA TIENDA --}}
<br>
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header bg-info">
          <h4 class="m-b-0 text-white">GENERAR ORDEN</h4>
        </div>
        <div class="card-body">
          <form action="#" class="form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Lider:</label>
                    <div class="col-md-9">
                      <input type="text" id="lider" value="{{ $nombre_user }}" disabled class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Area:</label>
                    <div class="col-md-9">
                      <input type="text" id="area_remitente" disabled value="{{ $nombre_area }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3"></label>
                    <div class="col-md-9">
                      <br>
                      <br>
                      <select class="form-control custom-select" name="" id="area_receptora">
                        <option value="0">SELECCIONA EL AREA A LA CUAL LE VAS HACER EL REQUERIMIENTO</option>
                        @foreach ( $consulta_areas as $reg )
                            <option value="{{ $reg->id }}">{{ $reg->nombre_area }}</option>
                        @endforeach
                      </select>
                      <br>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-success" id="agregar_item">Agregar Item</button>
              </div>             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-body">
          <form action="#" class="form-horizontal">
            <div class="form-body">
              <div class="row">
               <div class="col-md-10">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Itemn (1):</label>
                    <div class="col-md-9" id="item">
                      <textarea class="form-control" ></textarea>
                    </div>
                  </div>
                </div>
              </div>                
              <div class="text-right">
                <button type="button" class="btn btn-success" id="crear_orden">Crear</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection