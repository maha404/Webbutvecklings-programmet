<template>
    <div class="absolute top-8 left-52 ml-96">
        <ul class="border-red-600 border-4 bg-red-300 text-red-700 font-bold">
            <li v-for="error in errors" :key="error">
                {{ error }}
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    name: 'ErrorMessages', 
    props: ['errors']
}

</script>