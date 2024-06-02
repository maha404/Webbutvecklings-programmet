<template>
    <div class="w-full 
    sm:ml-20 
    md:ml-72 
    lg:ml-72 
    xl:ml-72 
    2xl:ml-72">
    <p class="text-green-600 ml-12 mt-4">{{ message }}</p> <!-- Message that the product was added! -->
    <div class="mt-12 ml-12 bg-white p-2 md:p-4 w-min shadow-md">
    <h2>Lägg till en produkt</h2>
    <hr class="mt-5">
    <form class="
            mt-5
            w-full
            lg:w-96
            ">
        <!-- Productname -->
        <fieldset>
            <label for="name" class="text-xs md:text-lg">Namn:</label>
            <br>
            <input v-model="form.name" type="text" id="name" class="bg-gray-300 p-1 text-xs">
                <p class="text-red-600 font-semibold text-xs" v-if="errormessage.name">{{ nameError }}</p>
        </fieldset>
        
        <br>
        <!-- Product type -->
        <select v-model="form.product_type" name="product_type" id="" class="p-0.5 bg-gray-300 text-xs md:text-sm">
            <option value="Djurfoder">Djurfoder</option>
            <option value="Djurtillbehör">Djurtillbehör</option>
            <option value="Djurleksaker">Djurleksaker</option>
            <option value="Djurvård">Djurvård</option>
        </select>
            
        <!-- Category -->
        <select v-model="form.category_id" id="categories" class="p-0.5 ml-5 bg-gray-300 text-xs md:text-sm">
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.category_name }}</option>
        </select>
            <p class="text-red-600 font-semibold text-xs" v-if="errormessage.product_type">Vänligen välj en produkttyp!</p>
            <p class="text-red-600 font-semibold text-xs" v-if="errormessage.category">Kategori behöver fyllas i!</p>
        <br>
        <br>
        <!-- Description -->
        <label for="description" class="text-xs md:text-lg">Beskrivning:</label>
        <br>
        <textarea v-model="form.product_description" class="bg-gray-300 resize-none h-32 text-xs" name="description" id="description" cols="30"></textarea>
            <p class="text-red-600 font-semibold text-xs" v-if="errormessage.product_description">{{ descError }}</p>
        <br>
        <br>
        <!-- Quantity -->
        <fieldset>
            <label for="number" class="text-xs md:text-lg">Antal:</label>
            <br>
            <input v-model="form.quantity" type="number" class="
            bg-gray-300
            p-2
            text-xs
            sm:p-1
            md:p-1
            lg:p-1
            lg:w-14
            xl:p-1
            2xl:p-1
            ">
            <p class="text-red-600 font-semibold text-xs" v-if="errormessage.quantity">{{ quantityError }}</p>
        </fieldset>
        <br>
        <br>
        <button class="
        text-xs 
        md:text-lg
        bg-gray-800 
        text-white px-3 
        py-1" @click.prevent="saveProduct()">Skicka</button>
    </form>
    </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'ProductForm', 
        data () {
            return {
                categories: [],
                form: {
                    name: null, 
                    category_id: null, 
                    product_type: null, 
                    product_description: null, 
                    quantity: null
                }, 
                message: '',
                nameError: '', 
                descError: '',
                quantityError: '',
                errormessage: {
                    name: false, 
                    category: false, 
                    product_type: false,
                    product_description: false, 
                    quantity: false
                }
            }
        },
        mounted () {
            const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
                const body = {}
        axios.get('http://localhost:8000/api/category', config)
            .then(response => {
                this.categories = response.data
            });
        },

        methods: {
            saveProduct() {
                const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}, 
                }
                axios.post('http://localhost:8000/api/product', this.form, config)
                .then(response => {
                    this.message = 'Produkten lades till!';
                })
                .catch((error) => {
                    if(error.response.status == 422) {
                        if(this.form.name == null) {
                            this.errormessage.name = true;
                            this.nameError = 'Vänligen fyll i ett produktnamn!'
                        } else if(this.form.name.length < 5) {
                            this.nameError = 'Namnet behöver vara minst 5 tecken!'
                            this.errormessage.name = true;
                        } else {
                            this.errormessage.name = false;
                        }
                        
                        if(this.form.product_type == null) {
                            this.errormessage.product_type = true;
                        } else {
                            this.errormessage.product_type = false;
                        }

                        if(this.form.category_id == null) {
                            this.errormessage.category = true;
                        } else {
                            this.errormessage.category = false;
                        }

                        if(this.form.product_description == null) {
                            this.errormessage.product_description = true
                            this.descError = 'Vänligen fyll i en beskrivning!'
                        } else if (this.form.product_description.length < 10) {
                            this.errormessage.product_description = true
                            this.descError = 'Beskrivningen behöver vara minst 10 tecken!'
                        } else {
                            this.errormessage.product_description = false
                        }

                        if(this.form.quantity == null) {
                            this.errormessage.quantity = true
                            this.quantityError = 'Antal måste anges!'
                        } else if (this.form.quantity < 1 || this.form.quantity > 100) {
                            this.errormessage.quantity = true
                            this.quantityError = 'Antal måste vara mellan 1-100!'
                        } else {
                            this.errormessage.quantity = false
                        }
                    }
                })
            }
        }
    }
</script>