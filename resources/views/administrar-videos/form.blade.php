
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

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">{{'Curso'}}</label>
                        
                            <select class="custom-select form-control" name="course_id">
                            <option selected name="curso">Curso...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                        
                    </div>

                    <input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}" class="btn btn-success btn-lg ">

                    
                        <a
                        href="{{url('videos/administrar')}}"
                        class="btn btn-primary btn-lg "
                        >
                        Regresar&nbsp;<i class="fa fa-upload"></i>
                        </a> 
                    
                    <br>
                </div>
            </div>
        </div>    
    </div>
</div>