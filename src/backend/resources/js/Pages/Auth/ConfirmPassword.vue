<template>
    <authenticated>
        <div class="container">
            <validation-error></validation-error>
            <div class="row justify-content-center mt-4">
                <div class="col-11 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Confirm password</h5>
                            <p>
                                This is a secure area of the application. Please confirm your password before continuing.
                            </p>
                            <form @submit.prevent="submitForm">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword" v-model="form.password">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 btn-block">confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </authenticated>
</template>

<script>
import Authenticated from "@/Layout/Authenticated";
import ValidationError from "@/Components/ValidationError";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    name: "Dashboard",
    components: {Authenticated,ValidationError},
    setup(){
        const form = useForm({
            password: '',
        });
        function submitForm(){
            form.post(route('password.confirm'), {
                onFinish: () => form.reset(),
            })
        }

        return {form,submitForm}
    }
}
</script>

<style scoped>

</style>
