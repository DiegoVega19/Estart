@extends('adminlte::page')
@section('title', 'Cargos')

        @section('css')

        @endsection
        @section('content')

        <div class="row">
            <div class="col-md-12" >
                <form action="/externalData" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-float">Sincronizar Datos</button>
                </form>

            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-striped" id="Example1">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Satisfaccion</th>
                                <th>Solucion</th>
                                <th>Tiempo</th>
                                <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach($collection as $data)
                                <tr>
                                    <td>{{$data['Id']}}</td>
                                    <td>{{$data['Satisfaccion']}}</td>
                                    <td>{{$data['Solucion']}}</td>
                                    <td>{{$data['Tiempo']}}</td>
                                    <td>{{$data['Total']}}</td>
                                </tr>
                                @endforeach

                       </tbody>

                    </table>
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

