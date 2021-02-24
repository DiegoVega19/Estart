<?php

namespace App\Http\Controllers;

use App\Models\MarcaReunion;
use Illuminate\Support\Facades\Redirect;
use App\Models\Empleado;
use App\Models\Reunion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarcaReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reunionmarca.indexmenu');
    }
    public function viewMyRecords()
    {
        $marcaReunion ['marcas'] = DB::table('marca_reunions')
        ->join('empleados','marca_reunions.empleado_id','=','empleados.id')
        ->join('cat_marca_reunions','marca_reunions.cat_id','=','cat_marca_reunions.id')
        ->select('marca_reunions.*','empleados.nombre as nombreEmpleado','cat_marca_reunions.nombre as nombreCat')
        ->get();
         return view('reunionmarca.indexmarcas', $marcaReunion);
    }
    public function viewMyMeetings()
    {
        $reunion ['reuniones'] = DB::table('reunions')
        ->join('reunion_empleados','reunion_empleados.reunion_id','=','reunions.id')
        ->join('empleados','reunion_empleados.empleado_id','=','empleados.id')
        ->select('reunions.id','reunions.nombreReunion','reunions.horaInicio','reunions.horaFinal','empleados.nombre as nombreEmpleado','empleados.id as idEmpleado')
        ->orderBy('reunions.horainicio', 'desc')
        ->get();
            return view('reunionmarca.viewreunions',$reunion);
    }

    public function createData($idEmpleado,$idReunion)
    {
        $empleado = Empleado::FindorFail($idEmpleado);
        $reunion = Reunion::FindorFail($idReunion);

        $categorias = DB::table('cat_marca_reunions')
        ->select('cat_marca_reunions.id','cat_marca_reunions.nombre')
        ->get();

        return view('reunionmarca.create',)
        ->with(compact('empleado','reunion','categorias'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $marca = new MarcaReunion();
        $marca -> empleado_id = $request->get('empleadoId');
        $marca -> reunion_id = $request->get('reunionId');
        $marca -> fechaMarcada = $request->get('fecha');
        $marca -> horaMarcada = $request->get('hora');
        $marca -> cat_id = $request->get('categoriaID');
        //Para validar guardamos los datos
        $fechaInput = $request->get('fecha');
        $empleadoInput = $request->get('empleadoId');
        $categoriaInput = $request->get('categoriaID');
        //Obtenemos las query con eloquent
        $fechaCheck = MarcaReunion::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->first();
        $catCheck = MarcaReunion::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->where('cat_id', '=', $categoriaInput)->first();
        if($catCheck == null )
        {
        $marca->save();
        return redirect()->route('view')
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
     * @param  \App\Models\MarcaReunion  $marcaReunion
     * @return \Illuminate\Http\Response
     */
    public function show(MarcaReunion $marcaReunion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarcaReunion  $marcaReunion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();
        $categorias= DB::table('cat_marca_reunions')
        ->select('cat_marca_reunions.*')
        ->get();

        $reu = MarcaReunion::FindorFail($id);
        return view('reunionmarca.edit')
        ->with(compact('reu','empleados','categorias'));

    }
    public function editarView($id)
    {
        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();
        $categorias= DB::table('cat_marca_reunions')
        ->select('cat_marca_reunions.*')
        ->get();

        $reu = MarcaReunion::FindorFail($id);
        return view('reunionmarca.edit')
        ->with(compact('reu','empleados','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarcaReunion  $marcaReunion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $marca = MarcaReunion::FindorFail($id);
        $marca -> empleado_id = $request->get('empleadoId');
        $marca -> reunion_id = $request->get('reunionId');
        $marca -> fechaMarcada = $request->get('fecha');
        $marca -> horaMarcada = $request->get('hora');
        $marca -> cat_id = $request->get('categoriaID');
        $marca ->update();
        return redirect()->route('view')
         ->with('message','Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarcaReunion  $marcaReunion
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarcaReunion $marcaReunion)
    {
        //
    }
}
