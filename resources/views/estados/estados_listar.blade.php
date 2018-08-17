
        @if($consulta_estados=='[]')
          <option value="0">NO HAY ESTADOS CREADOS</option>
        @elseif($consulta_estados!='[]')
          <option value="0">Seleciona una opcion</option>
        @foreach ( $consulta_estados as $reg )
          <option value="{{ $reg->id }}">{{ $reg->nombre_estado }}</option>
        @endforeach
        @endif
