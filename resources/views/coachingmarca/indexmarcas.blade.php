@extends('adminlte::page')
@section('title', 'Cargos')

        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-md-12" >

            {{-- <a href="{{ route('entrada.create') }}" class="btn btn-primary btn-float"><span class="fa fa-plus"></span>Agregar Entradas</a> --}}

            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-striped" id="Example1">
                            <thead>
                                <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach($marcas as $marc)
                                <tr>
                                    <td>{{$marc->id}}</td>
                                    <td>{{$marc->nombreEmpleado}}</td>
                                    <td>{{$marc->fechaMarcada}}</td>
                                    <td>{{$marc->horaMarcada}}</td>
                                    <td>{{$marc->tipoCoachings}}</td>
                                    <td>
                                        <div class="btn-group">


                                            <?php $data = $marc->id."*".$marc->nombreEmpleado."*".$marc->fechaMarcada."*".$marc->horaMarcada."*".$marc->tipoCoachings;?>

                                        <button  type="button" class="btn btn-info btn-view mr-1" data-toggle="modal" data-target="#modal-marc"value="<?php echo $data;?>" > <span class="fa fa-eye"></span></button>
                                                {{-- Las entradas y salidas no se eliminan u editan --}}
                                        {{-- <form action="{{route('entrada.destroy',$ent->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf


                                            <button  type="submit" onclick="return confirm('Delete this element?');" class="btn btn-danger" data-toggle="modal"> <span class="fa fa-eye">Eliminar</span></button>

                                        </form> --}}


                                    <a href="{{route('marcaReunion.editRedirect',$marc->id)}}" class="btn btn-success btn-eli" ><span class="fas fa-edit"></span></a>


                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                       </tbody>

                    </table>
                </div>
            </div>


            <div class="modal modal-info fade" id="modal-marc">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" align="center">Informacion</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

        <div class="modal modal-danger fade" id="mesaje-error">
            <div class="modal-content">
                  <div class="alert alert-dismissible">
                      <h5 id="mensaje"><i class="icon fa fa-thumbs-o-down"></i></h5>
                  </div>
                   <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>


        @endsection
        @section('js')
<script>

$(document).ready(function(){


    $(".btn-view").on("click", function(){
        var marc = $(this).val();
        //alert(cliente);
        var info = marc.split("*");
        html = "<p><strong>ID:</strong>"+info[0]+"</p>"
        html += "<p><strong>Nombre:</strong>"+info[1]+"</p>"
        html += "<p><strong>Fecha:</strong>"+info[2]+"</p>"
        html += "<p><strong>Hora:</strong>"+info[3]+"</p>"
        html += "<p><strong>Tipo:</strong>"+info[4]+"</p>"

        $("#modal-marc .modal-body").html(html);
    });
});
</script>
@if(Session::has('message'))
{
    <script>
    toastr.success("{!!Session::get('message')!!}")
    </script>
}
@endif
    @endsection

