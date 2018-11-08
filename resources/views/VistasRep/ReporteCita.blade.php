@extends('vistamain2')
@section('contenido')
<h1>Agenda de Citas</h1>
<br>
<a class="btn btn-primary" href="{{URL::action('CitaController@altaCita')}}" role="button">Nueva Cita</a>
<div class="table-responsive">
<table class="table table-bordered">
  <thead class="thead-dark" >
<tr>
	<th>Folio Cita</th><th>Cliente</th><th> Apellidos </th>
	<th>Fecha Cita</th><th>Estado De la Mascota</th><th>Mascota</th><th>Tipo De Mascota</th>
    <th>Motivo De La Cita</th><th>Tipo de Cita</th>
    <th>Opciones</th>
</tr>
</thead>

@foreach($cita as $cit)
<tr>
	<td>{{$cit->IdCita}}</td>
	<td>{{$cit->NombreCli}}</td>
    <td>{{$cit->ApellidosCli}}</td>
    <td>{{$cit->FechaCita}}</td>
    <td>{{$cit->estam}}</td>
    <td>{{$cit->NombreMas}}</td>
	<td>{{$cit->tipm}}</td>
    <td>{{$cit->MotivoCit}}</td>
    <td>{{$cit->tipc}}</td>
	
	<td>
	@if($cit->deleted_at=="")
	<a href="{{URL::action('CitaController@eliminaCita',['IdCita'=>$cit->IdCita])}}">
			  <ion-icon name="trash"></ion-icon></a>
	 <a href="{{URL::action('CitaController@modificaCita',['IdCita'=>$cit->IdCita])}}">
    <ion-icon name="add-circle"></ion-icon></a>


	</a> 
	@else
	<a href="{{URL::action('CitaController@restauraCita',['IdCita'=>$cit->IdCita])}}"> 
	Restaurar
	</a> 
	<a href="{{URL::action('CitaController@efisicaCita',['IdCita'=>$cit->IdCita])}}"> 
	Eliminar
	</a> 
	@endif
	</td>
	<tr>	
</tr>
@endforeach


</table><br>
<div>
@stop