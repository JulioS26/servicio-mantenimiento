<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="pdf">
        <div class="col-12">
            <h1>Orden : {{$item->formulario}}</h1>
        </div>
        <div class="col-12">
            Tipo de mantenimiento : {{$item->mantenimiento}}
        </div>
        <div class="col-12">
            Nombre de equipo : {{$item->equipo}}
        </div>
        <div class="col-12">
            Código de equipo : {{$item->codigo}}
        </div>
        <div class="col-12">
            Hora de inicio : {{$item->horaInicio}}
        </div>
        <div class="col-12">
            Hora final : {{$item->horaFinal}}
        </div>
        <div class="col-12">
            Horas total : {{$item->tiempoTotal}}
        </div>
        <div class="col-12">
            Actividad : {{$item->actividades}}
        </div>
        <div class="col-12">
            Materiales : {{$item->materiales}}
        </div>
        <div class="col-12">
            Observaciones : {{$item->observaciones}}
        </div>
        <div class="col-12">
            Fecha de creación : {{$item->created_at}}
        </div>
        <div class="col-12">
            fecha de actualización : {{$item->updated_at}}
        </div>
        <div class="col-12">
            Creado por : {{ Auth::user()->name }}
        </div>

    </div>
    {{-- <h1>{{$item}}</h1> --}}
    
</body>
</html>