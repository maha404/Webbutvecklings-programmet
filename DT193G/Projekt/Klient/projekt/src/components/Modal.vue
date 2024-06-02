<template>
    <div class="fixed inset-0 bg-black bg-opacity-30 flex justify-center items-center">
        <div class="bg-white px-20 py-5 rounded shadow-xl 
        md:w-1/4">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    name: 'Modal', 
    props: ['modalActive']
}
</script>