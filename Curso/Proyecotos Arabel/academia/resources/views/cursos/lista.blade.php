<!DOCTYPE html>
<html>
   
<body>
 

<a href="{{ route('cursos.create') }}"> Nuevo Curso</a>
<br><br>
    <table>
        <tr><th>Nombre</th><th>Nivel</th><th>Horas</th><th>Id. Profesor</th></tr>
    @foreach ($cursos as $curso)
    <tr>
        <td>{{ $curso->nombre }}</td>
        <td>{{ $curso->nivel }}</td>
        <td>{{ $curso->horas_academicas }}</td>
        <td>{{ $curso->profesor->nombre_apellido}}</td>
        
        <td>
            <a href="/cursos/ver/{{$curso->id}}">Ver</a>
            <a href="/cursos/editar/{{$curso->id}}">Editar</a>
           
            <a href="/cursos/eliminar/{{$curso->id}}" onclick="return eliminarCurso('Eliminar Curso')"> Eliminar</a>
        </td>
</tr>
@endforeach
</table>
<script>
    function eliminarCurso(value) {
        action = confirm(value) ? true : event.preventDefault()
    }
</script>

</body>
</html>
