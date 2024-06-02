<template>
    <SideMeny />
    <ErrorMessages v-bind:errors="errors" v-show="isVisible" />
    <RegisterForm v-bind:form="form" v-on:register="register"/>
</template>

<script>
import axios from 'axios'
import ErrorMessages from '../components/ErrorMessages.vue';
import SideMeny from '../components/SideMeny.vue';
import RegisterForm from '../components/RegisterForm.vue';

export default {
    components: {
        ErrorMessages, 
        SideMeny, 
        RegisterForm,
    }, 
    data () {
        return {
            form: {
                username: '', 
                email: '', 
                password: '', 
                password_confirmation: ''
            }, 
            errormsg: {},
            errors: [], 
            isVisible: false,
        }
    }, 
    methods: {
        register(form) {
            console.log(form)
            const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
            axios.post('http://localhost:8000/api/register', form, config)
            .then(response => {
                console.log(response)
                this.errors = []
            })
            .catch((error) => {
                this.isVisible = true;
                if(error.response.status === 401) {
                    this.errors = []
                    const email = error.response.data.error.email;
                    const user = error.response.data.error.username;
                    const specialChars = /[`!@#$%^&*()_\-+=\[\]{};':"\\|,.<>\/?~ ]/;
                   
                    if(form.username == '') {
                        const item = 'Vänligen fyll i ett användarnamn!'
                        this.errors.push(item)
                        console.log(this.errors)
                   } else if (form.username.length < 5) {
                        const item = 'Användarnamnet måste vara minst 5 tecken!'
                        this.errors.push(item)
                   } else if (user != undefined) {
                        if(!user.includes('username')) {
                            const item = 'Användarnamnet finns redan!'
                            this.errors.push(item)
                        } 
                    }

                   if(form.email == '') {
                        const item = 'Vänligen fyll i en mejladress!'
                        this.errors.push(item)
                    } else if(email != undefined) {
                        if(!email.includes('email')) {
                            const item = 'Mejladressen finns redan!'
                            this.errors.push(item)
                        } 
                   }

                   if(form.password == '') {
                        const item = 'Vänligen fyll i ett lösenord!'
                        this.errors.push(item)
                   } else if (form.password.length < 8) {
                        const item = 'Lösenordet måste vara minst 8 tecken!'
                        this.errors.push(item)
                   }

                    if (!/[A-Z]/.test(form.password)) {
                        const item = 'Lösenordet måste ha minst en stor bokstav!'
                        this.errors.push(item)
                    }

                    if (!specialChars.test(form.password)) {
                        const item = 'Lösenordet måste innehålla minst ett specialltecken!'
                        this.errors.push(item)
                    }

                   if(form.password_confirmation != form.password){
                        const item = 'Lösenorden stämmer inte överäns!'
                        this.errors.push(item)
                    }
                }
            });
        }
    }
}
</script>