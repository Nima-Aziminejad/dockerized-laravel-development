<template>
    <guest>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Two challenge</p>
                            <form @submit.prevent="submitForm">
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputEmail" v-model="form.code">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 btn-block">enter code</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </guest>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import guest from "@/Layout/Guest";
export default {
    name: "VerifyEmail",
    components: { guest},
    setup(){
        const form = useForm({
            code:''
        });
        function submitForm(){
            form.post('/two-factor-challenge')
        }
        return {form,submitForm}
    }

}
</script>

<style scoped>

</style>
