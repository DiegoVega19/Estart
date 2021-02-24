<?php

namespace App\Http\Controllers;

use App\Models\Coaching;
use App\Models\Empleado;
use Illuminate\Http\Request;

class CoachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $coachings = Coaching::with('empleados')->get();
        return view('coaching.index',compact('coachings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados  = Empleado::all();
        return view('coaching.create',compact('empleados'));
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
            'horaInicio' => 'required',
            'horaFinal' => 'required',
        ]);
        $coaching = Coaching::create($request->all());
        $empleados = $request->input('empleados', []);
        for($i=0;$i<count((is_countable($empleados)?$empleados:[]));$i++)
        {
            if($empleados[$i] != '')
            {
                $coaching->empleados()->attach($empleados[$i]);

            }
        }
        return redirect('coaching')
        ->with('message','Agregado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coaching  $coaching
     * @return \Illuminate\Http\Response
     */
    public function show(Coaching $coaching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coaching  $coaching
     * @return \Illuminate\Http\Response
     */
    public function edit(Coaching $coaching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coaching  $coaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coaching $coaching)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coaching  $coaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coaching $coaching)
    {
        //
    }
}
