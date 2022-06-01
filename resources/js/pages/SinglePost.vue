<template>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5 w-100 p-3"  style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img :src="post.img" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{post.Titolo}}</h5>
                            <p class="card-text">{{post.Autore}}</p>
                            <p class="card-text">{{post.Descrizione}}</p>
                            <p class="card-text">{{post.Data}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
name:"SinglePost",
data:function(){
    return{
        post:[],
    }
},
methods:{
        getPost(){
            axios.get("http://localhost:8000/api/posts/" + this.$route.params.id)
            .then((risultato)=>{
                this.post = risultato.data;
                console.log(this.post);
            })
        }
    },

    created(){

        this.getPost(this.$route.params.postId);
        console.log(this.$route.params.postId);
    }

}

</script>

<style>

</style>
