<template>
    <div class="mt-10 
    w-full
    ml-20
    sm:ml-72 
    md:ml-72 
    lg:ml-72 
    xl:ml-72 
    2xl:ml-72">
        <table class="md: bg-white drop-shadow-md table-auto rounded">
            <thead class="uppercase bg-gray-800 text-gray-100">
                <th class="px-3 py-3 text-xs">Kategori <br> namn</th>
                <th class="px-3 py-3 text-xs">Hantera</th>
            </thead>
            <tbody v-for="category in categories" :key="category.id">
                <td class="px-3 py-3 text-xs lg:text-lg">{{ category.category_name }}</td>
                <td class="flex justify-center">
                    <span @click="deleteCategory(category.id)"><img src="../assets/icons/trash-can-solid.svg" alt="" class="w-5 pt-1.5 hover:cursor-pointer"></span>
                </td>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'CategoryTable',
        props: ['categories'],
        emits: ['getCategories', 'deleteCategory', 'showModal'],
        methods: {
            deleteCategory(id) {
                console.log('klick på soptuna')
                this.$emit('showModal', id)
            }
        }
    }
</script>