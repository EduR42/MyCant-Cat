<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistorialMedico;
use App\Cliente;


class HistorialMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        //dd('hola esto es un mens');
        return view('VistasUser.HistorialMedico');
    }


    public function altahist()
        {    $clavequesigue = historialmedico::withTrashed()->orderBy('IdHistorial','desc')
                                    ->take(1)
                                    ->get();
        if(count($clavequesigue)==0)
        {
            $IdHistorial= 1;
        }
        else{
            $IdHistorial = $clavequesigue[0]->IdHistorial+1;
        }
            //select * from carreras 
            //ORM ELOQUENT
            // select * from carreras where activo = 'si' order by nombre asc
           $cliente = cliente::where('Activo','=','Si')
          ->orderBy('NombreCli','asc')
          ->get();
//return $carreras;
     return view ("VistasUser.HistorialMedico")
     ->with('cliente',$cliente)
     ->with('IdHistorial',$IdHistorial);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardaHistorialMedico(Request $request)
    {
        $IdHistorial   = $request->IdHistorial;
        $IdCliente     = $request->IdCliente;
        $NombreMascota = $request->NombreMascota;
        $MotivoCita    = $request->MotivoCita;
        $FechaCita     = $request->FechaCita;
        $Diagnostico   = $request->Diagnostico;
		$Tratamiento   = $request->Tratamiento;
        $ProximaC      = $request->ProximaC;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
         'NombreMascota'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
         'MotivoCita'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
         'FechaCita'=>'required|date',
         'Diagnostico'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
         'Tratamiento'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
		 'ProximaC'=>'required|date'
         ]);
         

            $cli = new historialmedico;
            $cli->IdHistorial = $request->IdHistorial;
            $cli->IdCliente = $request->IdCliente;
			$cli->NombreMascota = $request->NombreMascota;
			$cli->MotivoCita = $MotivoCita;
			$cli->FechaCita = $request->FechaCita;
			$cli->Diagnostico =$request->Diagnostico;
			$cli->Tratamiento= $request->Tratamiento;
            $cli->ProximaC=$request->ProximaC;
			$cli->save();
				$proceso = "Registro de Historial Medico";
	$mensaje =  "El Historial Medico se agrego Correctamente";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
     }

    public function reporteHis()
	{
        $resultado=\DB::select("SELECT h.IdHistorial,c.NombreCli  as clien,h.NombreMascota,h.MotivoCita,
        h.FechaCita,h.Diagnostico,h.Tratamiento,h.ProximaC,h.deleted_at
        FROM historialmedico AS h
        INNER JOIN cliente AS c ON h.IdCliente =  c.IdCliente");	

        return view('VistasRep.ReporteHistorial')
        ->with('historialmedico',$resultado);
	}
	public function eliminaHis($IdHistorial)
	{
    historialmedico::find($IdHistorial)->delete();
	$proceso = "Desactivacion de Historial Medico";
	$mensaje =  "El Historial Medico ha sido Desabilitado Correctamente";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
	}
	
	public function modificaHis($IdHistorial)    
    {
		$historialmedico= historialmedico::where('IdHistorial','=',$IdHistorial)->get();
		$IdCliente = $historialmedico[0]->IdCliente;
		$cliente = cliente::where('IdCliente','=',$IdCliente)->get();
		$todasdemas = cliente::where('IdCliente','!=',$IdCliente)
		                        ->orderBy('NombreCli','asc')
								->get();
		
		//return $maestros;
		return view('VistasMod.ModificaHistorial')
		->with('historialmedico',$historialmedico[0])
		->with('IdCliente',$IdCliente)
		->with('cliente',$cliente[0]->NombreCli)
		->with('todasdemas',$todasdemas);
	}
	
    public function modificaHistorial(Request $request)
	{
		
        $IdHistorial   = $request->IdHistorial;
        $IdCliente     = $request->IdCliente;
        $NombreMascota = $request->NombreMascota;
        $MotivoCita    = $request->MotivoCita;
        $FechaCita     = $request->FechaCita;
        $Diagnostico   = $request->Diagnostico;
		$Tratamiento   = $request->Tratamiento;
        $ProximaC      = $request->ProximaC;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
            'NombreMascota'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'MotivoCita'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'FechaCita'=>'required|date',
            'Diagnostico'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'Tratamiento'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'ProximaC'=>'required|date'
            ]);
		
	 
            $cli = historialmedico::find($IdHistorial);
            $cli->IdHistorial = $request->IdHistorial;
            $cli->IdCliente = $request->IdCliente;
			$cli->NombreMascota = $request->NombreMascota;
			$cli->MotivoCita = $MotivoCita;
			$cli->FechaCita = $request->FechaCita;
			$cli->Diagnostico =$request->Diagnostico;
			$cli->Tratamiento= $request->Tratamiento;
            $cli->ProximaC=$request->ProximaC;
			$cli->save();
				$proceso = "Modificacion del Historial Medico";
	$mensaje =  "El Historial Medico ha sido modificado Correctamente";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
    }
    

	public function restauraHis($IdHistorial)
	{
    historialmedico::withTrashed()->where('IdHistorial',$IdHistorial)->restore();
    $proceso = "RESTAURACION DE historial";	
    $mensaje="Registro restaurado correctamente";
    return view('Mensajes.mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
        }
        public function efisicaHis($IdHistorial)
        {
            historialmedico::withTrashed()->where('IdHistorial',$IdHistorial)->forceDelete();
    $proceso = "ELIMINACION FISICA DE Historial";	
    $mensaje="Registro ha sido eliminado  correctamente";
    return view('Mensajes.mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
        }


}
