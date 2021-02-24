<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeback ['feedbacks'] = DB::table('feedback')
        ->join('empleados','feedback.empleado_id','=','empleados.id')
        ->select('feedback.*','empleados.nombre as nombreEmpleado')
        ->get();
        return view('feedback.index',$feeback);
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
        return view('feedback.create',$empleado);
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

            'descripcion' => 'required',
        ]);
        $feedback = new Feedback();
        $feedback -> empleado_id = $request ->get('empleadoId');
        $feedback -> descripcion = $request ->get('descripcion');
        $feedback ->save();
        return redirect('feedback')
        ->with('message','Agregado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::findorFail($id);

        $empleados= DB::table('empleados')
        ->select('empleados.*')
        ->get();

        return view('feedback.edit')
        ->with(compact('feedback','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = Feedback::findorFail($id);
        $feedback -> empleado_id = $request->get('empleados');
        $feedback -> descripcion = $request->get('descripcion');
        $feedback ->update();
        return redirect()->route('feedback.index')
        ->with('message','Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::FindorFail($id);
        $feedback ->delete();
        return redirect('feedback')
        ->with('message','Eliminado Satisfactoriamente');
    }
}
