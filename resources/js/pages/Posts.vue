<template>
<div class="container pt-5">
    <div class="row">
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
            lastPage:1
        }
    },

    methods:{
        getPosts(){
            axios.get(`http://localhost:8000/api/posts?page=${this.page}`)
            .then((risultato)=>{
                this.posts.push(...risultato.data.data);
                this.lastPage = risultato.data.last_page;ll
                console.log(this.posts);
                const{current_page, last_page} = risultato.data;
                this.pagination = {paginaCorrente:current_page, ultimaPagina:last_page};
            })
        },
            scrollToBottom(isVisible){
                if(!isVisible){return}
                if(this.page >= this.lastPage){return}
                this.page++;

                this.getPosts();
            }
    },
    created(){
        this.getPosts();
    },


}
</script>
