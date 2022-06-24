<template>
    <div>
        <!-- main part -->
        <div class="authincation h-100">
            <div class="container h-100 authincation__container">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <div class="text-center mb-3">
                                            <a href="index.html"><img src="backend/images/logo-full.png" alt=""></a>
                                        </div>
                                        <h4 class="text-center mb-4">Sign up your account</h4>
                                        <!-- form -->
                                        <form @submit.prevent="singup">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="Enter Your Name" v-model="form.name">
                                            <!-- <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small> -->
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email Address</strong></label>
                                            <input type="email" class="form-control" placeholder="Enter Your Email" v-model="form.email">
                                            <!-- <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small> -->
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="********" v-model="form.password">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input type="password" class="form-control" placeholder="********" v-model="form.password_confirmation">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                        </div>
                                        </form>
                                        <!-- form -->
                                        <div class="new-account mt-3">
                                            <p>Already have an account?
                                            <router-link to="/" class="text-primary">Sign in</router-link>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main part -->
    </div>
</template>

<!-- script area -->
<script>
import axios from 'axios'
import User from '../../Helpers/User'

export default{

    created(){
        if(User.loggedIn()){
            this.$router.push({ name: 'home' })
        }
    },


    data(){
        return {
            form:{
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            errors:{}
        }
    },

    methods:{
        singup(){
            // axios calling
            axios.post('/api/auth/signup',this.form)
            .then(res => {
                User.responseAfterLogin(res)
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Signup in successfully'
                })
                // alert =========
                this.$router.push({ name: 'home' })
            })
            .catch(error => this.errors = error.response.data.errors)
            .catch(
                // alert =========
                Toast.fire({
                    icon: 'warning',
                    title: 'Invalid Email or Password'
                })
                // alert =========
            )
            // axios calling
        }
    }

}
</script>
