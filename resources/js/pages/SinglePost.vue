<template>
<div class="container pt-5">
    <div class="row">
<div class="card m-1">
                <img :src="post.img" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">{{post.Titolo}}</h5>
                    <h5 class="card-title">{{post.Autore}}</h5>
                    <p class="card-text">{{post.Descrizione}}</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
        </div>
    </div>
</div>

</template>

<script>


export default{
    name: "SinglePost",
    data(){
        return{
            singlePost:[],
        }
    },

    methods:{
        getPost(){
            axios.get('http://localhost:8000/api/posts/' + this.$route.params.id)
            .then((risultato)=>{
                this.singlePost = risultato.data.results
            })
        }
    },

    created(){
        this.getPost();
    }


}
</script>
