@extends('adminlte::page')


        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Nuevo Empleado</h2>
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
                            <form action="/empleado" method="POST">
                                @csrf

                                    @if(session()->has('message'))
                                 <div class="alert alert-success">
                                 {{ session()->get('message') }}
                                         </div>
                                    @endif
                            <div class="form-group mt-2 ">
                              <label for="formGroupExampleInput col-sm-2">Nombre</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el Nombre del Empleado" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput col-sm-2">Apellido</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el Apellido del Empleado" name="apellido">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Cargo</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="cargo">
                                    @foreach($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->nombreCargo}}</option>
                                    @endforeach

                                </select>
                              </div>
                              <div class="form-group mt-2 ">
                                <label for="formGroupExampleInput col-sm-2">Numero Empleado</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el numero del Empleado" name="RUC">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Sexo</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="sexo">
                                  <option value="F">Femenino</option>
                                  <option value="M">Masculino</option>
                                </select>
                              </div>
                              <div class="form-group mt-2 ">
                                <label for="formGroupExampleInput col-sm-2">Edad</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese su Edad" name="edad">
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
