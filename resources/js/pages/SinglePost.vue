<template>
<div class="container pt-5">
    <div class="row">

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
                this.singlePost = risultato.data.data

            })
        }
    },

    created(){
        this.getPost();
    }


}
</script>
