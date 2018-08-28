@for ($i = 0 ; $i < count($consulta); $i++)
    <tr>
        <td>{{ $consulta[$i]->descripcion_items }}</td>                            
        <td><span class="label label-danger ">{{ $consulta[$i]->nombre_estado }}</span></td>
        <td><textarea class="form-control" rows="2"></textarea></td>
        <td><select class="form-control">
            @if(count($consulta2)==0)
            <option>Selecciona Una Opcion</option>
            @else
            @for ($a = 0 ; $a < count($consulta2); $a++)
            <option>{{ $consulta2[$a]->nombre }}</option>
            @endfor
            @endif
            </select>
        </td>
        @if($consulta[$i]->nombre_estado=='SIN ASIGNAR')
        <td><button class="btn btn-sm btn-info btn-outline asignar_item_colaborador_guardar" name="{{ $consulta[$i]->id_orden }}">Guardar</button></td>
        @elseif($consulta[$i]->nombre_estado=='ASIGNADO')
        <td></td>
        @endif
    </tr>
@endfor