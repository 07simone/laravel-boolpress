<template>
<div class="container">
    <div class="row">
        <contact  v-for="(contact,index) in contatti" :key="index" :contact ="contact" />
    </div>
</div>
</template>

<script>
import contact from '../components/contact';
    export default {
    name:"contacts",
        components:{
            contact,
        },

data:function(){

    return {
        contatti:[
            {
                img:"https://www.w3schools.com/howto/img_avatar.png",
                nome:"Francesco",
                cognome:"Bianchi",
                email:"france.bianchi@libero.it"
            },
            {
                img:"https://thumbs.dreamstime.com/b/avatar-dell-uomo-del-geek-104871313.jpg",
                nome:"Marco",
                cognome:"Rossi",
                email:"marco.rossi@gmaiul.com"
            },
            {
                img:"https://thumbs.dreamstime.com/b/ritratto-di-un-giovane-con-stile-capelli-e-della-barba-avatar-maschio-vettore-105082137.jpg",
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

</style>
