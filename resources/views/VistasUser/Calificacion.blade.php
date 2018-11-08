@extends('vistamain2')
@section('contenido')
<h1>Danos Tu Opinion</h1>
<form action = "{{route('guardaCali')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

@if($errors->first('IdCalificacion')) 
<i> {{ $errors->first('IdCalificacion') }} </i> 
@endif	<br>
Numero Registro <input type = 'text' name ='IdCalificacion' value="{{$IdCalificacion}}" disabled>
<br>
@if($errors->first('NombreCli')) 
<i> {{ $errors->first('NombreCli') }} </i> 
@endif	<br>
Nombre Cliente <input type = 'text' name = 'NombreCli' value="{{old('NombreCli')}}">
<br>
<br>

Selecciona Tu Mascota<select name = 'IdMascota'>
	    
			@foreach($mascota as $cali)
			<option value = '{{$cali->IdMascota}}'>{{$cali->NombreMas}}</option>
			@endforeach
                  </select>
<br>
<br>

Nivel De Servicio<input type = 'radio' name = 'NivelServicio' value = 'Excelente' checked>Excelente
                 <input type = 'radio' name = 'NivelServicio' value = 'Bueno'>Bueno
                 <input type = 'radio' name = 'NivelServicio' value = 'Regular'>Regular
<br>
<br>

¿Que Tan Satisfecho fue Nuestro Servicio?<input type = 'radio' name = 'Satisfaccion' value = '1'>1
                                        <input type = 'radio' name = 'Satisfaccion' value = '2'>2
                                        <input type = 'radio' name = 'Satisfaccion' value = '3'>3
                                        <input type = 'radio' name = 'Satisfaccion' value = '4'>4
                                        <input type = 'radio' name = 'Satisfaccion' value = '5'>5
                                        <input type = 'radio' name = 'Satisfaccion' value = '6'>6
                                        <input type = 'radio' name = 'Satisfaccion' value = '7'>7
                                        <input type = 'radio' name = 'Satisfaccion' value = '8'>8
                                        <input type = 'radio' name = 'Satisfaccion' value = '9'>9
                                        <input type = 'radio' name = 'Satisfaccion' value = '10'checked>10

                                         
<br>

<br>
@if($errors->first('Sugerencia')) 
<i> {{ $errors->first('Sugerencia') }} </i> 
@endif	<br>
Sugerencia <input type = 'textarea' name = 'Sugerencia' value="{{old('Sugerencia')}}">
<br>
<div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
@stop