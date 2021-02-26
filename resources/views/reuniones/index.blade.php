@extends('adminlte::page')
@section('title', 'Cargos')

        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-md-12" >

            <a href="{{ route('reunion.create') }}" class="btn btn-primary btn-float"><span class="fa fa-plus"></span> Crear Nueva Reunion</a>

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
                                <th>Hora Inicio</th>
                                <th>Hora Final</th>
                                <th>Participantes
                                <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach($reunions as $reu)
                                <tr>
                                    <td>{{$reu->id}}</td>
                                    <td>{{$reu->nombreReunion}}</td>
                                    <td>{{$reu->horaInicio}}</td>
                                    <td>{{$reu->horaFinal}}</td>
                                    <td>
                                        <ul>
                                            @foreach($reu->empleados as $emp)
                                            <li>
                                                {{ $emp->nombre }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                     <td>
                                        <div class="btn-group">


                                            <?php $data = $reu->id."*".$reu->nombreReunion."*".$reu->horaInicio."*".$reu->horaFinal;?>

                                         <button  type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-reuniones"value="<?php echo $data;?>" > <span class="fa fa-eye"></span></button>

                                {{--         <form action="{{route('reunion.destroy',$reu->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf


                                            <button  type="submit" onclick="return confirm('Delete this element?');" class="btn btn-danger" data-toggle="modal"> <span class="fa fa-eye">Eliminar</span></button> --}}

                                        {{-- </form> --}}


                                    {{-- <a href="{{route('reunion.edit',$reu->id)}}" class="btn btn-warning btn-eli" ><span class="fa fa-eye">editar</span></a> --}}


                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                       </tbody>

                    </table>
                </div>
            </div>


            <div class="modal modal-info fade" id="modal-reuniones">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" align="center">Informacion de la Reunion</h4>
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
        var reuniones = $(this).val();
        //alert(cliente);
        var info = reuniones.split("*");
        html = "<p><strong>ID:</strong>"+info[0]+"</p>"
        html = "<p><strong>Nombre Reunion:</strong>"+info[1]+"</p>"
        html += "<p><strong>Hora Inicio:</strong>"+info[2]+"</p>"
        html += "<p><strong>Hora Fin:</strong>"+info[3]+"</p>"




        $("#modal-reuniones .modal-body").html(html);
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

