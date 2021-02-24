<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Support\Facades\Redirect;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrada ['entradas'] = DB::table('entradas')
        ->join('empleados','entradas.empleado_id','=','empleados.id')
        ->select('entradas.*','empleados.nombre as nombreEmpleado')
        ->get();
        return view('entradas.index',$entrada);

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
        return view('entradas.create',$empleado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = new Entrada();
        $entrada -> empleado_id = $request->get('empleadoId');
        $entrada -> fechaMarcada = $request->get('fecha');
        $entrada -> horaMarcada = $request->get('hora');
        //Almaceno la fecha  en una variable
        $fechaInput = $request->get('fecha');
        $horaInput = $request->get('hora');
        $empleadoInput = $request->get('empleadoId');
        $entry = '8:00';
        $fechaCheck = Entrada::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->first();
        if($fechaCheck==null && $entry>$horaInput)
        {
            $entrada ->save();
            return redirect('entrada')
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
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();

        $ent = Entrada::FindorFail($id);
        return view('entradas.edit')
        ->with(compact('ent','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ent = Entrada::FindorFail($id);
        $ent -> empleado_id = $request->get('empleadoId');
        $ent -> fechaMarcada = $request->get('fecha');
        $ent -> horaMarcada = $request->get('hora');
        $ent ->update();
        return redirect()->route('entrada.index')
   ->with('message','Actualizado Satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findorFail($id);
        $empleado ->delete();
        return redirect('entrada')
        ->with('message','Eliminado Satisfactoriamente');
    }
}
