<?php

namespace App\Http\Controllers;

use App\Models\ExternalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Http::get("https://sheet.best/api/sheets/0bb11ea6-eb5a-49b9-b399-a8daf9122d08")->json();
        return view('apiData.index')->with('collection', $data);
    }

    public function storeAndUpdate()
    {
        $datas = Http::get("https://sheet.best/api/sheets/0bb11ea6-eb5a-49b9-b399-a8daf9122d08")->json();
            $collections = $datas;
         foreach($collections as $collection)
         {
            ExternalData::updateOrCreate([
                'id' => $collection['Id'],
                'Satisfaccion' => $collection['Satisfaccion'],
                'Solucion' => $collection['Solucion'],
                'TiempoCalculado' => $collection['TiempoCalculado'],
                'SatisfaccionCalculado' => $collection['SatisfaccionCalculado'],
                'SolucionCalculada' => $collection['SolucionCalculada'],
                'Tiempo' => $collection['Tiempo'],
                'Total' => $collection['Total'],
                'TotalRedondeado' => $collection['TotalRedondeado'],
            ]);
        }
        return redirect('external')->with('message','Sincronizado con exito, ya puedes crear un Ranking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalData  $externalData
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalData $externalData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternalData  $externalData
     * @return \Illuminate\Http\Response
     */
    public function edit(ExternalData $externalData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalData  $externalData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExternalData $externalData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalData  $externalData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExternalData $externalData)
    {
        //
    }
}
