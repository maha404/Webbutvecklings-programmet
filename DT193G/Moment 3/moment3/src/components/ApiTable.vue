<template>

<div class="flex justify-center h-fit mb-6">   
        <table class=" text-center ">
            <thead class="border-b">
                <tr class="bg-neutral-800 text-white">
                    <th class=" px-2 lg:px-6 py-4">Spelets namn</th>
                    <th class=" px-2 lg:px-6 py-4">Speltid</th>
                    <th class=" px-2 lg:px-6 py-4">Status</th>
                    <th class=" px-2 lg:px-6 py-4">Hantera</th>
                </tr>
            </thead>
            <tbody>
                <!-- Foreach loop som skriver ut alla spel -->
                <tr v-for="game in games" :key="game.id" class="border-b">
                    <td class=" px-2 lg:px-6 py-4">{{ game.name }}</td>
                    <td class=" px-2 lg:px-6 py-4">{{ game.lenght }}</td>
                    <td class=" px-2 lg:px-6 py-4">{{ game.played }}</td>
                    <td>
                        <button @click="deleteGame(game.id)" class="bg-red-600 text-white hover:bg-red-700 m-3 p-2">Ta bort</button> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</template>

<script>
import axios from 'axios' // Import av Axios
export default {
        name: 'ApiTable',
        props: ['games'], 
        data () {
            return {
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
    methods: {
        // Radera ett spel 
        deleteGame(id) {
            axios.delete(`http://localhost:8000/api/games/${id}`)
            .then(response => {
                
                if(response.status === 200) {
                    this.$emit('getGames'); // Hämtar in listan på nytt efter radering
                }

            })
        }
    }
}
</script>