@for ($i = 0 ; $i < count($consulta); $i++)
    <tr>
        <td>{{ $consulta[$i]->descripcion_items }}</td>                            
        <td>
            @if($consulta[$i]->nombre_estado=='SIN ASIGNAR')
            <span class="label label-danger ">{{ $consulta[$i]->nombre_estado }}</span></td>
            @elseif($consulta[$i]->nombre_estado=='ASIGNADO')
            <span class="label label-success ">{{ $consulta[$i]->nombre_estado }}</span></td>
            @endif
        <td><textarea class="form-control" id="observacion_m" rows="2"></textarea></td>
        <td><select id="slect_m" class="form-control">
            @if(count($consulta2)==0)
            <option value="">Selecciona Una Opcion</option>
            @else
            <option value="">Selecciona Una Opcion</option>
            @for ($a = 0 ; $a < count($consulta2); $a++)
            <option value="{{ $consulta2[$a]->id }}">{{ $consulta2[$a]->nombre }}</option>
            @endfor
            @endif
            </select>
        </td>
        @if($consulta[$i]->nombre_estado=='SIN ASIGNAR')
        <td><button class="btn btn-sm btn-info btn-outline asignar_item_colaborador_guardar" >Guardar</button></td>
        @elseif($consulta[$i]->nombre_estado=='ASIGNADO')
        <td></td>
        @endif
    </tr>
@endfor