<?php

namespace App\Http\Controllers;

use App\Models\Receso;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receso ['recesos'] = DB::table('recesos')
        ->join('empleados','recesos.empleado_id','=','empleados.id')
        ->join('categoria_recesos','recesos.categoriaReceso_id','=','categoria_recesos.id')
        ->select('recesos.*','empleados.nombre as empleado', 'categoria_recesos.nombre as categoria')
        ->get();
        return view('receso.index',$receso);

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

        $categoria ['categorias'] = DB::table('categoria_recesos')
        ->select('categoria_recesos.id','categoria_recesos.nombre')
        ->get();
        return view('receso.create',$empleado, $categoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtenemos los datos desde input
        $receso = new Receso();
        $receso -> empleado_id = $request->get('empleadoId');
        $receso -> categoriaReceso_id = $request->get('categoriaID');
        $receso -> fechaMarcada = $request->get('fecha');
        $receso -> horaMarcada = $request->get('hora');
        //Para validar guardamos los datos
        $fechaInput = $request->get('fecha');
        $horaInput = $request->get('hora');
        $empleadoInput = $request->get('empleadoId');
        $categoriaInput = $request->get('categoriaID');

        //Obtenemos las query con eloquent
        $fechaCheck = Receso::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->first();
        $catCheck = Receso::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->where('categoriaReceso_id', '=', $categoriaInput)->first();



        if($catCheck == null )
        {

           $receso ->save();
            return redirect('receso')
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
     * @param  \App\Models\Receso  $receso
     * @return \Illuminate\Http\Response
     */
    public function show(Receso $receso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receso  $receso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();
        $categorias= DB::table('categoria_recesos')
        ->select('categoria_recesos.*')
        ->get();

        $rec = Receso::FindorFail($id);
        return view('receso.edit')
        ->with(compact('rec','empleados','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receso  $receso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rec = Receso::FindorFail($id);
        $rec -> empleado_id = $request->get('empleadoId');
        $rec -> categoriaReceso_id = $request->get('categoriaID');
        $rec -> fechaMarcada = $request->get('fecha');
        $rec -> horaMarcada = $request->get('hora');
        $rec ->update();
        return redirect()->route('receso.index')
   ->with('message','Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receso  $receso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receso $receso)
    {
        //
    }
}
