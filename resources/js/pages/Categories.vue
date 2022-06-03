<template>
<div class="container">
    <div class="row">

            <categoria v-for="(categoria,index) in categories" :key="index" :categoria="categoria"/>

    </div>
</div>
</template>

<script>
import categoria from '../components/categoria';

export default {
name:'categories',
components:{
    categoria,
},
data:function(){
    return{
        categories:[],
    }
},
methods:{
        getCategories(page){
            axios.get("http://localhost:8000/api/categories?page=" + page)
            .then((risultato)=>{
                this.categories = risultato.data.data;
                console.log(this.categories);
            })
        }
    },
    created(){
        this.getCategories();
    }
}
</script>

<style>

</style>
