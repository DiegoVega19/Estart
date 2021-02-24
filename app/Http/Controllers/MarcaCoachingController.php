<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\MarcaCoaching;
use App\Models\Empleado;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coaching;
use Illuminate\Http\Request;

class MarcaCoachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coachingmarca.indexmenu');
    }
    public function viewMyRecords()
    {
        $marcaCoaching ['marcas'] = DB::table('marca_coachings')
        ->join('empleados','marca_coachings.empleado_id','=','empleados.id')
        ->join('cat_marca_coachings','marca_coachings.cat_id','=','cat_marca_coachings.id')
        ->select('marca_coachings.*','empleados.nombre as nombreEmpleado','cat_marca_coachings.nombre as tipoCoachings')
        ->get();
         return view('coachingmarca.indexmarcas', $marcaCoaching);
    }
    public function viewMyCoachings()
    {
        $coaching ['coachings'] = DB::table('coachings')
        ->join('coaching_empleados','coaching_empleados.coaching_id','=','coachings.id')
        ->join('empleados','coaching_empleados.empleado_id','=','empleados.id')
        ->select('coachings.id','coachings.nombre as nombreCoaching','coachings.horaInicio','coachings.horaFinal','empleados.nombre as nombreEmpleado','empleados.id as idEmpleado')
        ->orderBy('coachings.horainicio', 'desc')
        ->get();
            return view('coachingmarca.viewcoachings',$coaching);
    }

    public function createData($idEmpleado,$idCoaching)
    {
        $empleado = Empleado::FindorFail($idEmpleado);
       $coaching = Coaching::FindorFail($idCoaching);
       $categorias = DB::table('cat_marca_coachings')
       ->select('cat_marca_coachings.id','cat_marca_coachings.nombre')
       ->get();
        return view('coachingmarca.create')
        ->with(compact('empleado','coaching','categorias'));

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
        $marca = new MarcaCoaching();
        $marca -> empleado_id = $request->get('empleadoId');
        $marca -> coaching_id = $request->get('coachingID');
        $marca -> fechaMarcada = $request->get('fecha');
        $marca -> horaMarcada = $request->get('hora');
        $marca -> cat_id = $request->get('categoriaID');
        //Para validar guardamos los datos en una variable
        //Para validar guardamos los datos
        $fechaInput = $request->get('fecha');
        $empleadoInput = $request->get('empleadoId');
        $categoriaInput = $request->get('categoriaID');
        //Realizamos la query para encontrar el dato con eloquent
        $catCheck = MarcaCoaching::where('fechaMarcada', '=', $fechaInput)->where('empleado_id','=', $empleadoInput)->where('cat_id', '=', $categoriaInput)->first();
        if($catCheck == null )
        {
            $marca->save();
            return redirect()->route('viewC')
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
     * @param  \App\Models\MarcaCoaching  $marcaCoaching
     * @return \Illuminate\Http\Response
     */
    public function show(MarcaCoaching $marcaCoaching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarcaCoaching  $marcaCoaching
     * @return \Illuminate\Http\Response
     */
    public function edit(MarcaCoaching $marcaCoaching)
    {
        //
    }

    public function editarView($id)
    {
        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();
        $categorias= DB::table('cat_marca_reunions')
        ->select('cat_marca_reunions.*')
        ->get();

        $coa = MarcaCoaching::FindorFail($id);
        return view('coachingmarca.edit')
        ->with(compact('coa','empleados','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarcaCoaching  $marcaCoaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca = MarcaCoaching::FindorFail($id);
        $marca -> empleado_id = $request->get('empleadoId');
        $marca -> reunion_id = $request->get('reunionId');
        $marca -> fechaMarcada = $request->get('fecha');
        $marca -> horaMarcada = $request->get('hora');
        $marca -> cat_id = $request->get('categoriaID');
        $marca ->update();
        return redirect()->route('viewC')
         ->with('message','Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarcaCoaching  $marcaCoaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarcaCoaching $marcaCoaching)
    {
        //
    }
}
