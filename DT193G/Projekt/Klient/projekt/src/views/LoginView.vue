<template>
    <div class="flex justify-center">
    <p class="text-red-500 text-center absolute mt-5">{{ errormsg }}</p>
    <br>
    <div class="bg-white w-fit p-8 shadow-md mt-24">
    <h2 class="text-xl pb-4">Logga in</h2>
    <hr class="mb-4">
    <form action="" class="">
        <label for="username">Användarnamn:</label>
        <br>
        <input v-model="form.username" type="text" name="username" id="username" class="bg-gray-300 p-1">
        <br>
        <label for="email">Mejladress:</label>
        <br>
        <input v-model="form.email" type="email" name="email" id="email" class="bg-gray-300 p-1">
        <br>
        <label for="password">Lösenord:</label>
        <br>
        <input v-model="form.password" type="password" name="password" id="password" class="bg-gray-300 p-1">
        <br>
        <br>
        <button @click.prevent="login()" class="bg-gray-800 text-white p-1">Logga in</button>
    </form>
    </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            form: {
                username: null,
                email: null,
                password: null
            },
            errormsg: ''
        };
    },
    methods: {
        login() {
            axios.post('http://localhost:8000/api/login', this.form)
                .then(response => {
                console.log(response);
                localStorage.setItem('token', response.data.token); // Saves token in localstorage
                this.$router.push({ name: 'products' }); // Sends user to other route
            })
                .catch((error) => {
                console.log(error);
                console.log('Inloggning misslyckades!');
                if (error.response.status === 401) {
                    this.errormsg = 'Felaktigt användarnamn, mejladress eller lösenord!';
                }
            });
        }
    },
}
</script>