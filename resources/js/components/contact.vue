<template>
<div class="col-3">
        <div class="card m-1">
            <img :src="contact.img" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{contact.nome}}</h5>
                    <h5 class="card-title">{{contact.cognome}}</h5>
                    <p class="card-text">{{contact.email}}</p>
                </div>
        </div>
</div>
</template>

<script>
export default {
name:"contact",
    components: {

    },
    props:['contact']

}

</script>

<style>

</style>
