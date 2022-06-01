<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                    <li class="nav-item" v-for="(element,index) in navigation" :key="index">
                        <router-link :to="{ name: element.route, params: { userId: 123 }}">{{element.name}}</router-link>

                    </li>
                    <li>
                        <a href="/admin/posts"> ABOUT</a>
                    </li>
                </ul>



            </div>
        </div>
</nav>

</div>
</template>

<script>
export default {
name:"Header",
data:function(){
    return{
        navigation:[
            {
                name:"Home",
                route:"home"
            },
            {
                name:"About",
                route:"about"
            },
            {
                name:"Contact",
                route:"contact"
            },
            {
                name:"Posts",
                route:"posts"
            },
            {
                name:"Not-found",
                route:"not-found"
            }
        ]
    }
}
}


</script>

<style lang="scss" scoped>
    ul li{
            list-style:none;
            margin-left:10px;
            font-size:20px;
            cursor:pointer;
            color:white;
            text-decoration:none;

    }
</style>
