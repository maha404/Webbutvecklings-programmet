<template>
    <header class="flex flex-row bg-blue-900 text-white p-5 justify-center drop-shadow-md">
        <nav class="">
            <ul class="flex flex-row gap-14">
                <li class="hover:underline"><RouterLink to ="/">Start</RouterLink></li>
                <li class="hover:underline"><RouterLink to ="/api">API</RouterLink></li>
                <li class="hover:underline"><RouterLink to ="/info">Info</RouterLink></li>
            </ul>
        </nav>
    </header>
</template>

<script>
import { RouterLink } from 'vue-router';

    export default {
    name: "Header"
}
</script>
