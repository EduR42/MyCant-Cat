@extends('vistamain2')
@section('contenido')
<h1>Registro de Historial Medico </h1>
<form action = "{{route('guardaHistorialMedico')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

@if($errors->first('IdHistorial')) 
<i> {{ $errors->first('IdHistorial') }} </i> 
@endif	<br>
Id Historial <input type = 'text' name ='IdHistorial' value="{{$IdHistorial}}" disabled>
<br>

<br>

Selecciona Al Cliente<select name = 'IdCliente'>
	    
			@foreach($cliente as $cli)
			<option value = '{{$cli->IdCliente}}'>{{$cli->NombreCli}}</option>
			@endforeach
                  </select>
<br>


@if($errors->first('NombreMascota')) 
<i> {{ $errors->first('NombreMascota') }} </i> 
@endif	<br>
Nombre Mascota <input type = 'text' name = 'NombreMascota' value="{{old('NombreMascota')}}">
<br>
<br>
@if($errors->first('MotivoCita')) 
<i> {{ $errors->first('MotivoCita') }} </i> 
@endif	<br>
Motivo de la Cita <input type = 'text' name = 'MotivoCita' value="{{old('MotivoCita')}}">
<br>
<br>
@if($errors->first('FechaCita')) 
<i> {{ $errors->first('FechaCita') }} </i> 
@endif	<br>
Fecha Cita <input type = 'date' name = 'FechaCita' value="{{old('FechaCita')}}">
<br>
<br>
@if($errors->first('Diagnostico')) 
<i> {{ $errors->first('Diagnostico') }} </i> 
@endif	<br>
Diagnostico <input type = 'text' name = 'Diagnostico' value="{{old('Diagnostico')}}">
<br>
<br> 
@if($errors->first('Tratamiento')) 
<i> {{ $errors->first('Tratamiento') }} </i> 
@endif	<br>
Tratamiento <input type = 'text' name = 'Tratamiento' value="{{old('Tratamiento')}}">
<br>
<br>
@if($errors->first('ProximaC')) 
<i> {{ $errors->first('ProximaC') }} </i> 
@endif	<br>
Proxima Cita <input type = 'date' name = 'ProximaC' value="{{old('ProximaC')}}">
<br>
<div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>

@stop