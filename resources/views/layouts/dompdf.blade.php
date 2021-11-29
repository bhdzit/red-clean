<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <style>
        html {
            width: 100%;
            height: 100%;
            padding: 0;
            margin-left: 5px;
        }

        h5,
        h3 {
            padding: 0;
            margin: 5px;
        }

        label {
            font-size: 15px;
            margin: 5px;
        }

    </style>
</head>

<body>
    <center>
        <div style="margin: 0px;width: 190px;">

            <h3>RED CLEAN</h3><br>
            <label>NOMBRE DE CALLE 22</label>
            <label>772 1234 567</label><br>
            <label>*SOMOS DIFERENTES*</label>
            <br><br>
            <h5 style="border-top: 2px solid #000;border-bottom: 2px solid #000;">COMPROBANTE DE PAGO</h5>
            @php
                $total = 0;
            @endphp
            @foreach ($items as $item)
                <h5>
                    <strong>{{ $item->cantidad }}/kg - {{ $item->descripcion }} - ${{ $item->total }} <br></strong>
                </h5>
                @php
                    $total += $item->total;
                @endphp
            @endforeach

            @if ($domicilio)
                <h5>
                    <strong>Servicio a domicilio - $35 <br></strong>
                </h5>
                @php
                    $total += 35;
                @endphp
            @endif
                <br>

            <label style="display: block; text-align: left;"><strong> Total $ {{ $total }}</strong></label>
            <p style="border-top: 2px solid #000;"></p>
            <br>
            <label>GRACIAS POR<br>
                SU PREFERENCIA</label>

        </div>
    </center>
</body>

</html>
