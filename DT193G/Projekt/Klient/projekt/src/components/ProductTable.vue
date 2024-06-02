<template>
    <div class="
    md:hidden 
    lg:block
    lg:float-left
    lg:mt-14
    lg:ml-52
    ">
    <!-- Tablet / Desktop table -->
    <table class="border-collapse hidden bg-white table-auto
    
    md:block 
    md:drop-shadow-md  
    md:rounded">
        <thead class="uppercase bg-gray-800 text-gray-100">
            <tr>
                <th class="md:px-3 md:py-1">Produktnamn</th>
                <th class="px-3 py-3">Produkttyp</th>
                <th class="px-3 py-3">Kategori</th>
                <th class="px-3 py-3">Beskrivning</th>
                <th class="px-3 py-3">Antal</th>
                <th class="px-3 py-3">Hantera</th>
            </tr>
        </thead>
        <tbody v-for="product in products" :key="product.id" class="border-gray-900 border-t hover:bg-gray-100">
            <tr class="">
                <td class="px-3 py-3">{{ product.name }}</td>
                <td class="px-3 py-3">{{ product.product_type }}</td>
                <td class="px-3 py-3">{{ product.category_name }}</td>
                <td class="px-3 py-3">{{ product.product_description }}</td>
                <td class="px-3 py-3">{{ product.quantity }}</td>
                <td class="flex justify-center">
                    <span @click="deleteProduct(product.id)"><img src="../assets/icons/trash-can-solid.svg" alt="" class="w-8 mr-5 pt-1.5 hover:cursor-pointer"></span>
                    <span @click="updateProduct(product.id)"><img src="../assets/icons/pen-solid.svg" alt="" class="w-8 pt-1.5 hover:cursor-pointer"></span>
                </td>
            </tr>
        </tbody>
    </table>
    </div>

    
    <!-- Mobile table -->
    <table class="ml-16 table-auto w-fit text-xs  bg-white md:ml-52 lg:hidden">
        <tbody v-for="product in products" :key="product.id">
        <tr class="border-gray-900 border-t">
            <th class="uppercase bg-gray-500 px-3 py-3 text-xs">Produktnamn</th>
            <td class="text-center ">{{ product.name }}</td>
        </tr>
        <tr class="border-gray-900 border-t">
            <th class="uppercase bg-gray-500 ">Produkttyp</th>
            <td class="text-center ">{{ product.product_type }}</td>
        </tr>
        <tr class="border-gray-900 border-t">
            <th class="uppercase bg-gray-500 ">Kategori</th>
            <td class="text-center">{{ product.category_name }}</td>
        </tr>
        <tr class="border-gray-900 border-t">
            <th class="uppercase bg-gray-500 ">Produkt-<br>beskrivning</th>
            <td class="text-center">{{ product.product_description }}</td>
        </tr>
        <tr class="border-gray-900 border-t">
            <th class="uppercase bg-gray-500 ">Antal</th>
            <td class="text-center">{{ product.quantity }}</td>
        </tr>
        <tr class="border-gray-900 border-t border-b">
            <th class="uppercase bg-gray-500 ">Hantera</th>
            <td class="flex justify-center space-x-0">
                <span @click="deleteProduct(product.id)"><img src="../assets/icons/trash-can-solid.svg" alt="" class="w-5 mr-3"></span>
                <span @click="updateProduct(product.id)"><img src="../assets/icons/pen-solid.svg" alt="" class="w-5"></span>
            </td>
        </tr>
        <br>
        </tbody>
        
    </table>
</template>

<script>
import axios from 'axios'
    export default {
        name: 'ProductTable',
        props: ['products'],
        data () {
            return {
                product: [], 
                product_id: []
            }
        }, 
        methods: {
            deleteProduct (id) {
                this.$emit('showDeleteModal', id)
            }, 
            updateProduct(id) {
                const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}, 
                }
                axios.get(`http://localhost:8000/api/product/${id}`, config)
                .then (response => {
                    let product = response.data
                    this.$emit('showModal', product)  
                })
                 
            }
        }
    }
</script>