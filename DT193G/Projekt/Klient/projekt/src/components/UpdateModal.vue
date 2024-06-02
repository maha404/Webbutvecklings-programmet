<template>
    <div class="fixed inset-0 bg-black bg-opacity-30 flex justify-center items-center">
        <div class="bg-white px-2 py-5 rounded shadow-xl mr-2">
            <div class="">
                <button class="float-right bg-gray-800 text-white rounded-lg px-4 py-1 text-xs lg:text-lg" @click="closeModal">Stäng</button>
                <h2 class="pb-4 text-sm md:text-lg">Uppdatera produkt</h2>
            </div>
            <hr>
            <form action="" >
            <fieldset>
                <label for="name" class="text-xs md:text-base">Namn:</label>
                <br>
                <input class="bg-gray-300 p-1 shadow-md text-xs lg:text-lg" v-model="form.name" type="text" id="name">
            </fieldset>
            <br>
            <select class="mr-7 p-1 text-xs lg:text-lg" v-model="form.product_type" name="product_type" id="">
                <option value="Djurfoder">Djurfoder</option>
                <option value="Djurtillbehör">Djurtillbehör</option>
                <option value="Djurleksaker">Djurleksaker</option>
                <option value="Djurvård">Djurvård</option>
            </select>
            
            <select class="p-1 text-xs lg:text-lg" v-model="form.category_id" id="categories">
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.category_name }}</option>
            </select>
            <br>
            <br>
                <label class="text-xs lg:text-lg" for="description">Beskrivning:</label>
                <br>
                <textarea class="bg-gray-300 resize-none text-xs lg:text-lg" v-model="form.product_description" name="description" id="" cols="22" rows="5"></textarea>
            <br>
            <br>
                <fieldset>
                    <input class="w-1/4 p-1 bg-gray-300 text-xs lg:text-lg" v-model="form.quantity" type="number">
                </fieldset>
            <br>
                <button class="bg-gray-800 text-white rounded-lg px-4 py-1 text-xs lg:text-lg" @click.prevent="updateProduct">Uppdatera</button>
            </form>
            
        </div> 
   </div>
</template>

<script>
import axios from 'axios';
    export default {
        props: ['productId'],
        data() {
            return {
                categories: [],
                form: {
                    name: null, 
                    category_id: null, 
                    product_type: null, 
                    product_description: null, 
                    quantity: null
                }
            }
        },
        mounted () {
            const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
             axios.get('http://localhost:8000/api/category', config)
            .then(response => {
                this.categories = response.data
            });
        },
        methods: {
            closeModal() {
                this.$emit('closeModal');
            }, 
            updateProduct() {
                const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
                let id = this.productId.id;
                axios.put(`http://localhost:8000/api/product/${id}`, this.form, config)
                .then (response => {
                    this.$emit('getProducts')
                    this.$emit('closeModal')
                }) 
                .catch((error => {
                    console.log(error);
                }))
            }, 
            fillList(product) {
                this.form.name = product.name
                this.form.category_id = product.category_id
                this.form.product_type = product.product_type
                this.form.product_description = product.product_description
                this.form.quantity = product.quantity
            }
        }
    }
</script>