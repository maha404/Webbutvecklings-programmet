<template>

    <div class="flex justify-center">
        <!-- Formulär för att kunna fylla i allt som behövs för att kunna lägga till ett spel i databasen-->
        <form action="" class="flex justify-center flex-col border-black w-full border rounded-lg p-3 lg:w-1/2 ">
            <p class="font-bold">{{ message.msg }}</p>
            <fieldset class="m-1">
                <label for="GameName">Namnet på spelet:</label> <br>
                <input v-model="form.name" type="text" name="GameName" id="GameName" class="border-black border w-full lg:w-1/2">
                <p v-if="!nameIsValid" class="text-red-600 font-bold">Vänligen fyll i namnfältet!</p>
            </fieldset>
            <br>
            <fieldset class="m-1">
                <label for="GameLenght">Längden på spelet:</label> <br>
                <input v-model="form.lenght" type="number" name="GameLenght" id="GameLenght" class="border-black border w-full lg:w-1/2">
                <p v-if="!numberIsValid" class="text-red-600 font-bold">Vänligen fyll i ett nummer!</p>
            </fieldset>
            <br>
            <fieldset class="m-1">
                <label for="played" >Status:</label> <br>
                <input v-model="form.played" type="text" name="played" id="played" class="border-black border w-full lg:w-1/2">
                <p v-if="!statusIsValid" class="text-red-600 font-bold">Vänligen fyll i status!</p>
            </fieldset>
            <br>
            <button @click.prevent="postGame()" class="m-3 w-32 bg-blue-900 text-white px-1 py-0.5 hover:bg-blue-600">Lägg till</button>
        </form>
    </div>
    
</template>

<script>
import axios from 'axios' // Import av Axios
    export default {
        name: 'ApiForm',
        data () {
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
    computed: {
        nameIsValid () {
            return !!this.form.name
        }, 
        numberIsValid () {
            return !!this.form.lenght
        }, 
        statusIsValid () {
            return !!this.form.played
        }
    }, 
    methods: {
       postGame() {
            axios.post('http://localhost:8000/api/games', this.form ) // Tar datan från 'from' objektet
            
            .then(response => {
                this.games = response // Sparar informationen i games arrayen
                this.$emit('getGames'); // Emit som triggar att listan hämtas på nytt
                // Bekräftelsemeddelande skrivs ut när alla fält är ifylld
                if(response.status === 201) {
                    this.message.msg = "Spelet lades till!"
                    this.errormessage = ""
                    this.deletemsg.msg = ""
                } 
          
            })
            .catch((error) => {
                if(error.response.status === 422) {
                    this.message.msg = "Vänligen fyll i alla fält!"
                    this.deletemsg.msg = ""
                } else {
                    this.message.msg = ""
                } 
            })

        }
    }
    

}
    
</script>