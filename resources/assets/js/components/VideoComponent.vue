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
                <div style="overflow: scroll; height:500px" >
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
