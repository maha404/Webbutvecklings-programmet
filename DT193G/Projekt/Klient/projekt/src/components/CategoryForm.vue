<template>
    <p class="mt-5 text-xs text-red-600 font-semibold 
    ml-20
    sm:ml-72 
    md:ml-72
    md:text-lg 
    "> {{ message }}</p>
    <div class="bg-white w-fit p-9 ml-10 mt-7 
    sm:ml-72 
    md:ml-72 
    lg:ml-72 
    xl:ml-72 
    2xl:ml-72">
    <h2 class="text-sm
    md:text-xl 
    md:pb-4">Lägg till en ny kategori</h2>
    <hr>
    <form action="" class="mt-4">
        <label for="category_name" class="text-sm">Namn på kategorin:</label>
        <br>
        <input v-model="form.category_name" type="text" name="category_name" id="category_name" class="bg-gray-300 p-1 text-sm w-4/5">
        <br>
        <br>
        <button @click.prevent="addCategory" 
        class="
        bg-gray-800 
            text-white 
            text-sm
            p-1.5
            mr-6
        " 
        >Lägg till kategori</button>
    </form>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        name: 'CategoryForm',
        emits: ['getCategories'],
        data () {
            return {
               form: {
                    category_name: ''
                }, 
                message: ''
            }
        }, 
        methods: {
            addCategory() {
                console.log('click!');
                const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
                axios.post('http://localhost:8000/api/category', this.form, config)
                .then(response => {
                    this.message = 'Kategorin lades till!'
                    this.form.category_name = ''
                    this.$emit('getCategories')
                })
                .catch((error) => {
                    if(error.response.status === 422) {
                        if(this.form.category_name.length < 5) {
                            this.message = 'Kategorins namn måste vara minst 5 tecken!'
                        } 

                        if(this.form.category_name == '') {
                            this.message = 'Fältet får inte vara tomt!'
                        }
                    }
                })
            }
        }
    }
</script>