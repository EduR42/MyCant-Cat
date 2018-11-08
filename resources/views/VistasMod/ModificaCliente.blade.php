@extends('vistamain2')
@section('contenido')
<h1>Modifica Cliente</h1>
<br>
<form action = "{{route('modificaCliente')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

@if($errors->first('IdCliente')) 
<i> {{ $errors->first('IdCliente') }} </i> 
@endif	<br>

Clave Cliente<input type = 'text' name = 'IdCliente' value="{{$cliente->IdCliente}}" readonly ='readonly'>
<br>

@if($errors->first('NombreCli')) 
<i> {{ $errors->first('NombreCli') }} </i> 
@endif	<br>
Nombre & Apellidos<input type = 'text' name = 'NombreCli' value="{{$cliente->NombreCli}}">
<br>

<br>
@if($cliente->Sexo=='F')
Sexo<input type = 'radio' name = 'Sexo' value = 'F' checked>F
    <input type = 'radio' name = 'Sexo' value = 'M'>M
@else
	Sexo<input type = 'radio' name = 'Sexo' value = 'F'>F
    <input type = 'radio' name = 'Sexo' value = 'M' checked>M
@endif
<br>

<br>
@if($errors->first('Password')) 
<i> {{ $errors->first('Password') }} </i> 
@endif	<br>
Contraseña <input type = 'Password' name = 'Password' value="{{$cliente->Password}}">
<br>

<br>
@if($errors->first('EmailCli')) 
<i> {{ $errors->first('EmailCli') }} </i> 
@endif	<br>
Email <input type = 'text' name = 'EmailCli' value="{{$cliente->EmailCli}}">
<br>

<br>
@if($errors->first('TelefonoCli')) 
<i> {{ $errors->first('TelefonoCli') }} </i> 
@endif	<br>
Telefono De Contacto<input type = 'text' name = 'TelefonoCli' value="{{$cliente->TelefonoCli}}">
<br>

<br> 
@if($errors->first('CalleyNumero')) 
<i> {{ $errors->first('CalleyNumero') }} </i> 
@endif	<br>
Calle & Numero <input type = 'text' name = 'CalleyNumero' value="{{$cliente->CalleyNumero}}">
<br>

<br>
@if($errors->first('Colonia')) 
<i> {{ $errors->first('Colonia') }} </i> 
@endif	<br>
Colonia <input type = 'text' name = 'Colonia' value="{{$cliente->Colonia}}">
<br>

<br>
@if($errors->first('CP')) 
<i> {{ $errors->first('CP') }} </i> 
@endif	<br>
Codigo Postal <input type = 'text' name = 'CP' value="{{$cliente->CP}}">
<br>


<br>
Selecciona Tu Estado<select name = 'IdEstado'>
	    <option value = '{{$IdEstado}}'>{{$estado}}</option>
			
			@foreach($todosdemase as $td)
		<option value = '{{$td->IdEstado}}'>{{$td->NombreEstado}}</option>
			@endforeach
                  </select>
<br>


<br>
Activo<input type = 'radio' name = 'Activo' value = 'Si' checked>Si
      <input type = 'radio' name = 'Activo' value = 'No' disabled>No
<br>


<input type  ='submit' value = 'Guardar'>
</form>
@stop