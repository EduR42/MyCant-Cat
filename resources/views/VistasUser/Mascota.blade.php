@extends('vistamain2')
@section('contenido')
<h1>Registro de Mascota</h1>
<form action = "{{route('guardaMasco')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

@if($errors->first('IdMascota')) 
<i> {{ $errors->first('IdMascota') }} </i> 
@endif	<br>
Folio Mascota<input type = 'text' name ='IdMascota' value="{{$IdMascota}}" disabled>
<br>

<br>

Selecciona Al Cliente<select name = 'IdCliente'>
	    
			@foreach($cliente as $cli)
			<option value = '{{$cli->IdCliente}}'>{{$cli->NombreCli}}</option>
			@endforeach
                  </select>
<br>


@if($errors->first('NombreMas')) 
<i> {{ $errors->first('NombreMas') }} </i> 
@endif	<br>
Nombre Mascota <input type = 'text' name = 'NombreMas' value="{{old('NombreMas')}}">
<br>

<br>
@if($errors->first('Raza')) 
<i> {{ $errors->first('Raza') }} </i> 
@endif	<br>
Raza<input type = 'text' name = 'Raza' value="{{old('Raza')}}">
<br>

<br>
@if($errors->first('Foto')) 
<i> {{ $errors->first('Foto') }} </i> 
@endif	<br>
Seleccione archivo <input type ='file' name='Foto'>
<br>

<br>
Tipo De Mascota <select name = 'IdTipoMas'>
	    
			@foreach($tipomascota as $tipom)
			<option value = '{{$tipom->IdTipoMas}}'>{{$tipom->TipoMas}}</option>
			@endforeach
                  </select>
<br>

<div class="form-group col-md-6" >
Activo
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio3" name="Activo" class="custom-control-input" value = 'Si' checked>
  <label class="custom-control-label" for="customRadio3">Si</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio4" name="Activo" class="custom-control-input" value = 'No' disabled>
  <label class="custom-control-label" for="customRadio4">No</label>
</div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>

@stop