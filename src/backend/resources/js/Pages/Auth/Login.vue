<template>
    <guest>
        <div class="container">
            <validation-error></validation-error>
            <div class="row justify-content-center mt-4">
                <div class="col-11 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">login form</h5>
                            <form @submit.prevent="submitForm">
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="inputEmail" v-model="form.email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword" v-model="form.password">
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="form.remember">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <button class="btn btn-primary mb-2 btn-block">log in</button>
                            </form>
                            <Link :href="route('password.request')" class="btn btn-info mb-2 btn-block">
                                Forgot your password?
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </guest>
</template>

<script>
import Guest from "@/Layout/Guest";
import ValidationError from "@/Components/ValidationError";
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    name: "Login",
    components: {Guest, ValidationError, Link},
    setup(){
        const form = useForm({
            email:'',
            password:'',
            remember: false
        });
        function submitForm(){
            form.post(route('login'),{
                onFinish: () => form.reset('password'),
            })
        }
        return {form, submitForm}
    }
}
</script>

<style scoped>

</style>
