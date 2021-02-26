@extends('adminlte::page')
@section('title', 'Cargos')

        @section('css')

        @endsection
        @section('content')

        <div class="row">
            <div class="col-md-12" >

            <a href="{{ route('empleado.create') }}" class="btn btn-primary btn-float"><span class="fa fa-plus"></span> Agregar Empleados</a>

            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-striped" id="Example1">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Numero Empleado</th>
                                <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach($empleados as $emp)
                                <tr>
                                    <td>{{$emp->id}}</td>
                                    <td>{{$emp->nombre}}</td>
                                    <td>{{$emp->apellido}}</td>
                                    <td>{{$emp->codigoEmpleado}}</td>
                                    <td>
                                        <div class="btn-group ">


                                            <?php $data = $emp->id."*".$emp->nombre."*".$emp->apellido."*".$emp->carg."*".$emp->codigoEmpleado."*".$emp->sexo."*".$emp->edad;

                                            ?>

                                        <button  type="button" class="btn btn-info btn-view mr-1" data-toggle="modal" data-target="#modal-empleado"value="<?php echo $data;?>" > <span class="far fa-eye"></span></button>

                                        <form action="{{route('empleado.destroy',$emp->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf


                                            <button  type="submit" onclick="return confirm('Delete this element?');" class="btn btn-danger mr-1" data-toggle="modal"> <span class="fa fa-trash-alt"></span></button>

                                        </form>


                                    <a href="{{route('empleado.edit',$emp->id)}}" class="btn btn-success btn-eli" ><span class="fas fa-edit"></span></a>


                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                       </tbody>

                    </table>
                </div>
            </div>


            <div class="modal modal-info fade" id="modal-empleado">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" align="center">Informacion del Empleado</h4>
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
        var empleados = $(this).val();
        //alert(cliente);
        var infoEmp = empleados.split("*");
        html = "<p><strong>ID:</strong>"+infoEmp[0]+"</p>"
        html += "<p><strong>Nombre:</strong>"+infoEmp[1]+"</p>"
        html += "<p><strong>Apellido:</strong>"+infoEmp[2]+"</p>"
        html += "<p><strong>Cargo:</strong>"+infoEmp[3]+"</p>"
        html += "<p><strong>RUC:</strong>"+infoEmp[4]+"</p>"
        html += "<p><strong>Sexo:</strong>"+infoEmp[5]+"</p>"
        html += "<p><strong>Edad:</strong>"+infoEmp[6]+"</p>"

        $("#modal-empleado .modal-body").html(html);
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

