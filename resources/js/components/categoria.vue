<template>
<div class="col-4">
        <div class="card m-1 p-3">
                <img :src="categoria.img" class="card-img-top" alt="...">
                <div class="card-body">
                    <router-link :to="{name: 'single-categories', params: { id: categoria.id } }">
                        <button type="button" class="btn btn-primary">Dettagli</button>
                    </router-link>
                    <h5 class="card-title">{{categoria.name}}</h5>
                    <h5 class="card-title">{{categoria.id}}</h5>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
        </div>
</div>

</template>

<script>
export default {
name:'categoria',

props:['categoria']

}
</script>

<style>

</style>
