@extends('adminlte::page')


        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Nuevo Entrenamiento</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul>
                            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                         @endforeach
                            </ul>
                        </div>
                            @endif
                        <section>
                            <form action="/coaching" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Ingrese nombre del Coaching" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hora Inicio</label>
                                    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese Hora de Inicio" name="horaInicio">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hora Fin</label>
                                    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese Hora Final" name="horaFinal">
                                </div>
                               <div class="card">
                                    <table class="table" id="empleados_table">
                                        <thead>
                                            <tr>
                                                <th>Asistentes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="empleado0">
                                                <td>
                                                    <select name="empleados[]" class="form-control">
                                                        <option value="">-- Seleccionar Asistentes --</option>
                                                        @foreach ($empleados as $empleado)
                                                            <option value="{{ $empleado->id }}">
                                                                {{ $empleado->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                             </tr>
                                            <tr id="empleado1"></tr>
                                        </tbody>
                                    </table>


                                        <div class="mx-auto">
                                            <button id="add_row" class="btn btn-default pull-left mr-1">+ Add</button>
                                            <button id='delete_row' class="pull-right btn btn-danger ml-1">- Delete</button>
                                        </div>



                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
             $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#empleado' + row_number).html($('#empleado' + new_row_number).html()).find('td:first-child');
      $('#empleados_table').append('<tr id="empleado' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#empleado" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
        </script>
        @endsection
