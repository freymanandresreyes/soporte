<div class="form-group" >
    <label for="recipient-name" class="control-label">NOMBRE DEL AREA:</label>
    <input type="text" class="form-control" id="nombre_area" name="{{ $consulta_area->id }}" value="{{ $consulta_area->nombre_area }}">
</div>
<div class="form-group" >
    <label for="recipient-name" class="control-label">LIDER ENCARGADO:</label>
    <select id="encargado" class="form-control custom-select">
        <option selected value="0">Selecciona Una Opcion</option>
        @foreach ( $consulta_user as $reg )
        <option value="{{ $reg->id }}">{{ $reg->name }}</option>
        @endforeach
    </select>
</div>