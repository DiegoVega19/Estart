@extends('adminlte::page')


        @section('css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Nueva Marcacion</h2>

                        <section>
                            <form action="/marcaReunion" method="POST">
                                @csrf

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Categoria</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="categoriaID">
                                @foreach($categorias as $cat)
                                     <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group mt-2 ">
                                <label for="exampleFormControlSelect1">Empleado</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="empleadoId">

                                     <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>

                              </select>
                            </div>
                            <div class="form-group mt-2 ">
                                <label for="exampleFormControlSelect1">Reunion</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="reunionId">

                                     <option value="{{$reunion->id}}">{{$reunion->nombreReunion}}</option>

                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Fecha</label>
                                <input class="form-control" name="fecha" id="fecha" type="text" placeholder="Fecha del Sistema" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Hora</label>
                                <input class="form-control" name="hora" id="tiempo" type="text" placeholder="Hora del Sistema" readonly>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </div>
                          </form>
                        </section>

                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')
        <script>
            $(document).ready(function() {
        var horaActual;
        var fechaOtra;
        var interval = setInterval(function() {
        var momentNow = moment();
        //Fecha Actual
        horaActual = momentNow.format('hh:mm:ss');
        fechaOtra = momentNow.format('YYYY-MM-DD')
        //Hora Actual

        $('#fecha').val(fechaOtra);

        $('#tiempo').val(horaActual);
        }, 100);

    $('#stop-interval').on('click', function() {
        clearInterval(interval);

        $('#tiempotext').html(fechaActual);
        $('#horatext').html(horaActual);
    });
    });
        </script>
@if ($errors->any())
{
    <script>
          @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
    </script>
}
@endif
        @endsection
