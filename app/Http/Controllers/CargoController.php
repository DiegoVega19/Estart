<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cargos']=Cargo::all();
        // $datos['doctores']=Doctor::all();
        return view('cargo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo.create');
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
            'nombreCargo' => 'required',

        ]);

        $cargo = new Cargo();
        $cargo -> nombreCargo = $request->get('nombreCargo');
        $cargo ->save();
         return redirect('cargo')
         ->with('message','Agregado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('cargo.edit',compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreCargo' => 'required',

        ]);
        $cargo=Cargo::findorFail($id);
        $cargo -> nombreCargo = $request->get('nombreCargo');
        $cargo ->update();
        return redirect()->route('cargo.index')
                        ->with('message','Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo=Cargo::findorFail($id);
        $cargo ->delete();
        return redirect('/cargo')
        ->with('message','Eliminado Satisfactoriamente');
    }
}
