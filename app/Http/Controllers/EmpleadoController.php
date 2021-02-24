<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado ['empleados']= DB::table('empleados')
        ->join('cargos', 'cargos.id', '=', 'empleados.cargo_id')
        ->select('empleados.*','cargos.nombreCargo as carg')
        ->get();
        return view('empleados.index',$empleado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cargo['cargos'] = DB::table('cargos')
        ->select('cargos.*')
        ->get();
        return view('empleados.create',$cargo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'sexo' => 'required',
            'edad' => 'required',

        ]);

        $empleado = new Empleado();
        $empleado -> nombre = $request->get('nombre');
        $empleado -> apellido = $request->get('apellido');
        $empleado -> cargo_id = $request->get('cargo');
        $empleado -> codigoEmpleado = $request->get('RUC');
        $empleado -> sexo = $request->get('sexo');
        $empleado -> edad = $request ->get('edad');
       $empleado ->save();
       return redirect('empleado')
       ->with('message','Agregado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $emp = Empleado::findorFail($id);

        $cargos= DB::table('cargos')
        ->select('cargos.*')
        ->get();


        return view('empleados.edit')
        ->with(compact('emp','cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cargo' => 'required',
            'codigoEmpleado' => 'required',
            'sexo' => 'required',
            'edad' => 'required',

        ]);



        $emp = Empleado::findorFail($id);
        $emp -> nombre = $request->get('nombre');
        $emp -> apellido = $request->get('apellido');
        $emp -> cargo_id = $request->get('cargo');
        $emp -> codigoEmpleado = $request->get('RUC');
        $emp -> sexo = $request->get('sexo');
        $emp -> edad = $request ->get('edad');
        $sex = $request ->get('sexo');


            $emp ->update();
            return redirect()->route('empleado.index')
       ->with('message','Actualizado Satisfactoriamente');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findorFail($id);
        $empleado->delete();
        return redirect('empleado')
        ->with('message','Eliminado Satisfactoriamente');

    }
}
