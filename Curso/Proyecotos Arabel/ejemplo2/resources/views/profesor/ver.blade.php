<?php 
 echo "<pre>";
 print_r($cursosImpartidos);
 echo "</pre>";
?>


<html><body>
<h3>Datos del profesor</h3>

<p>Nombre y Apellido: <b>{{$profesor->nombre_apellido}}</b></p>
<p>Profesión:<b>{{$profesor->profesion}}</b></p>
<p>Grado Académico:<b>{{$profesor->grado_academico}}</b></p>
<p>Teléfono:<b>{{$profesor->telefono}}</b></p>

<h3>Cursos impartidos</h3>
<ul>
@foreach($cursosImpartidos as $curso)
<li>{{$curso->nombre}}</li>
<li>{{$curso->nivel}}</li>
@endforeach
</ul>

<a href="{{route('profesores.index')}}">volver al listado</a>


</body></html>