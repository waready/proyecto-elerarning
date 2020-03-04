<template>
<div>
        <div class="embed-responsive embed-responsive-16by9">
        <!-- <video loop class="embed-responsive-item" controls>
            
            <source src="storage/videos/Amigos.mp4" type='video/mp4'>
        </video> -->

        <video class="img-responsive" :src="'storage/'+ items.video"  loop controls/>

    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Descripcion</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
    <div>

    <div class="col-md-12">
        <h2>{{items.name}}</h2>
        <p>{{items.conten}}</p>
        <hr>    
        <!-- <p>cifras</p> -->
        <a href="#descripcion" class="btn btn-primary" data-toggle="collapse">Mostrar mas / Ocultar</a>
        <div class="collapse" id="descripcion">
        <!-- <hr>
        <p>Caracteristicas: caracteristicas</p>
        <hr>
        <p>Descripcion: descripcion</p>
        <hr> -->
        <div class="media">
            <img src="https://blogpilates.es/wp-content/uploads/2018/03/Instructor-de-Pilates-CAPA.png" class="align-self-start mr-3 img-thumbnail" alt="perfil_instructor" width="150" height="150">
            <div class="media-body">
                <h3 class="mt-0 mb-3">{{items.course}}</h3>
                <h5 class = "mb-0">instructor</h5>
                <small>Autodidacta y apasionado de la programación en general</small>
                <p class="mt-3">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        </div>
        </div>
        <a href="#descripcion" class="btn btn-primary justify-content-center" data-toggle="collapse">Ver menos</a>

        </div>
    </div>
</div>
</div>

</template>
<script>

export default {
    name: "stripe-form",
    props:['items'],
    data(){
        return{
            propsData:"péro"
        }
    },

    
}
</script>
