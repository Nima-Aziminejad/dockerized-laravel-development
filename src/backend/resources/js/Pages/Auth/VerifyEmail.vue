<template>
    <guest>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                            <template v-if="verificationLinkSent">
                                <hr>
                                <p class="text-primary">A new verification link has been sent to the email address you provided during registration.</p>
                            </template>
                            <form class="form-inline" @submit.prevent="submitForm()">
                                <button type="submit" class="btn btn-primary mb-2">Resend Verification Email</button>
                            </form>
                            <Link class="btn btn-primary" :href="route('logout')" method="post" as="button">log out</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </guest>
</template>

<script>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import guest from "@/Layout/Guest";
import { computed } from "vue";
export default {
    name: "VerifyEmail",
    components: { Link, guest},
    props: {
        status: String,
    },
    setup(props){
        const form = useForm();
        const verificationLinkSent = computed(()=>{
            return props.status === 'verification-link-sent'
        });

        function submitForm(){
            form.post(route('verification.send'))
        };

        return {verificationLinkSent, submitForm}
    }
}
</script>

<style scoped>

</style>

