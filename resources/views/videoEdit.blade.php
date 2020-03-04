<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Video Upload</div>
                    {{data}}
                    <div class="card-body">
                        <form method="PUT"  novalidate enctype="multipart/form-data">
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus v-model="datos.name">
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="conten" class="col-md-4 col-form-label text-md-right">Contenido</label>
    
                                <div class="col-md-6">
                                    <textarea  id="conten" type="textarea" class="form-control" name="conten" required v-model="datos.conten"></textarea>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="video" class="col-md-4 col-form-label text-md-right">Video</label>
    
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="file">
                                     {{datos.video}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Curso</label>
    
                                <div class="col-md-6">
                                        <select class="custom-select" name="course_id">
                                        <option selected name="curso">Curso...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" @click="enviarEdit(datos)">
                                            Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Cancelar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>