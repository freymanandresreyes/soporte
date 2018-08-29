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
                        <th style="display:none"></th>
                        <th># Requerimiento</th>
                        <th>Descripción</th>
                        <th>Area Solicitante</th>
                        <th>Observacion</th>
                        <th>Estado</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody id="items_terminar_tabla">
                    @for ($i = 0 ; $i < count($consulta); $i++)
                        <tr>
                            <td  style="display:none">{{ $consulta[$i]->id_orden }}</td>                            
                            <td>ORDEN - {{ $consulta[$i]->consecutivo_orden }}</td>                            
                            <td>{{ $consulta[$i]->items_descripcion }}</td>
                            <td>{{ $consulta[$i]->nombre_area }}</td>
                            <td>{{ $consulta[$i]->observacion_designados }}</td>
                            @if($consulta[$i]->nombre_estado == 'ASIGNADO')
                            <td><span class="label label-warning ">En Proceso</span></td>
                            <td><button class="btn btn-sm btn-info btn-outline terminar_item" name="{{ $consulta[$i]->id_item }}">Terminar</button></td>

                            @elseif($consulta[$i]->nombre_estado == 'TERMINADO')
                            <td><span class="label label-info ">Terminado</span></td>
                            <td></td>
                            @endif
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
