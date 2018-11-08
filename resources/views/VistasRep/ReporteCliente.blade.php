@extends('vistamain2')
@section('contenido')
<h1>Reporte de Clientes</h1>
<br>
<a class="btn btn-primary" href="{{URL::action('ClienteController@altaCli')}}" role="button">Nueva Cliente</a>
<div class="table-responsive">
<table class="table table-bordered">
  <thead class="thead-dark" >
<tr>
	<th>Clave Cliente</th><th>Cliente</th><th>Email Cliente</th>
	<th>Telefono Cliente</th><th>Direccion</th><th>Colonia</th>
    <th>CP</th><th>Estado</th><th>Opciones</th>
</tr>
</thead>

@foreach($cliente as $cli)
<tr>
    <td>{{$cli->IdCliente}}</td>
    <td>{{$cli->NombreCli}}</td>
	<td>{{$cli->EmailCli}}</td>
    <td>{{$cli->TelefonoCli}}</td>
    <td>{{$cli->CalleyNumero}}</td>
    <td>{{$cli->Colonia}}</td>
    <td>{{$cli->CP}}</td>
    <td>{{$cli->est}}</td>
    
    <td>
	@if($cli->deleted_at=="")
	<a href="{{URL::action('ClienteController@eliminaCli',['IdCliente'=>$cli->IdCliente])}}">
			  <ion-icon name="trash"></ion-icon></a>
	 <a href="{{URL::action('ClienteController@modificaCli',['IdCliente'=>$cli->IdCliente])}}">
    <ion-icon name="add-circle"></ion-icon></a>

	@else
	<a href="{{URL::action('ClienteController@restauraCli',['IdCliente'=>$cli->IdCliente])}}"> 
	Restaurar
	</a> 
	<a href="{{URL::action('ClienteController@efisicaCli',['IdCliente'=>$cli->IdCliente])}}"> 
	Eliminar
	</a> 
	@endif
	</td>

	<tr>

	
</tr>
@endforeach

  </table>
</div>
@stop