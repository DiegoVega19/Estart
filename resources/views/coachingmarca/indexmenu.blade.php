@extends('adminlte::page')


        @section('css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        @endsection
        @section('content')
                <div class="card" style="height: 50vh">
                    <div class="card-header">
                        Selecciona una Opcion
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="/marcaCoaching/ViewRecords" class="btn btn-primary btn-lg">Ver mis Registros</a>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="/marcaCoaching/MarkCoachings" class="btn btn-primary btn-lg">Marcar Hora de  Mis Coachings</a>
                    </div>
                    </div>


                </div>
            </div>
        </div>
        @endsection
