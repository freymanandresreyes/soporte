@for ($i = 0 ; $i < count($consulta); $i++)
    <tr>
        <td>{{ $consulta[$i]->descripcion_items }}</td>                            
        {{-- <td>{{ $consulta_orden[$i]->idAreaDestino->areaAreauser['nombre'] }}</td> --}}
        {{-- <td>{{ $consulta_orden[$i]->idAreaSolicita->areaAreauser['nombre'] }}</td> --}}
        {{-- @if($consulta_orden[$i]->id_estado == 4) --}}
        <td><span class="label label-success ">{{ $consulta[$i]->nombre_estado }}</span></td>
        <td><textarea class="form-control" rows="5"></textarea></td>
        <td><select class="form-control">
            <option>bebe</option>
            </select>
        </td>
        {{-- @elseif($consulta_orden[$i]->id_estado == 5)<td><span class="label label-warning ">Remision</span></td> --}}
        {{-- @endif --}}
        <td><button class="btn btn-sm btn-info btn-outline asignar_item_colaborador" name="{{ $consulta[$i]->id_orden }}">Guardar</button></td>
    </tr>
@endfor