<template>
<div class="col-3">
        <div class="card m-1">
                <img :src="post.img" class="card-img-top" alt="...">
                <div class="card-body">
                    <router-link :to="{name: 'single-post', params: { id: post.id }}">
                        <button type="button" class="btn btn-primary">Dettagli</button>
                    </router-link>
                    <h5 class="card-title">{{post.Titolo}}</h5>
                    <h5 class="card-title">{{post.Autore}}</h5>
                    <p class="card-text">{{post.Descrizione}}</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
        </div>
</div>



</template>

<script>

export default {
    name:"Post",
    components: {

    },
    props:['post']
    }


</script>

<style>
.card{
    width: 280px;
}
</style>
