@extends('adminlte::page')


        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Editar Empleado</h2>
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
                            <form action="{{route('empleado.update',$emp->id)}}" method="POST">
                                @csrf
                                @method('put')
                            <div class="form-group mt-2 ">
                              <label for="formGroupExampleInput col-sm-2">Nombre</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el Nombre del Empleado" name="nombre" value="{{$emp->nombre}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput col-sm-2">Apellido</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el Apellido del Empleado" name="apellido" value="{{$emp->apellido}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Cargo</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="cargo">
                                    @foreach($cargos as $cargo)
                                    @if($cargo->id==$emp->cargo_id)
                                    <option value="{{$cargo->id}}" selected>{{$cargo->nombreCargo}}</option>
                                    @else
                                    <option value="{{$cargo->id}}">{{$cargo->nombreCargo}}</option>
                                    @endif
                                    @endforeach

                                </select>
                              </div>
                              <div class="form-group mt-2 ">
                                <label for="formGroupExampleInput col-sm-2">Numero de Empleado</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el numero del Empleado" name="RUC" value="{{$emp->codigoEmpleado}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Sexo</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="sexo">
                                    @if($emp->sexo=='M')
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    @else
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                    @endif
                                </select>
                              </div>
                              <div class="form-group mt-2 ">
                                <label for="formGroupExampleInput col-sm-2">Edad</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese su Edad" name="edad" value="{{$emp->edad}}">
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
