@extends('adminlte::page')


        @section('css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Editar Salida</h2>

                        <section>
                            <form action="{{route('salida.update',$sal->id)}}" method="POST">
                                @csrf
                                @method('put')
                            <div class="form-group mt-2 ">
                                <label for="exampleFormControlSelect1">Empleados</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="empleadoId">
                                @foreach($empleados as $empleado)

                                @if($empleado->id==$sal->empleado_id)
                                     <option value="{{$empleado->id}}" selected>{{$empleado->nombre}}</option>
                                @else
                                <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="fecha" id="fecha" type="date" placeholder="Fecha del Sistema" value="{{$sal->fechaMarcada}}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="hora" id="tiempo" type="time" placeholder="Hora del Sistema" value="{{$sal->horaMarcada}}">
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
