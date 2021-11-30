@extends('layouts.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cortes de Caja</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Cortes de Caja</li>
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
                                <table id="example" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Usuario</th>
                                            <th>Caja</th>
                                            <th>No.Ventas</th>
                                            <th>Total en caja</th>
                                            <th>Aciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach ($cajas as $caja)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $caja->name }}</td>
                                                <td>Caja - {{ $caja->caja }}</td>
                                                <td>{{ $caja->numeroDePrendas }}</td>
                                                <td>$ {{ $caja->totalDeNota }}</td>
                                                <td>

                                                    @if (!$caja->status)

                                                    <form class="d-inline"
                                                            action="{{ route('cerrarCaja') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" 
                                                                name="idCaja" value="{{$caja->id}}">

                                                            <button type="submit"class="btn btn-success" ><i class="fas fa-lock"></i></button>
                                                        </form>
                                                    @else

                                                    <a class="btn btn-primary" href="imprimirCaja/{{ $caja->id }}"
                                                        target="_blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    @endif

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

