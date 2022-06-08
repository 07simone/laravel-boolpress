<template>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <form class="d-flex">
                <input type="text" v-model="search" placeholder="Search" >
                <a href="#" class="btn btn-outline-success" @click ="getPostsSearch(search)" >Search</a>
            </form>
        </div>
        <div v-if="isLoading" class="loading">
            <img class="loading" src="https://c.tenor.com/ffyK3EANQyYAAAAd/loading-chemical.gif" alt="">
        </div>

            <Post v-for="(post,index) in posts" :key="index" :post="post"/>             <!-- li importo i post per dirli che lui ha tanti figli post e al suo interno vado a fare il v-for -->
            <div v-if="posts.length" v-observe-visibility="scrollToBottom">

        </div>

        <div class="col-12">
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
</div>

</template>

<script>

import Post from '../components/Post';
export default{
    name: "Posts",
    components:{
        Post,       // importo il componente Post figlio
    },
    data(){
        return{
            posts:[],
            pagination:{},
            page : 1,
            lastPage:1,
            search: '',
            isLoading: false,
        }
    },

    methods:{
        getPosts(){
            this.isLoading = true;
            axios.get(`http://localhost:8000/api/posts?page=${this.page}`)
            .then((risultato)=>{
                this.posts.push(...risultato.data.data);
                this.lastPage = risultato.data.last_page;
                console.log(this.posts);
                const{current_page, last_page} = risultato.data;
                this.pagination = {paginaCorrente:current_page, ultimaPagina:last_page};
            })
            .catch((errore)=>{
                console.log(errore);
            })
            .finally(()=>{
                setTimeout(()=>{
                    this.isLoading = false;
                },1000);
            });
        },

            scrollToBottom(isVisible){
                if(!isVisible){return}
                if(this.page >= this.lastPage){return}
                this.page++;

                this.getPosts();
            },
                    //funzione che cerca i post tra api e li inserisce nell'array posts
                    //se la ricerca è vuota o non è specificata, restituisce tutti i post
                    //se la ricerca è specificata, restituisce i post che contengono la stringa di ricerca

            getPostsSearch(search){
                axios.get(`http://localhost:8000/api/posts/search/${search}`)
                .then((risultato)=>{
                    this.posts =  risultato.data;
                    console.log(this.posts);

                })
            },


    },
    created(){
        this.getPosts();
    },


}
</script>

<style lang="scss" scoped>
.loading{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 1;
}
</style>
