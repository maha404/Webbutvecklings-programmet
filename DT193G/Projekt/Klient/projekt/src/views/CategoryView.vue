<template>
    <SideMeny />
    <div class="flex flex-col">
    <CategoryForm v-on:getCategories="getCategories"/>
    <CategoryTable v-on:showModal="showModal" v-on:getCategories="getCategories" v-bind:categories="categories"/>
    </div>
    <Modal v-show="isModalVisible">
        <h1 class="text-sm
        md:text-lg">Vill du verkligen ta bort denna kategori?</h1>
        <hr class="mb-5">
        <button @click="deleteCategory" class="bg-red-700 text-white px-1 mr-4">Radera</button>
        <button @click="closeModal()" class="border border-black px-1">Stäng</button>
    </Modal>
</template>

<script>
import CategoryForm from '../components/CategoryForm.vue';
import CategoryTable from '../components/CategoryTable.vue';
import SideMeny from '../components/SideMeny.vue';
import Modal from '../components/Modal.vue';
import axios from 'axios';

export default {
    components: {
        CategoryForm, 
        SideMeny, 
        CategoryTable, 
        Modal
    }, 
    data() {
        return {
            categories: [],
            isModalVisible: false, 
            id: null, 
        };
    },
    mounted() {
        const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
        axios.get('http://localhost:8000/api/category', config)
        .then(response => {
            this.categories = response.data
        })
    },
    methods: {
        getCategories() {
            const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
            axios.get('http://localhost:8000/api/category', config)
            .then(response => {
                this.categories = response.data
            })
        }, 
        showModal(id) {
            this.isModalVisible = true;
            this.id = id;
        },
        closeModal() {
            this.isModalVisible = false;
        },
        deleteCategory() {
            this.isModalVisible = false;
            let id = this.id;
            const token = localStorage.getItem('token');
            const config = {
                headers: {'Authorization': `Bearer ${token}`}
            }
            axios.delete(`http://localhost:8000/api/category/${id}`, config)
            .then(response => {
                this.getCategories();
            })
        }
    }
}
</script>