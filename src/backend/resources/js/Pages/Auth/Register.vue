<template>
    <guest>
        <div class="container">
            <validation-error></validation-error>
            <div class="row justify-content-center mt-4">
                <div class="col-11 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Register form</h5>
                            <form @submit.prevent="submitForm">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputName" v-model="form.name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Eaail</label>
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
                                <div class="form-group row">
                                    <label for="inputConfirm" class="col-sm-4 col-form-label">Confirm password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputConfirm" v-model="form.password_confirmation">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 btn-block">Submit</button>
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
import { useForm } from '@inertiajs/inertia-vue3'
export default {
    name: "Register",
    components: {Guest, ValidationError},
    setup(){
        const form = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        })
        function submitForm(){
            form.post(route('register'),{
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
        return {form, submitForm}
    }
}
</script>

<style scoped>

</style>
