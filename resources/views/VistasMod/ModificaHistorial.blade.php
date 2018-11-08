@extends('vistamain2')
@section('contenido')
<h1>Modifica Historial</h1>
<br>
<form action = "{{route('modificaHistorial')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

@if($errors->first('IdHistorial')) 
<i> {{ $errors->first('IdHistorial') }} </i> 
@endif	<br>

Clave Historial<input type = 'text' name = 'IdHistorial' value="{{$historialmedico->IdHistorial}}" readonly ='readonly'>
<br>

<br>
Selecciona Al Cliente<select name = 'IdCliente'>
	    <option value = '{{$IdCliente}}'>{{$cliente}}</option>
			
			@foreach($todasdemas as $td)
		<option value = '{{$td->IdCliente}}'>{{$td->NombreCli}}</option>
			@endforeach
                  </select>
<br>


@if($errors->first('NombreMascota')) 
<i> {{ $errors->first('NombreMascota') }} </i> 
@endif	<br>
Nombre Mascota<input type = 'text' name = 'NombreMascota' value="{{$historialmedico->NombreMascota}}">
<br>

@if($errors->first('MotivoCita')) 
<i> {{ $errors->first('MotivoCita') }} </i> 
@endif	<br>
Motivo De La Cita<input type = 'text' name = 'MotivoCita' value="{{$historialmedico->MotivoCita}}">
<br>

@if($errors->first('FechaCita')) 
<i> {{ $errors->first('FechaCita') }} </i> 
@endif	<br>
Fecha Cita <input type = 'date' name = 'FechaCita' value="{{$historialmedico->FechaCita}}">
<br>

@if($errors->first('Diagnostico')) 
<i> {{ $errors->first('Diagnostico') }} </i> 
@endif	<br>
Diagnostico<input type = 'text' name = 'Diagnostico' value="{{$historialmedico->Diagnostico}}">
<br>

@if($errors->first('Tratamiento')) 
<i> {{ $errors->first('Tratamiento') }} </i> 
@endif	<br>
Tratamiento<input type = 'text' name = 'Tratamiento' value="{{$historialmedico->Tratamiento}}">
<br>

@if($errors->first('ProximaC')) 
<i> {{ $errors->first('ProximaC') }} </i> 
@endif	<br>
Proxima Cita <input type = 'date' name = 'ProximaC' value="{{$historialmedico->ProximaC}}">
<br>

<input type  ='submit' value = 'Guardar'>
</form>
@stop