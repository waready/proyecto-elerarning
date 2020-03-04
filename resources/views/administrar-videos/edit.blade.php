@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modificar Video</h2>

    <form action="{{ url('/videos/'.$video->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        
        @include('administrar-videos.form',['Modo'=>'editar'])

    </form>
</div>
@endsection