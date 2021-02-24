@extends('adminlte::page')


        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Agregar Nuevo</h2>
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
                            <form action="{{route('feedback.update',$feedback->id)}}" method="POST">
                                @csrf
                                @method('put')

                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Empleado</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="empleados">
                                @foreach($empleados as $empleado)
                                @if($empleado->id==$feedback->empleado_id)
                                <option value="{{$empleado->id}}" selected>{{$empleado->nombre}}</option>
                                @else
                                <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                                @endif
                                @endforeach
                              </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Feedback</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1"  name="descripcion" rows="3">{{$feedback->descripcion}}</textarea>
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
