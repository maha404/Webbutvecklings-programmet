<template>
<div class="bg-white md:w-fit p-9 absolute top-8 left-10 shadow-md rounded
mt-2 
sm:ml-72 
md:ml-72 
lg:ml-72 
xl:ml-72 
2xl:ml-72">
    <form action="">
        <label for="username">Användarnamn:</label>
        <br>
        <input v-model="form.username" type="text" name="username" id="username" class="bg-gray-300 w-32 
        md:p-1
        md:w-48">
        <br>
        <label for="email">Mejladress:</label>
        <br>
        <input v-model="form.email" type="email" name="email" id="email" class="bg-gray-300 w-32
        md:p-1
        md:w-48">
        <br>
        
        <label for="password">Lösenord:</label>
        <br>
        <input v-model="form.password" type="password" name="password" id="password" class="bg-gray-300 w-32
        md:p-1
        md:w-48">
        <br>

        <label for="password_confirmation">Upprepa lösenord:</label>
        <br>
        <input v-model="form.password_confirmation" type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-300 w-32 
        md:p-1
        md:w-48">
        <br>
        <button @click.prevent="register()" class="
        bg-gray-800 
        text-white 
        text-sm
        p-1
        mt-3
        md:p-2
        md:mt-8
        hover:bg-gray-700 
        ">Registrera</button>
    </form>
</div>
</template>

<script>

export default {
    name: 'RegisterForm', 
    props: ['form'],
    methods: {
        register() {
            const form = this.form
            console.log(form)
            this.$emit('register', form)
        }
    }
}
</script>