@extends('layouts.master')
@section('contenido')
<h3>Empleados</h3>
<div class="container">
<table class="table table-bordered mb-5">
<thead>
<tr class="table-success">
 <th scope="col">@sortablelink('nombre')</th><th scope="col"> @sortablelink('apellidos')</th><th scope="col">@sortablelink('sueldo')</th><th scope="col">Departamento</th><th scope="col">Idiomas</th><th scope="col"></th></tr>
 
</thead>

</table>
  <!!{!! $g->appends(\Request::except('page'))->render() !!}
</div>
@endsection
<script>
    function eliminarEmpleado(value) {
        action = confirm(value) ? true : event.preventDefault()
    }
</script>
