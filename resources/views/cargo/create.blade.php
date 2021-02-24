@extends('adminlte::page')


        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title col-md-12 text-primary mb-2">Agregar Nuevo</h2>

                        <section>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                     <ul>
                                    @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                 @endforeach
                                    </ul>
                                </div>
                                    @endif
                            <form action="/cargo" method="POST">
                                @csrf
                            <div class="form-group mt-2 ">
                              <label for="formGroupExampleInput col-sm-2">Cargo</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el Nombre del Cargo" name="nombreCargo">
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
