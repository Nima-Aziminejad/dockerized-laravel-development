<template>
    <authenticated>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Two Factor Authentication</h5>
                            <template v-if="twoEnabled">
                                <p class="text-info">
                                    Two factor authentication has been enabled.
                                </p>
                                <Link class="btn btn-outline-primary" :href="route('two-factor.disable')" method="delete" as="a">Deactivate</Link>
                                <hr>
                                <div v-html="svgQr"></div>
                                <hr>
                                {{recoveryQr}}
                            </template>
                            <template v-else>
                                <p class="text-info">
                                    Two factor authentication has been disable.
                                </p>
                                <Link class="btn btn-outline-primary" :href="route('two-factor.enable')" method="post" as="a">Activate</Link>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </authenticated>
</template>

<script>
import Authenticated from "@/Layout/Authenticated";
import { computed, ref} from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import axios from 'axios';

export default {
    name: "Dashboard",
    components: {Authenticated, Link},
    props:['status'],
    data(props){
        const svgQr = ref();
        const recoveryQr = ref();
        const twoEnabled = computed(()=>{
            if(props.status === 'two-factor-authentication-enabled'){
                getQrCode();
                getRecoveryCode();
                return true;
            }
        })
        function getQrCode(){
            axios.get('/user/two-factor-qr-code')
                .then((res)=>{svgQr.value = res.data.svg})
                .catch((er)=>{console.log(er)});
        }
        function getRecoveryCode(){
            axios.get('/user/two-factor-recovery-codes')
                .then((res)=>{recoveryQr.value = res.data})
                .catch((er)=>{console.log(er)});
        }
        return {twoEnabled, svgQr, recoveryQr}
    }
}
</script>

<style scoped>

</style>
