@extends('vistamain2')
@section('contenido')


<h1>Agenda Tu Cita</h1>
<form action = "{{route('guardaCita')}}" method = "POST" enctype='multipart/form-data'>
{{csrf_field()}}

<div class="form-group">
@if($errors->first('IdCita')) 
<i> {{ $errors->first('IdCita') }} </i> 
@endif	<br>
Folio Cita <input type = 'text' class="form-control" name ='IdCita' value="{{$IdCita}}" style="height:30px; max-width: 5rem;" disabled>
</div>

<div class="form-group">
@if($errors->first('NombreCli')) 
<i> {{ $errors->first('NombreCli') }} </i> 
@endif	<br>
Nombre Cliente<input type = 'text' class="form-control" name = 'NombreCli' value="{{old('NombreCli')}}"style="height:30px; max-width: 15rem;">
</div>

<div class="form-group col-md-6" >
@if($errors->first('ApellidosCli')) 
<i> {{ $errors->first('ApellidosCli') }} </i> 
@endif	<br>
Apellidos Cliente<input type = 'text' class="form-control" name = 'ApellidosCli' value="{{old('ApellidosCli')}}" style="height:30px; max-width: 20rem;">
</div>

<div class="form-group">
@if($errors->first('FechaCita')) 
<i> {{ $errors->first('FechaCita') }} </i> 
@endif	<br>
Fecha Cita <input type = 'date' class="form-control" name = 'FechaCita' value="{{old('FechaCita')}}" style="height:30px; max-width: 10rem;">
</div>

<div class="form-group">
Estado De La Mascota<select name = 'IdEstadoMas' class="form-control" style="height:35px; max-width: 10rem;">
	    
			@foreach($estadomascota as $tip)
			<option value = '{{$tip->IdEstadoMas}}'>{{$tip->TipoEstadoMas}}</option>
			@endforeach
                  </select>
</div>

<div class="form-group">
@if($errors->first('NombreMas')) 
<i> {{ $errors->first('NombreMas') }} </i> 
@endif	<br>
Nombre de la Mascota<input type = 'text' class="form-control" name = 'NombreMas' value="{{old('NombreMas')}}"style="height:30px; max-width: 15rem;">
</div>

<div class="form-group">
Tipo De Mascota <select name = 'IdTipoMas' class="form-control" style="height:30px; max-width: 10rem;">
	    
			@foreach($tipomascota as $tipom)
			<option value = '{{$tipom->IdTipoMas}}'>{{$tipom->TipoMas}}</option>
			@endforeach
                  </select>
</div>


<div class="form-group">
@if($errors->first('MotivoCit')) 
<i> {{ $errors->first('MotivoCit') }} </i> 
@endif	<br>
Motivo De La Cita <textarea name="MotivoCit" class="form-control" rows="3"style="height:120px; max-width: 20rem;">{{old('MotivoCit')}}</textarea>
</div>
  
<div class="form-group">
Tipo De Cita <select name = 'IdTipoCit' class="form-control" style="height:30px; max-width: 10rem;">
	    
			@foreach($tipocita as $tipoc)
			<option value = '{{$tipoc->IdTipoCit}}'>{{$tipoc->NombreTipoC}}</option>
			@endforeach
                  </select>
</div>

<div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
</div>

</div>
@stop











