<template>
    <aside class="absolute z-10 float-left bg-gray-800 text-white h-screen">
       
        <div @click="showMenu = !showMenu" class="block md:hidden">
            <span><img src="../assets/icons/bars-solid.svg" alt="" class="w-5 m-3"></span>
        </div>

        <!-- Mobile meny -->
        <nav class="" :class="showMenu ? 'block' : 'hidden'">
            <ul class="fa-ul" >
                <RouterLink to="/products">
                    <li class="
                    border-b-2
                  border-gray-600
                    md:cursor-pointer  
                  md:hover:bg-slate-700 p-3">Alla produkter</li>
                </RouterLink>
                <RouterLink to="/app">
                    <li class="
                    border-b-2
                  border-gray-600
                    md:cursor-pointer 
                    md:hover:bg-slate-700 p-3">Lägg till produkt</li>
                </RouterLink>
                <RouterLink to="/category">
                    <li class="
                    border-b-2
                    border-gray-600
                    md:cursor-pointer 
                    md:hover:bg-slate-700 
                    p-3 ">Hantera kategorier</li>
                </RouterLink>
            </ul>
            <ul class="" :class="showMenu ? 'block' : 'hidden'">
                <RouterLink to="/registrera"><li class="
                    border-b-2
                  border-gray-600
                    md:cursor-pointer 
                    md:hover:bg-slate-700 
                    p-3">Registrera ny användare</li></RouterLink>
            </ul>
            <button @click="logout()" class="cursor-pointer hover:bg-slate-700 p-3">Logga ut</button>
        </nav>

        <!-- Desktop meny -->
        <nav class="hidden 2xl:block xl:block md:block" >
            <span class="flex justify-center m-3">
                <img src="../assets/icons/Logga.png" alt="">
            </span>
            <ul class="fa-ul" >
                <RouterLink to="/products">
                    <li class="
                    border-b-2
                  border-gray-600
                    md:cursor-pointer  
                  md:hover:bg-slate-700 p-3">Alla produkter</li>
                </RouterLink>
                <RouterLink to="/app">
                    <li class="
                    border-b-2
                  border-gray-600
                    md:cursor-pointer 
                    md:hover:bg-slate-700 p-3">Lägg till produkt</li>
                </RouterLink>
                <RouterLink to="/category">
                    <li class="
                    border-b-2
                    border-gray-600
                    md:cursor-pointer 
                    md:hover:bg-slate-700 
                    p-3 ">Hantera kategorier</li>
                </RouterLink>
            </ul>
            <ul class="" >
                <RouterLink to="/registrera"><li class="
                    border-b-2
                  border-gray-600
                    md:cursor-pointer 
                    md:hover:bg-slate-700 
                    p-3">Registrera ny användare</li></RouterLink>
            </ul>
            <button @click="logout()" class="cursor-pointer hover:bg-slate-700 p-3">Logga ut</button>
        </nav>
    </aside>
</template>

<script>
import { RouterLink } from 'vue-router';
import axios from 'axios';

export default {
        name: "SideMeny",
        data() {
            return {
                showMenu: false,
            }
        },
        methods: {
            logout() {
                const token = localStorage.getItem('token');
                const config = {
                    headers: {'Authorization': `Bearer ${token}`}
                }
                const body = {}
                console.log(config);
                axios.post('http://localhost:8000/api/logout', body, config)
                .then(response => {
                    console.log('utloggad');
                    localStorage.removeItem('token');
                    this.$router.push({name: 'login'});
                })
                .catch((error) => {
                    console.log(error);
                })
                
            }
        }
    }

</script>