@extends('vistamain2')
@section('contenido')
<h1>Mascotas Registradas</h1>
<br>
<a class="btn btn-primary" href="{{URL::action('MascotaController@altaMasc')}}" role="button">Nueva Mascota</a>
<div class="table-responsive">
<table class="table table-bordered">
  <thead class="thead-dark" >
<tr>
	<th>Clave Mascota</th><th>Cliente</th><th>Nombre Mascota </th>
	<th>Raza</th><th>Foto</th><th>Tipo Mascota</th>
    <th>Opciones</th>
</tr>
</thead>

@foreach($mascota as $masco)
<tbody>
<tr>
	<td>{{$masco->IdMascota}}</td>
	<td>{{$masco->clien}}</td>
    <td>{{$masco->NombreMas}}</td>
    <td>{{$masco->Raza}}</td>
    <td></td>
    <td>{{$masco->tip}}</td>
    <td>
	@if($masco->deleted_at=="")
	<a href="{{URL::action('MascotaController@eliminaMasco',['IdMascota'=>$masco->IdMascota])}}">
			  <ion-icon name="trash"></ion-icon></a>
	 <a href="{{URL::action('MascotaController@modificaMasco',['IdMascota'=>$masco->IdMascota])}}">
    <ion-icon name="add-circle"></ion-icon></a>


	</a> 
	@else
	<a href="{{URL::action('MascotaController@restauraMasco',['IdMascota'=>$masco->IdMascota])}}"> 
	Restaurar
	</a> 
	<a href="{{URL::action('MascotaController@efisicaMasco',['IdMascota'=>$masco->IdMascota])}}"> 
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