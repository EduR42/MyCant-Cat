<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificacion;
use App\Mascota;


class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('VistasUser.Calificacion');
    }
   

    public function altaCali()
    {    $clavequesigue = calificacion::withTrashed()->orderBy('IdCalificacion','desc')
								->take(1)
								->get();
	if(count($clavequesigue)==0)
	{
		$IdCalificacion= 1;
	}
	else{
        $IdCalificacion = $clavequesigue[0]->IdCalificacion+1;
        }
	

		$mascota = mascota::where('Activo','=','Si')
		                      ->orderBy('NombreMas','asc')
                              ->get();
                              

      return view ("VistasUser.Calificacion")
	  ->with('mascota',$mascota)
	  ->with('IdCalificacion',$IdCalificacion);
    }
    public function guardaCali(Request $request)
    {
                $IdCalificacion = $request->IdCalificacion; 
                $NombreCli    = $request->NombreCli;
                $IdMascota    = $request->IdMascota;
                $NivelServicio= $request->NivelServicio;
                $Satisfaccion = $request->Satisfaccion;
                $Sugerencia   = $request->Sugerencia;
                // NUNCA SE RECIBEN archivos
                
                $this->validate($request,[
                'NombreCli'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
                'NivelServicio'=>'required',
                'Satisfaccion'=>'required',
                'Sugerencia'=>'required|string'
                ]);
                
            
            
                $cali = new calificacion;
                $cali->IdCalificacion = $request->IdCalificacion;
                $cali->NombreCli      = $request->NombreCli;
                $cali->IdMascota      = $request->IdMascota;
                $cali->NivelServicio  =$request->NivelServicio;
                $cali->Satisfaccion   =$request->Satisfaccion;
                $cali->Sugerencia     = $request->Sugerencia;
                $cali->save();
                $proceso = "Calificacion";
            $mensaje =  "¡¡Has Calificado Nuestro Servicio Satisfactoriamente GRACIAS POR TU OPINION!!";	
            return view ('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
    }

    public function reporteCali()
	{


        $resultado=\DB::select("SELECT c.IdCalificacion,c.NombreCli,m.NombreMas as masc,c.NivelServicio,
        c.Satisfaccion,c.Sugerencia,c.deleted_at
       FROM calificacion AS c
       INNER JOIN mascota AS m ON m.IdMascota =  c.IdMascota");	

            return view('VistasRep.ReporteCalificacion')
            ->with('calificacion',$resultado);
    }
    
	public function eliminaCali($IdCalificacion)
	{
            calificacion::find($IdCalificacion)->delete();
            $proceso = "Eliminacion de la Calificacion";
            $mensaje =  "Comentario Desabilitado Correctamente";	
            return view ('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
	}
	
	public function modificaCali($IdCalificacion)    
    {
            $calificacion= calificacion::where('IdCalificacion','=',$IdCalificacion)->get();
            $IdMascota = $calificacion[0]->IdMascota;
            $mascota = mascota::where('IdMascota','=',$IdMascota)->get();
            $todasdemas = mascota::where('IdMascota','!=',$IdMascota)
                                    ->orderBy('NombreMas','asc')
                                    ->get();
            
            //return $maestros;
            return view('VistasMod.ModificaCalificacion')
            ->with('calificacion',$calificacion[0])
            ->with('IdMascota',$IdMascota)
            ->with('mascota',$calificacion[0]->NombreMas)
            ->with('todasdemas',$todasdemas);
	}
	
    public function modificaCalificacion(Request $request)
	{
		
        $IdCalificacion = $request->IdCalificacion; 
        $NombreCli    = $request->NombreCli;
        $IdMascota    = $request->IdMascota;
        $NivelServicio= $request->NivelServicio;
        $Satisfaccion = $request->Satisfaccion;
        $Sugerencia   = $request->Sugerencia;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
            'NombreCli'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'NivelServicio'=>'required',
            'Satisfaccion'=>'required',
            'Sugerencia'=>'required|string'
            ]);
            
            $cali = calificacion::find($IdCalificacion);
            $cali->IdCalificacion = $request->IdCalificacion;
            $cali->NombreCli      = $request->NombreCli;
            $cali->IdMascota      = $request->IdMascota;
            $cali->NivelServicio  =$request->NivelServicio;
            $cali->Satisfaccion   =$request->Satisfaccion;
            $cali->Sugerencia     = $request->Sugerencia;
            $cali->save();
            $proceso = "Calificacion";
        $mensaje =  "¡¡Has Calificado Nuestro Servicio Satisfactoriamente GRACIAS POR TU OPINION!!";	
        return view ('Mensajes.mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
}
		

	public function restauraCali($IdCalificacion)
	{
           calificacion::withTrashed()->where('IdCalificacion',$IdCalificacion)->restore();
            $proceso = "RESTAURACION DE CALIFICACION";	
            $mensaje="Comentario restaurado correctamente";
            return view('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
                }
    public function efisicaCali($IdCalificacion)
    {
            calificacion::withTrashed()->where('IdCalificacion',$IdCalificacion)->forceDelete();
            $proceso = "ELIMINACION FISICA DE CALIFICACION";	
            $mensaje="Registro eliminado  correctamente";
            return view('Mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
    }
}
