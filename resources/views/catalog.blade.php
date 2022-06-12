<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @if( $catalog != '')
        <h1>{{$catalog}}</h1>
    @else
        <h1> Catalog </h1>
        <a href="catalog/medicines">Medicines</a><br>
        <a href="catalog/med_equip">Medicine Equipment</a>
    @endif
    @if( $catalog == 'Medicines')
        <a href="medicines/1"><img src="{{ asset('storage/img/medicines1.jpg') }}" alt="Panadol" height="300px" width="300px"></a><br>
        <p>Panadol</p>
        <a href="medicines/2"><img src="{{ asset('storage/img/medicines2.jpg') }}" alt="OBH Combi" height="300px" width="300px"></a><br>
        <p>OBH Combi</p>
        <a href="medicines/3"><img src="{{ asset('storage/img/medicines3.jpg') }}" alt="Paramex" height="300px" width="300px"></a><br>
        <p>Paramex</p>
    @elseif ($catalog == 'Medicine Equipment')
        <a href="med_equip/1"><img src="{{ asset('storage/img/med_equip1.jpg') }}" alt="Stitches" height="300px" width="300px"></a><br>
        <p>Gunting Bedah</p>
        <a href="med_equip/2"><img src="{{ asset('storage/img/med_equip2.jpg') }}" alt="Stethoscope" height="300px" width="300px"></a><br>
        <p>Stetoskop</p>
    @endif
</body>
</html>
