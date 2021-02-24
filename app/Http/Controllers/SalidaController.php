<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Support\Facades\Redirect;
use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salida ['salidas'] = DB::table('salidas')
        ->join('empleados','salidas.empleado_id','=','empleados.id')
        ->select('salidas.*','empleados.nombre as nombreEmpleado')
        ->get();
        return view('salidas.index',$salida);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado ['empleados'] = DB::table('empleados')
        ->select('empleados.id','empleados.nombre')
        ->get();
        return view('salidas.create',$empleado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salida = new Salida();
        $salida -> empleado_id = $request->get('empleadoId');
        $salida -> fechaMarcada = $request->get('fecha');
        $salida -> horaMarcada = $request->get('hora');
         //Almaceno la fecha  en una variable
         $fechaInput = $request->get('fecha');
         $horaInput = $request->get('hora');
         $empleadoInput = $request->get('empleadoId');
         $exit = '17:00';
         $fechaCheck = Salida::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->first();
         if($fechaCheck==null && $exit>$horaInput)
         {
            $salida ->save();
             return redirect('salida')
              ->with('message','Agregado Satisfactoriamente');
         }
         else

         {
             return Redirect::back()->withErrors('Ya realizo la Marca de su Horario o Todavia no es tiempo de Marcar')->withInput();
         }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();

        $sal = Salida::FindorFail($id);
        return view('salidas.edit')
        ->with(compact('sal','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sal = Salida::FindorFail($id);
        $sal -> empleado_id = $request->get('empleadoId');
        $sal -> fechaMarcada = $request->get('fecha');
        $sal -> horaMarcada = $request->get('hora');
        $sal ->update();
        return redirect()->route('salida.index')
   ->with('message','Actualizado Satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        //
    }
}
