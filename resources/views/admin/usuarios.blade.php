@extends('layouts.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">

                            <div class="card-body">

                                <button type="button" class="btn btn-info mb-3" data-toggle="modal"
                                    data-target="#agregarusuario">
                                    Agregar usuario
                                </button>




                                <table id="example1" class="table table-bordered table-striped">
                                    <table id="example" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Tipo</th>
                                                <th>Aciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($usuarios as $usuario)

                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $usuario->name }}</td>
                                                    <td>{{ $usuario->email }}</td>
                                                    <td>@if ($usuario->tipo) Admin @else Empleados @endif</td>
                                                    <td>
                                                        <button class="btn btn-success " data-toggle="modal"
                                                            data-target="#editarUsuario{{ $usuario->id }}"><i
                                                                class="fa fa-btn fa-edit"></i></button>
                                                        <form class="d-inline"
                                                            action="{{ route('eliminarUsuario') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $usuario->id }}"
                                                                name="idUsuario">

                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-btn fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>




                            </div>
                            <!-- /.card -->
                        </div>


                    </div>
                    <!-- /.col -->
                </div>
                <!-- ./row -->
            </div><!-- /.container-fluid -->


            <div class="modal fade" id="agregarusuario">
                <form action="{{ route('guardarUsuario') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Usuario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input name="name" type="text" class="form-control mb-2" placeholder="Nombre de usuario">
                                <input name="email" type="email" class="form-control mb-2" required placeholder="Correo">
                                <input class="form-control mb-2" name="password" type="password" placeholder="Password" autocomplete="current-password">
                                <select name="tipo" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="0">Empleado</option>

                                </select>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-outline-light">Guardar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </form>
            </div>

            @foreach ($usuarios as $usuario)
                <div class="modal fade" id="editarUsuario{{$usuario->id}}">
                    <form action="{{ route('editarUsuario') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $usuario->id }}"
                                                                name="id">

                        <div class="modal-dialog">
                            <div class="modal-content bg-info">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Usuario</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input name="name" type="text" class="form-control mb-2"
                                        placeholder="Nombre de usuario" value="{{$usuario->name}}">
                                    <input name="email" type="email" class="form-control mb-2" required
                                        placeholder="Correo" value="{{$usuario->email}}">
                                    <input class="form-control mb-2" name="password" type="password" placeholder="Password" autocomplete="current-password" >
                                    <select name="tipo" class="form-control">
                                        <option @if ($usuario->tipo) selected @endif value="1">Admin</option>
                                        <option  @if (!$usuario->tipo) selected @endif value="0">Empleado</option>

                                    </select>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </form>
                </div>
            @endforeach




        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection