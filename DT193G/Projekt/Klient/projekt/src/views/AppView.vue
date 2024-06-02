<template>
    <div class="flex flex-row">
        <ProductForm />
        <SideMeny />
    </div>
</template>

<script>
import ProductForm from '../components/ProductForm.vue';
import SideMeny from "../components/SideMeny.vue";
export default {
    components: {
        ProductForm, 
        SideMeny
    }
}
</script>