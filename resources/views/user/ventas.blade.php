@extends('user.layout')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ventas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Ventas</li>
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
                                    data-target="#agregarVenta">
                                    Nueva Venta
                                </button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <table id="example" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Cliente</th>
                                                <th>Descripcion</th>
                                                <th>Caja</th>
                                                <th>Total</th>
                                                <th>Aciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($notas as $nota)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $nota->nombre }}</td>
                                                    <td>
                                                        @foreach ($nota->items as $item)
                                                            <p>{{ $item->descripcion }} / $ {{ $item->total }}</p>
                                                        @endforeach
                                                    </td>
                                                    <td>Caja {{ $nota->caja_id }}</td>
                                                    <td>$ {{ $nota->items->sum('total') }}</td>
                                                    <td>
                                                        <a class="btn btn-success" href="imprimirTicket/{{$nota->id}}" target="_blank">
                                                            <i class="fas fa-print"></i>
                                                        </a>
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


            <div class="modal fade" id="agregarVenta">
                <form action="{{ route('guardarVenta') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar egreso</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="contenedorDeItem">

                                <div class="row">
                                    <div class="col-8">
                                        <input name="nombre" type="text" class="form-control" placeholder="Nombre"
                                            required>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- radio -->
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input name="domicilio" type="checkbox" id="checkboxPrimary1">
                                                <label for="checkboxPrimary1">A domicilio</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2" id="itemDeVenta">
                                    <div class="col-5">
                                        <select name="item[]" class="custom-select rounded-0" id="exampleSelectRounded0">
                                            @foreach ($prendas as $prenda)
                                                <option data-precio="{{ $prenda->precio }}" value="{{ $prenda->id }}">
                                                    {{ $prenda->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input required name="cantidad[]" type="text" class="form-control"
                                            placeholder="Cantidad" onkeyup="editCantidad(this)">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" placeholder="0" disabled>
                                    </div>

                                </div>


                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <button onclick="agregarItem()" type="button" class="btn btn-primary col start">
                                            <i class="fas fa-plus"></i>
                                            <span>Agregar ITEM</span>
                                        </button>
                                    </div>
                                </div>
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
        </section>
    </div>
@endsection

@section('script')
    <script>
        let itemDeVenta = document.getElementById("itemDeVenta");
        let contenedorDeItem = document.getElementById("contenedorDeItem");
        $('#agregarVenta').on('hidden.bs.modal', function(e) {
            contenedorDeItem.innerHTML = "<div class=\"row mt-2\">" + itemDeVenta.innerHTML + "</div>";
        });

        function agregarItem() {
            let div = document.createElement("div")
            div.classList.add("row", "mt-2");
            div.innerHTML = itemDeVenta.innerHTML;
            contenedorDeItem.append(div);

        }

        function editCantidad(evt) {
            let divContenedor = evt.parentElement.parentElement.children;
            let prendaSelecionada = divContenedor[0].children[0];
            let precioDePrenda = prendaSelecionada.options[prendaSelecionada.selectedIndex].getAttribute("data-precio");
            let total = divContenedor[2].children[0];
            total.value = evt.value * precioDePrenda;
        }

        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
