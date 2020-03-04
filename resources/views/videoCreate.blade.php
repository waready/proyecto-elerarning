@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Video Upload') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('video.store') }}" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="conten" class="col-md-4 col-form-label text-md-right">{{ __('Contenido') }}</label>

                            <div class="col-md-6">
                                <textarea  id="conten" type="textarea" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="conten" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Video') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="file">
                                    {{-- <label class="custom-file-label"  aria-describedby="inputGroupFileAddon02">Suba su video</label> --}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>

                            <div class="col-md-6">
                                  <select class="custom-select" name="course_id">
                                    <option selected name="curso">Curso...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
