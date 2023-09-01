<template>
    <div>
        <Head>
            <title>learning inertia</title>
        </Head>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li :class="['nav-item',{'active': $page.url  === '/' }]">
                        <Link  class="nav-link" :href="route('home')">Home</Link>
                    </li>
                    <li v-if="auth.user" class="nav-item">
                        <Link  class="nav-link" :href="route('dashboard')">Dashboard</Link>
                    </li>
                    <template v-else>
                        <li :class="['nav-item',{'active': $page.url  === '/login' }]">
                            <Link  class="nav-link" :href="route('login')">Login</Link>
                        </li>
                        <li :class="['nav-item',{'active': $page.url  === '/register' }]">
                            <Link  class="nav-link" :href="route('register')">Register</Link>
                        </li>
                    </template>
                </ul>
            </div>
        </nav>
        <slot></slot>
    </div>
</template>

<script>
import { Head, Link, usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
export default {
    name: "Guest",
    components:{Link,Head},
    setup(){
        const auth = computed(()=>{
            return usePage().props.value.auth
        });
        return {auth}
    }

}
</script>

<style scoped>

</style>
