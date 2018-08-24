<br>
{{-- <br> --}}
<ul class="list-group">
@for ($i = 0; $i < count($consulta_items); $i++)
    <li class="list-group-item list-group-item-default"> {{ $consulta_items[$i]->ordenItems['descripcion'] }} </li>
@endfor
</ul>