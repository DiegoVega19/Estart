@extends('adminlte::page')


        @section('css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Agregar Nuevo</h2>

                        <section>
                            <form action="{{route('marcaReunion.update',$reu->id)}}" method="POST">
                                @csrf
                                @method('put')
                            <div class="form-group mt-2 ">
                                <label for="exampleFormControlSelect1">Empleados</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="empleadoId">
                                @foreach($empleados as $empleado)

                                @if($empleado->id==$reu->empleado_id)
                                     <option value="{{$empleado->id}}" selected>{{$empleado->nombre}}</option>
                                @else
                                <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Categorias</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="categoriaID">
                                @foreach($categorias as $cat)
                                @if($cat->id==$reu->categoriaReceso_id)
                                     <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
                                @else
                                     <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="fecha" id="fecha" type="date" placeholder="Fecha del Sistema" value="{{$reu->fechaMarcada}}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="hora" id="tiempo" type="time" placeholder="Hora del Sistema" value="{{$reu->horaMarcada}}">
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
