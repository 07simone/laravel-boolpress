<template>
<div class="col-4">
        <div class="card m-1 p-3">
                <img :src="categoria.img" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{categoria.name}}</h5>
                    <h5 class="card-title">{{categoria.id}}</h5>
                </div>
        </div>
</div>
</template>

<script>
export default {

name:"SingleCategories",
data:function(){
    return{
        categoria:[],
    }
},
methods:{
        getCategoria(id){
            axios.get("http://localhost:8000/api/categories/" + id)
            .then((risultato)=>{
                this.categoria = risultato.response
                console.log(this.categoria);
            })
        }
    },
    created(){
        this.getCategoria(this.$route.params.id);
        console.log(this.$route.params.id);
    }

}
</script>

<style>

</style>
