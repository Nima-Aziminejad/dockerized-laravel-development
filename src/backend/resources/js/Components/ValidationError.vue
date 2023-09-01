<template>
    <div v-if="hasError" >
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <li v-for="(error, index) in errors" :key="index">
                            {{error}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed} from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

export default {
    name: "ValidationError",
    setup(){
        const errors = computed(()=>{
            return usePage().props.value.errors;
        });
        const hasError = computed(()=>{
            return Object.keys(usePage().props.value.errors).length
        })
        return {errors, hasError}
    }
}
</script>

<style scoped>

</style>
