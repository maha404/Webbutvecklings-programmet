

<template>
    <h1 class="text-center text-5xl mt-2">API</h1>
    <br>
    <ApiForm v-on:getGames="getGames()"/>
    <br>
    <p class="text-center text-red-600 font-bold">{{ deletemsg.msg }}</p>
    <br>
    <ApiTable v-bind:games="games" v-on:getGames="getGames()" v-on:updateGame="updateGame()"/>
</template>

<script>
import axios from 'axios' // Import av Axios
import ApiForm from '../components/ApiForm.vue'
import ApiTable from '../components/ApiTable.vue'
export default {
    components: {
        ApiForm, 
        ApiTable
    }, 

    data() {
        return {
            games: [], // Här sparas alla spel från databasen
            form: { // Här sparas all data från forum inputs 
                name:null, 
                lenght:null, 
                played:null
            },
            errormessage: {
                namefield:null, 
                lenghtfield:null, 
                playedfield:null
            }, 
            message: {
                msg: ''
            },
            deletemsg: {
                msg: ''
            }
        }
    },

    mounted() {
        // Hämtar in alla spel
        axios.get('http://localhost:8000/api/games')
        .then(response => this.games = response.data)
    },
    methods: { 
        // Hämtar in listan på nytt
        getGames() {
            axios.get('http://localhost:8000/api/games')
            .then(response => this.games = response.data)
        }
    }
}
    
</script>