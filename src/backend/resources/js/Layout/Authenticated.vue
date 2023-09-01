<template>
    <div>
        <Head>
            <title>admin</title>
        </Head>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <span class="navbar-brand">{{auth.user.name}}</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li :class="['nav-item',{'active': $page.url  === '/' }]">
                        <Link  class="nav-link" :href="route('home')">Home</Link>
                    </li>
                    <li :class="['nav-item',{'active': $page.url  === '/profile' }]">
                        <Link  class="nav-link" :href="route('profile')">Profile</Link>
                    </li>
                    <li :class="['nav-item',{'active': $page.url  === '/product' }]">
                        <Link  class="nav-link" :href="route('product')">Product</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('logout')" method="post" as="a">log out</Link>
                    </li>
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
    name: "Authenticated",
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
