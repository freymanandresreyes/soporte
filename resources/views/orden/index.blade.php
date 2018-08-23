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
                            <input type="text" style="display:none" value={{ $consulta[0]->id_area_encargada }} class="form-control" id="id_area_encargada">
                            <input type="text" style="display:none" value={{ $consulta[0]->id_area }} class="form-control" id="id_area_actual">
                          
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
                                      <p class="form-control-static" id="nombre_area">{{ $consulta[0]->nombre_area }}</p>
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
                                <option  value={{ $areas[$i]['id'] }}>{{ $areas[$i]['nombre'] }}</option>
                            @endfor                    
                            </select>
                        </div>
                    <br>
                      <!--/row-->
                      
                      <form class="form-horizontal m-t-40">
                        
                        <div class="form-group">
                            <label>Agrega Un Item A Tú Requerimiento</label>
                            <textarea class="form-control" id="item" rows="5"></textarea>
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
        <h4 class="card-title">Items</h4>
        <h6 class="card-subtitle"></h6>
        <div class="table-responsive">
          <table id="demo-foo-addrow2" class="table m-t-30 table-hover contact-list" data-page-size="10">
            <thead id="encabezado_items">
              <tr>
                
                <th>ITEM</th>
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
          <button type="button" class="btn btn-success" id="guardar_orden">
                <i class="fa fa-save"></i>
                Guardar
              </button>
        </div>
      </div>
    </div>
    
  </div>
</div>

@endsection