@extends('vistamain2')
@section('contenido')
<h1>Registrate Con Nosotros</h1>
<form action = "{{route('guardaCli')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

<div class="form-group col-md-2" >
@if($errors->first('IdCliente')) 
<i> {{ $errors->first('IdCliente') }} </i> 
@endif	<br>
Clave<input type = 'text' class="form-control" name ='IdCliente' value="{{$IdCliente}}" disabled>
</div>

<div class="form-row">
<div class="form-group col-md-6" >
@if($errors->first('NombreCli')) 
<i> {{ $errors->first('NombreCli') }} </i> 
@endif	<br>
Nombre & Apellidos<input type = 'text'  class="form-control" name = 'NombreCli' value="{{old('NombreCli')}}" required>
</diV>


<div class="form-group col-md-6" ><Br>
Sexo
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="Sexo" class="custom-control-input" value = 'F' required>
  <label class="custom-control-label" for="customRadio1">F</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="Sexo" class="custom-control-input" value = 'M' required>
  <label class="custom-control-label" for="customRadio2">M</label>
</div>
</div>



<div class="form-group col-md-6" >
@if($errors->first('Password')) 
<i> {{ $errors->first('Password') }} </i> 
@endif	<br>
Contraseña <input type = 'Password' class="form-control" name = 'Password' value="{{old('Password')}}" required>
<small id="passwordHelpBlock" class="form-text text-muted">
Su contraseña debe tener una longitud de 8 a 20 caracteres, contener letras y números, y 
no debe contener espacios, caracteres especiales o emoji.</small>
</div>

<div class="form-group col-md-6" >
@if($errors->first('EmailCli')) 
<i> {{ $errors->first('EmailCli') }} </i> 
@endif	<br>
Email <input type = 'text' class="form-control" name = 'EmailCli' value="{{old('EmailCli')}}" placeholder="alguien@dominio" required>
</diV>

<div class="form-group col-md-6" >
@if($errors->first('TelefonoCli')) 
<i> {{ $errors->first('TelefonoCli') }} </i> 
@endif	<br>
Telefono De Contacto<input type = 'text' class="form-control" name = 'TelefonoCli' value="{{old('TelefonoCli')}}" placeholder="10 Digitos"required>
</diV>

<div class="form-group col-md-6" >
@if($errors->first('CalleyNumero')) 
<i> {{ $errors->first('CalleyNumero') }} </i> 
@endif	<br>
Calle & Numero <input type = 'text' class="form-control"  name = 'CalleyNumero' value="{{old('CalleyNumero')}}" placeholder="Calle 00"required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-5" >
@if($errors->first('Colonia')) 
<i> {{ $errors->first('Colonia') }} </i> 
@endif	<br>
Colonia <input type = 'text' class="form-control"  name = 'Colonia' value="{{old('Colonia')}}"required>
</div>

<div class="form-group col-md-3" >
@if($errors->first('CP')) 
<i> {{ $errors->first('CP') }} </i> 
@endif	<br>
Codigo Postal <input type = 'text' class="form-control"  name = 'CP' value="{{old('CP')}}"placeholder="00000"required>
</div>

<div class="form-group col-md-4" ><br>
Selecciona Tu Estado<select name = 'IdEstado' class="custom-select" >
	    
			@foreach($estado as $est)
			<option value = '{{$est->IdEstado}}'>{{$est->NombreEstado}}</option>
			@endforeach
                  </select>
</div>
</div>


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
