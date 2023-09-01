<template>
    <guest>
        <div class="container">
            <validation-error></validation-error>
            <div class="row justify-content-center mt-4">
                <div class="col-11 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Forgot password</h5>
                            <p class="mb-3">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                            <p v-if="status" class="mb-3 text-info">
                                {{ status }}
                            </p>
                            <form @submit.prevent="submitForm">
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="inputEmail" v-model="form.email">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 btn-block">
                                    Email Password Reset Link
                                </button>
                            </form>
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
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    name: "ForgotPassword",
    components: {Guest, ValidationError},
    props: ['status'],
    setup(){
        const form = useForm({
            email: ''
        })
        function submitForm(){
            form.post(route('password.email'))
        }
        return {form, submitForm}
    }
}
</script>

<style scoped>

</style>
