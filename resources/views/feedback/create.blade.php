@extends('adminlte::page')


        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Nuevo Feedback</h2>

                        <section>
                            <form action="/feedback" method="POST">
                                @csrf
                                @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul>
                            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                         @endforeach
                            </ul>
                        </div>
                            @endif
                            <div class="form-group mt-2 ">
                                <label for="exampleFormControlSelect1">Empleados</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="empleadoId">
                                @foreach($empleados as $empleados)
                                     <option value="{{$empleados->id}}">{{$empleados->nombre}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Feedback</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"></textarea>
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


