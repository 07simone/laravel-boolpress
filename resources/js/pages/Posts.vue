<template>
<div class="container pt-5">
    <div class="row">
            <Post v-for="(post,index) in posts" :key="index" :post="post"/>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" v-if= "pagination.paginaCorrente > 1" @click="getPosts(pagination.paginaCorrente -1)">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link">{{pagination.paginaCorrente}}</a>
                    </li>
                    <li class="page-item" v-if= "pagination.paginaCorrente < pagination.ultimaPagina" @click="getPosts(pagination.paginaCorrente +1)">
                        <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
    </div>
</div>

</template>

<script>

import Post from '../components/Post';
export default{
    name: "Posts",
    components:{
        Post,
    },
    data(){
        return{
            posts:[],
            pagination:{}
        }
    },

    methods:{
        getPosts(page){
            axios.get('http://localhost:8000/api/posts?page='+page)
            .then((risultato)=>{
                this.posts = risultato.data.data
                const{current_page, last_page} = risultato.data;
                this.pagination = {paginaCorrente:current_page, ultimaPagina:last_page};
            })
        }
    },
    created(){
        this.getPosts();
    }



}
</script>
