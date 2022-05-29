<template>
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul>
                <li v-for="(element,index) in contatti" :key="index">
                    <h1>{{element.nome}}</h1>
                    <h1>{{element.cognome}}</h1>
                    <h1>{{element.email}}</h1>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>

<script>
export default {
name:"contact",
data:function(){
    return {
        contatti:[
            {
                nome:"Francesco",
                cognome:"Bianchi",
                email:"france.bianchi@libero.it"
            },
            {
                nome:"Marco",
                cognome:"Rossi",
                email:"marco.rossi@gmaiul.com"
            },
            {
                nome:"Luca",
                cognome:"Verdi",
                email:"lucaverdi@libero.it"
            }
        ]
    }
},
}
</script>

<style lang="scss" scoped>
ul{
    list-style-type: none;
}
</style>
