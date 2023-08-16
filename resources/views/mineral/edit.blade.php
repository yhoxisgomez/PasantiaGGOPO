@extends('adminlte::page')

@section('content')
 <div class="wrapper">

<form action="{{url('/mineral/'.$mineral->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('mineral.form',['Modo'=>'editar'])

</form>
</div>
@endsection
