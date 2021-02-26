@extends('adminlte::page')
@section('title', 'Cargos')

        @section('css')

        @endsection
        @section('content')

        <div class="row">
            <div class="col-md-12" >
                <h2>Ranking Mejores Puntaciones</h2>
                <p>El total esta definido por la Satisfacion, Solucion, Tiempo y Asistencia, Felicidades a los que estan en el puesto</p>
            </div>

        </div>
        <hr>
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                        <table class="table table-striped" id="Example1">
                                <thead class="thead-dark">
                                    <th>Nombre del Empleado</th>
                                    <th>Puntacion Total</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($rankings as $data)
                                    <tr>
                                        <td>{{$data->nombre}}</td>
                                        <td>{{$data->TotalRankin}}</td>
                                    </tr>
                                    @endforeach

                           </tbody>

                        </table>
                    </div>
                </div>
        </div>


        @endsection
        @section('js')

@if(Session::has('message'))
{
    <script>
    toastr.success("{!!Session::get('message')!!}")
    </script>
}
@endif
    @endsection

