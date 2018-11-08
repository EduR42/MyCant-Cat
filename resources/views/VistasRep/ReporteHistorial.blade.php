@extends('vistamain2')
@section('contenido')
<h1>Reporte de Historiales Medicos</h1>
<br>
<a class="btn btn-primary" href="{{URL::action('HistorialMedicoController@altahist')}}" role="button">Nuevo Historial</a>
<div class="table-responsive">
<table class="table table-bordered">
  <thead class="thead-dark" >
<tr>
	<th>Clave Historial</th><th>Cliente</th><th>Nombre Mascota </th>
	<th>Motivo de la Cita</th><th>Fecha Cita</th><th>Diagnostico</th>
    <th>Tratamiento </th><th>Proxima Cita</th><th>Opciones</th>
</tr>
</thead>

@foreach($historialmedico as $hist)
<tbody>
<tr>
	<td>{{$hist->IdHistorial}}</td>
	<td>{{$hist->clien}}</td>
    <td>{{$hist->NombreMascota}}</td>
    <td>{{$hist->MotivoCita}}</td>
    <td>{{$hist->FechaCita}}</td>
    <td>{{$hist->Diagnostico}}</td>
    <td>{{$hist->Tratamiento}}</td>
    <td>{{$hist->ProximaC}}</td>
	
	<td>
	@if($hist->deleted_at=="")
              <a href="{{URL::action('HistorialMedicoController@eliminaHis',['IdHistorial'=>$hist->IdHistorial])}}">
			  <ion-icon name="trash"></ion-icon></a>


	 <a href="{{URL::action('HistorialMedicoController@modificaHis',['IdHistorial'=>$hist->IdHistorial])}}">
    <ion-icon name="add-circle"></ion-icon></a>


	@else
	<a href="{{URL::action('HistorialMedicoController@restauraHis',['IdHistorial'=>$hist->IdHistorial])}}"> 
	Restaurar
	</a> 
	<a href="{{URL::action('HistorialMedicoController@efisicaHis',['IdHistorial'=>$hist->IdHistorial])}}"> 
	Eliminar
	</a> 
	@endif
	</td>
	<tr>	
</tr>
</tbody>
@endforeach

</table><br>
</div>

@stop