@extends('adminlte::page')
@section('title', 'Cargos')

        @section('css')

        @endsection
        @section('content')
        <div class="row">
            <div class="col-md-12" >

            <a href="{{ route('feedback.create') }}" class="btn btn-primary btn-float"><span class="fa fa-plus"></span>Agregar Feedback</a>

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
                                <th>Feedback</th>
                                <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach($feedbacks as $feed)
                                <tr>
                                    <td>{{$feed->id}}</td>
                                    <td>{{$feed->nombreEmpleado}}</td>
                                    <td>{{$feed->descripcion}}</td>

                                    <td>
                                        <div class="btn-group">


                                            <?php $data = $feed->id."*".$feed->nombreEmpleado."*".$feed->descripcion;?>

                                        <button  type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-feed"value="<?php echo $data;?>" > <span class="fa fa-eye"></span></button>
                                                {{-- Las salidas y salidas no se eliminan u editan --}}
                                        <form action="{{route('feedback.destroy',$feed->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf


                                            <button  type="submit" onclick="return confirm('Delete this element?');" class="btn btn-danger" data-toggle="modal"> <span class="fa fa-eye">Eliminar</span></button>

                                        </form>


                                    <a href="{{route('feedback.edit',$feed->id)}}" class="btn btn-warning btn-eli" ><span class="fa fa-eye">editar</span></a>


                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                       </tbody>

                    </table>
                </div>
            </div>


            <div class="modal modal-info fade" id="modal-feed">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" align="center">Informacion del Feedback</h4>
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
        var salidas = $(this).val();
        //alert(cliente);
        var info = salidas.split("*");
        html = "<p><strong>ID:</strong>"+info[0]+"</p>"
        html += "<p><strong>Nombre:</strong>"+info[1]+"</p>"
        html += "<p><strong>Fecha:</strong>"+info[2]+"</p>"
        html += "<p><strong>Hora:</strong>"+info[3]+"</p>"


        $("#modal-feed .modal-body").html(html);
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

