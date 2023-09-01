<template>
    <guest>
        <div class="container">
            <validation-error></validation-error>
            <div class="row justify-content-center">
                <div class="col-11 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Reset password</h5>
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
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password_confirmation" v-model="form.password_confirmation">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 btn-block">log in</button>
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
import {Link, useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "ResetPassword",
    components: {Guest, ValidationError},
    props: {
        email: String,
        token: String,
    },
    setup(props) {
        const form = useForm({
            token: props.token,
            email: props.email,
            password: '',
            password_confirmation: '',
        })
        function submitForm(){
            form.post(route('password.update'), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            })
        }
        return {form, submitForm}
    }
}
</script>

<style scoped>

</style>
