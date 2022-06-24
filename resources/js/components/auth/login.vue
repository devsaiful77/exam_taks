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
                                        <h4 class="text-center mb-4">Sign in your account</h4>
                                        <form @submit.prevent="login">
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input type="email" class="form-control" placeholder="Enter Your Email" v-model="form.email">
                                                <small class="text-danger" v-if="errors.email">{{
                                                    errors.email[0]
                                                }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" class="form-control" value="Password" v-model="form.password" placeholder="********">
                                                <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1">
                                                        <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                        <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="page-forgot-password.html">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                            </div>
                                        </form>
                                        <div class="new-account mt-3">
                                            <p>Don't have an account?
                                                <router-link to="/register">Sign Up</router-link>

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
                email: null,
                password: null
            },
            errors:{

            }
        }
    },

    methods:{
        login(){
            // axios calling
            axios.post('/api/auth/login',this.form)
            .then(res => {
                User.responseAfterLogin(res)
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
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
