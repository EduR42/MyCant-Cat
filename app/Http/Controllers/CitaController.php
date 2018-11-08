<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\EstadoMascota;
use App\TipoMascota;
use App\TipoCita;

class CitaController extends Controller
{
    public function alt(){
        return view ("VistasUser.coo");
    }

    public function altaCita()
        {    $clavequesigue = cita::withTrashed()->orderBy('IdCita','desc')
                                    ->take(1)
                                    ->get();
        if(count($clavequesigue)==0)
        {
            $IdCita= 1;
        }
        else{
            $IdCita = $clavequesigue[0]->IdCita+1;
        }
            //select * from carreras 
            //ORM ELOQUENT
            // select * from carreras where activo = 'si' order by nombre asc
           $estadomascota = estadomascota::where('Activo','=','Si')
          ->orderBy('TipoEstadoMas','asc')
		  ->get();

		  $tipomascota = tipomascota::where('Activo','=','Si')
		  ->orderBy('TipoMas','asc')
		  ->get();

		  $tipocita = tipocita::where('Activo','=','Si')
		  ->orderBy('NombreTipoC','asc')
		  ->get();
  
  
		  

//return $carreras;
     return view ("VistasUser.Cita")
	 ->with('estadomascota',$estadomascota)
	 ->with('tipomascota',$tipomascota)
	 ->with('tipocita',$tipocita)
     ->with('IdCita',$IdCita);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardaCita(Request $request)
    {
        $IdCita        = $request->IdCita;
        $NombreCli     = $request->NombreCli;
        $ApellidosCli  = $request->ApellidosCli;
        $FechaCita     = $request->FechaCita;
        $IdEstadoMas   = $request->IdEstadoMas;
        $NombreMas     = $request->NombreMas;
		$IdTipoMas     = $request->IdTipoMas;
		$MotivoCit     = $request->MotivoCit;
		$IdTipoCit     = $request->IdTipoCit;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
		 'NombreCli'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
		 'ApellidosCli'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
		 'NombreMas'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
		 'FechaCita'=>'required|date',
         'MotivoCit'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/']
         ]);
         

            $tip = new cita;
            $tip->IdCita = $request->IdCita;
            $tip->NombreCli = $request->NombreCli;
			$tip->ApellidosCli = $request->ApellidosCli;
			$tip->FechaCita = $FechaCita;
			$tip->IdEstadoMas = $request->IdEstadoMas;
			$tip->NombreMas =$request->NombreMas;
			$tip->IdTipoMas= $request->IdTipoMas;
			$tip->MotivoCit=$request->MotivoCit;
			$tip->IdTipoCit=$request->IdTipoCit;
			$tip->save();
				$proceso = "Agenda De Cita";
	$mensaje =  "Cita Agendada  Correctamente";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
     }
     
     public function reporteCita()
     {
        $resultado=\DB::select("SELECT c.IdCita,c.NombreCli,c.ApellidosCli,c.FechaCita,
        m.TipoEstadoMas as estam,c.NombreMas,t.TipoMas as tipm,c.MotivoCit,tc.NombreTipoC as tipc,c.deleted_at
        FROM cita AS c
        INNER JOIN estadomascota AS m ON c.IdEstadoMas =  m.IdEstadoMas
        INNER JOIN tipomascota AS t ON c.IdTipoMas =  t.IdTipoMas
        INNER JOIN tipocita AS tc ON c.IdTipoCit =  tc.IdTipoCit" );	

             return view('VistasRep.ReporteCita')
             ->with('cita',$resultado);
     }
     
     public function eliminaCita($IdCita)
     {
             cita::find($IdCita)->delete();
             $proceso = "Desactivacion de La Cita";
             $mensaje =  "Cita Desabilitada Correctamente";	
             return view ('Mensajes.mensaje')
             ->with('proceso',$proceso)
             ->with('mensaje',$mensaje);
     }
     
     public function modificaCita($IdCita)    
     {
             $cita= cita::where('IdCita','=',$IdCita)->get();
            
             //return $maestros;
             return view('VistasMod.ModificaCalificacion')
             ->with('cita',$cita);
     }
     
     public function modificaCitaLar(Request $request)
     {
         
        $IdCita        = $request->IdCita;
        $NombreCli     = $request->NombreCli;
        $ApellidosCli  = $request->ApellidosCli;
        $FechaCita     = $request->FechaCita;
        $IdEstadoMas   = $request->IdEstadoMas;
        $NombreMas     = $request->NombreMas;
		$IdTipoMas     = $request->IdTipoMas;
		$MotivoCit     = $request->MotivoCit;
		$IdTipoCit     = $request->IdTipoCit;
        
         
        $this->validate($request,[
            'NombreCli'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'ApellidosCli'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'NombreMas'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'FechaCita'=>'required|date',
            'MotivoCit'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/']
            ]);
             
            $tip = cita::find($IdCita);
            $tip->IdCita = $request->IdCita;
            $tip->NombreCli = $request->NombreCli;
			$tip->ApellidosCli = $request->ApellidosCli;
			$tip->FechaCita = $FechaCita;
			$tip->IdEstadoMas = $request->IdEstadoMas;
			$tip->NombreMas =$request->NombreMas;
			$tip->IdTipoMas= $request->IdTipoMas;
			$tip->MotivoCit=$request->MotivoCit;
			$tip->IdTipoCit=$request->IdTipoCit;
            $tip->save();
            $proceso = "Modificacion de la Cita";
         $mensaje =  "¡¡Has Modificado tu Cita Satisfactoriamente GRACIAS!!";	
         return view ('Mensajes.mensaje')
         ->with('proceso',$proceso)
         ->with('mensaje',$mensaje);
 }
         
 
     public function restauraCita($IdCita)
     {
            cita::withTrashed()->where('IdCita',$IdCita)->restore();
             $proceso = "RESTAURACION DE LA CITA";	
             $mensaje="Cita restaurada correctamente";
             return view('Mensajes.mensaje')
             ->with('proceso',$proceso)
             ->with('mensaje',$mensaje);
                 }
     public function efisicaCita($IdCita)
     {
             cita::withTrashed()->where('IdCita',$IdCita)->forceDelete();
             $proceso = "CANCELACION DE LA CITA";	
             $mensaje="Cita Cancelada correctamente";
             return view('Mensajes.mensaje')
             ->with('proceso',$proceso)
             ->with('mensaje',$mensaje);
     }
}