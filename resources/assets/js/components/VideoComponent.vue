<template>
    <div class="container">
        <hr>
        <!-- <div v-for="item in lecciones" :key="item"> 
            {{item}}
        </div> -->
        <h1>Introduccion al Curso</h1>
        <div class="row">
            <div class="col-md-8">
                <videos-component :items="video"></videos-component>


            </div>
            <!-- lado derecha -->
            <div class="col-md-4">
                <h3>Contenido del curso</h3>
                <div style="scrollbar scrollbar-primary" >
                    <div class="list-group" v-for="item in lecciones" :key='item.id' >
                        <a  class="list-group-item list-group-item-action" @click="capturaItem(item)">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{item.name}}</h5>
                            <small>3 days ago</small>
                            </div>
                            <p class="mb-1">{{item.conten}}</p>
                            <small>{{item.course.name}}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "video-component",
        mounted() {
            axios.get('http://localhost:8000/nada').then(
                respuesta => {
                    this.lecciones = respuesta.data
                    console.log('tag', this.lecciones  )
                }
            )
        },
        data(){
            return{
                lecciones:[],
                video:[]
            }
        },
        methods:{
            capturaItem(item){
                this.video = item;
            }
        }
    }
</script>
<style>
    .selector {
        /* definir una altura pequeña para forzar el scroll */
        height: 100px;
        overflow-y: scroll;
        width: 300px;
    
        /* cambiar el estilo por defecto de la barra de scroll */
        scrollbar-color: yellow #800080;
        scrollbar-width: 10px;
    }
    .scrollbar {  
    float: left;
    height: 500px;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
    }
    .force-overflow {
    min-height:  501px;
    }
    
    .scrollbar-primary::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-primary::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: rgb(156, 9, 58); }
    
    .scrollbar-primary {
    scrollbar-color: #4285F4 #F5F5F5;
    }
    
    .scrollbar-danger::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }
    
    .scrollbar-danger::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-danger::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #ff3547; }
    
    .scrollbar-danger {
    scrollbar-color: #ff3547 #F5F5F5;
    }
    
    .scrollbar-warning::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }
    
    .scrollbar-warning::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-warning::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #FF8800; }
    
    .scrollbar-warning {
    scrollbar-color: #FF8800 #F5F5F5;
    }
    
    .scrollbar-success::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }
    
    .scrollbar-success::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-success::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #00C851; }
    
    .scrollbar-success {
    scrollbar-color: #00C851 #F5F5F5;
    }
    
    .scrollbar-info::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }
    
    .scrollbar-info::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-info::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #33b5e5; }
    
    .scrollbar-info {
    scrollbar-color: #33b5e5 #F5F5F5;
    }
    
    .scrollbar-default::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }
    
    .scrollbar-default::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-default::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #2BBBAD; }
    
    .scrollbar-default {
    scrollbar-color: #2BBBAD #F5F5F5;
    }
    
    .scrollbar-secondary::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }
    
    .scrollbar-secondary::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }
    
    .scrollbar-secondary::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #aa66cc; }
    
    .scrollbar-secondary {
    scrollbar-color: #aa66cc #F5F5F5;
    }
    </style>