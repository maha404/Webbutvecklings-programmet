<template>
    <SideMeny />
    <ProductTable v-on:showDeleteModal="showDeleteModal" v-on:getProducts="getProducts" v-bind:products="products" v-on:showModal="showModal"/>
    <UpdateModal ref="fillList" v-bind:productId="productId" v-show="isModalVisible" v-on:closeModal="closeModal()" v-on:updateProduct="closeModal()" v-on:getProducts="getProducts"/>
    <Modal v-show="ModalVisible">
        <h1>Vill du verkligen ta bort denna produkt?</h1>
        <button @click="deleteProduct" class="bg-red-700 text-white px-1 mr-4">Radera</button>
        <button @click="closeModal()" class="border border-black px-1">Stäng</button>
    </Modal>
</template>

<script>
import ProductTable from '../components/ProductTable.vue';
import UpdateModal from '../components/updateModal.vue';
import SideMeny from "../components/SideMeny.vue";
import Modal from '../components/Modal.vue';

import axios from 'axios';
export default {
    components: {
        ProductTable, 
        UpdateModal,
        SideMeny,
        Modal
    }, 
    data () {
        return {
            isModalVisible: false,
            ModalVisible: false,
            productId: [],
            products: [],
            deleteId: []
        };
    }, 
    mounted () {
        const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
        axios.get('http://localhost:8000/api/product', config)
            .then(response => {
                this.products = response.data
            })
    },
    methods: {
        showDeleteModal(id) {
            this.deleteId = id;
            this.ModalVisible = true;
        },
        showModal(product) {
            this.isModalVisible = true;
            this.productId = product;
            this.$refs.fillList.fillList(product);
        }, 
        closeModal() {
            this.isModalVisible = false;
            this.ModalVisible = false;
        },
        getProducts() {
            const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
            axios.get('http://localhost:8000/api/product', config)
            .then(response => {
                this.products = response.data
            })
        }, 
        deleteProduct() {
            let id = this.deleteId;
            this.ModalVisible = false;
            const token = localStorage.getItem('token');
            const config = {
                headers: {'Authorization': `Bearer ${token}`}
            }
            axios.delete(`http://localhost:8000/api/product/${id}`, config)
            .then(response => {
                this.getProducts();
            })
        }
    }
}
</script>