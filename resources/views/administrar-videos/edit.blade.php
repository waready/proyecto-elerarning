@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modificar Video</h2>

    <form action="{{ url('courses/lecciones/video/'.$video->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        
        <div class="card-body">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Subir Video') }}</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{'Name'}}</label>
                        <input name="name" id="name" type="text" autofocus class="form-control" 
                        value="{{ isset($video->name) ? $video->name : ''}}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="conten" class="control-label">{{'Contenido'}}</label>
                        <textarea name="conten" id="conten" type="text"  class="form-control">{{ isset($video->conten) ? $video->conten : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="video" class="control-label">{{'Video'}}</label>
                        @if(isset($video->video))
                        <br>
                        <div class="mx-auto" style="width: 200px;">
                        <video width="250" controls class="mx-auto">
                            <source src="{{asset('storage').'/'.$video->video}}" type="video/mp4">
                            <source src="{{$video->video}}" type="video/ogg">
                            Your browser does not support HTML5 video.
                        </video>
                        </div>
                        
                        <br>
                        @endif
                        <input name="video" id="video" type="file" class="form-control">
                    </div>

                    
                

                    <input type="submit" value="Modificar"  class="btn btn-success btn-lg ">

                    
                        <a
                        href="{{url('/courses/videos/administrar?slug='.$video->course_id)}}"
                        class="btn btn-primary btn-lg "
                        >
                        Regresar&nbsp;
                        </a> 
                    
                    <br>
                </div>
            </div>
        </div>    
    </div>
</div>

    </form>
</div>
@endsection