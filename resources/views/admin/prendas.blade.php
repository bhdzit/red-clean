@extends('layouts.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Prendas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Prendas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                           
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <table id="example" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Descripcion</th>
                                                <th>Precio</th>
                                                <th>Aciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($arregloDeprendas as $prenda)

                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $prenda->descripcion }}</td>
                                                    <td>$ {{ $prenda->precio }}</td>
                                                    <td>

                                                        <form action="{{ route('eliminarPrenda') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $prenda->id }}"
                                                                name="idPrenda">
                                                            <button class="btn btn-success" onclick=""><i
                                                                    class="fa fa-btn fa-edit"></i></button>
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-btn fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
