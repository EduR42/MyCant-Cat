<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use App\Cliente;
use App\TipoMascota;

class MascotaController extends Controller
{
    public function altaMasc()
        {    $clavequesigue = mascota::withTrashed()->orderBy('IdMascota','desc')
                                    ->take(1)
                                    ->get();
        if(count($clavequesigue)==0)
        {
            $IdMascota= 1;
        }
        else{
            $IdMascota = $clavequesigue[0]->IdMascota+1;
        }
            //select * from carreras 
            //ORM ELOQUENT
            // select * from carreras where activo = 'si' order by nombre asc
            $cliente = cliente::where('Activo','=','Si')
            ->orderBy('NombreCli','asc')
            ->get();

           $tipomascota = tipomascota::where('Activo','=','Si')
            ->orderBy('TipoMas','asc')
            ->get();


          
//return $carreras;
     return view ("VistasUser.Mascota")
     ->with('cliente',$cliente)
     ->with('tipomascota',$tipomascota)
     ->with('IdMascota',$IdMascota);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardaMasco(Request $request)
    {
        $IdMascota     = $request->IdMascota;
        $IdCliente     = $request->IdCliente;
        $NombreMas     = $request->NombreMas;
        $Raza          = $request->Raza;
        $IdTipoMas     = $request->IdTipoMas;
        $Activo        = $request->Activo;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
         'NombreMas'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
         'Raza'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
         'Foto'=>'image|mimes:jpeg,jpg,png,gif'
         ]);

        $file = $request->file('Foto');
        if($file!="")
        {
        $ldate = date('Ymd_His_');
        $img = $file->getClientOriginalName();
        $img2 = $ldate.$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else
        {
            $img2 = "sinfoto.png";
        }
            

            $cli = new mascota;
            $cli->IdMascota     = $request->IdMascota;
            $cli->IdCliente     = $request->IdCliente;
            $cli->NombreMas     = $request->NombreMas;
            $cli->Raza          = $request->Raza;
            $cli->Foto          = $img2;
            $cli->IdTipoMas     = $request->IdTipoMas;
            $cli->Activo        = $request->Activo;
			$cli->save();
				$proceso = "Registro De Mascotas";
	$mensaje =  "Mascota Agregada Correctamente!!";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
     }

     public function reporteMasco()
	{
        $resultado=\DB::select("SELECT m.IdMascota,c.NombreCli  as clien,m.NombreMas,m.Raza,
        m.Foto,t.TipoMas as tip,m.deleted_at
        FROM mascota AS m
        INNER JOIN cliente AS c ON c.IdCliente =  m.IdCliente
        INNER JOIN tipomascota AS t ON t.IdTipoMas =  m.IdTipoMas");		

        return view('VistasRep.ReporteMascota')
        ->with('mascota',$resultado);
    }
    
    public function eliminaMasco($IdMascota)
	{
    mascota::find($IdMascota)->delete();
	$proceso = "Baja Teporal De Mascotas";
	$mensaje =  "La Mascota ha sido Desabilitada Correctamente";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
	}
	
	public function modificaMasco($IdMascota)    
    {
		$mascota= mascota::where('IdMascota','=',$IdMascota)->get();
		$IdCliente = $mascota[0]->IdCliente;
		$cliente = cliente::where('IdCliente','=',$IdCliente)->get();
		$todasdemas = cliente::where('IdCliente','!=',$IdCliente)
                                ->orderBy('NombreCli','asc')
                                ->get();
        $IdTipoMas = $mascota[0]->IdTipoMas;
		$tipomascota = tipomascota::where('IdTipoMas','=',$IdTipoMas)->get();
		$todasdemt = tipomascota::where('IdTipoMas','!=',$IdTipoMas)
                                ->orderBy('TipoMas','asc')
								->get();
		
		
		//return $maestros;
		return view('VistasMod.ModificaMascota')
		->with('mascota',$mascota[0])
		->with('IdCliente',$IdCliente)
		->with('cliente',$cliente[0]->NombreCli)
        ->with('todasdemas',$todasdemas)
        
        ->with('IdTipoMas',$IdTipoMas)
		->with('tipomascota',$tipomascota[0]->TipoMas)
        ->with('todasdemt',$todasdemt);
        
	}
	
    public function modificaMascoLar(Request $request)
	{
		
        $IdMascota     = $request->IdMascota;
        $IdCliente     = $request->IdCliente;
        $NombreMas     = $request->NombreMas;
        $Raza          = $request->Raza;
        $IdTipoMas     = $request->IdTipoMas;
        $Activo        = $request->Activo;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
            'NombreMas'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'Raza'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
            'Foto'=>'image|mimes:jpeg,jpg,png,gif'
            ]);

            $file = $request->file('Foto');
            if($file!="")
            {
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
            }
            else
            {
                $img2 = "sinfoto.png";
            }
   
		
	 
            $cli =mascota::find($IdMascota);
            $cli->IdMascota     = $request->IdMascota;
            $cli->IdCliente     = $request->IdCliente;
            $cli->NombreMas     = $request->NombreMas;
            $cli->Raza          = $request->Raza;
            if($file!="")
			{
			$cli->Foto = $img2;
			}
            $cli->IdTipoMas     = $request->IdTipoMas;
            $cli->Activo        = $request->Activo;
			$cli->save();
				$proceso = "Modificacion de la Mascota";
	$mensaje =  "La Mascota ha sido modificada Correctamente";	
	return view ('Mensajes.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
    }
    

	public function restauraMasco($IdMascota)
	{
    mascota::withTrashed()->where('IdMascota',$IdMascota)->restore();
    $proceso = "REACTIVACION DE LA MASCOTA ";	
    $mensaje="Mascota restaurada correctamente";
    return view('Mensajes.mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
        }
        public function efisicaMasco($IdMascota)
        {
            mascota::withTrashed()->where('IdMascota',$IdMascota)->forceDelete();
    $proceso = "ELIMINACION DE LA MASCOTA";	
    $mensaje="Mascota eliminada  correctamente";
    return view('Mensajes.mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
        }

}
