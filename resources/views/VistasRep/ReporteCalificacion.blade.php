@extends('vistamain2')
@section('contenido')
<h1>Reporte de Opiniones</h1>
<br>
<a class="btn btn-primary" href="{{URL::action('CalificacionController@altaCali')}}" role="button">Nueva Calificacion</a>
<div class="table-responsive">
<table class="table table-bordered">
  <thead class="thead-dark" >
<tr>
	<th>Clave Calificacion</th><th>Cliente</th><th>Mascota </th>
	<th>Nivel Servicio</th><th>Satisfaccion</th><th>Sugerencia</th>
    <th>Opciones</th>
</tr>
</thead>

@foreach($calificacion as $cali)
<tr>
	<td>{{$cali->IdCalificacion}}</td>
	<td>{{$cali->NombreCli}}</td>
    <td>{{$cali->masc}}</td>
    <td>{{$cali->NivelServicio}}</td>
    <td>{{$cali->Satisfaccion}}</td>
    <td>{{$cali->Sugerencia}}</td>
	
	<td>
	@if($cali->deleted_at=="")
	<a href="{{URL::action('CalificacionController@eliminaCali',['IdCalificacion'=>$cali->IdCalificacion])}}">
			  <ion-icon name="trash"></ion-icon></a>
	 <a href="{{URL::action('CalificacionController@modificaCali',['IdCalificacion'=>$cali->IdCalificacion])}}">
    <ion-icon name="add-circle"></ion-icon></a>


	</a> 
	@else
	<a href="{{URL::action('CalificacionController@restauraCali',['IdCalificacion'=>$cali->IdCalificacion])}}"> 
	Restaurar
	</a> 
	<a href="{{URL::action('CalificacionController@efisicaCali',['IdCalificacion'=>$cali->IdCalificacion])}}"> 
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