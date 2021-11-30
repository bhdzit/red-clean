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
    <title >Rpoerte de Caja </title>
</head>

<body>
    <h1>RED CLEAN</h1>
    <h3>Caja No. 3</h3>
    <br>
    @php
     $totalDeCaja=0;   
    @endphp
    @foreach ($notas as $nota)
    @php
    $i=1;
    $total=0;    
    @endphp
        <h3>Nota {{$nota->id}}</h3>
        <br>
        <table>
            <tr>
            <th>No.</th>
            <th style="width: 600px">Item</th>
            <th>Precio</th>
            </tr>

            @foreach ($nota->items as $item)
            @php
               $total=$total+$item->total; 
            @endphp
                <tr>
                    <td>{{$i++}}.</td>
                    <td>{{$item->descripcion}}/ {{$item->cantidad}} Kg</td>
                    <td>$ {{$item->total}}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td><strong> Total: $ {{$total}}</strong></td>
            </tr>
        </table>
        <br>
    @endforeach
    


</body>

</html>
