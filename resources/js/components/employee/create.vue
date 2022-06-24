<template>
<div>
    <!-- main part -->
    <div class="page-titles">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'employee-list' }">Employee List</router-link>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create employee-list</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header custom__header">
                    <h4 class="card-title"> <i class="fa fa-gg-circle"></i> Create New Employee</h4>
                    <router-link class="btn btn-primary" v-bind:to="{ name: 'employee-list' }"> <i class="fa fa-th"></i> All Employee</router-link>
                </div>
                <form @submit.prevent="storeEmployee" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label custom_form_label">Name <span class="req_star">*</span> </label>
                                <input type="text" class="form-control custom_form_control" placeholder="Enter Employee Name..." v-model="form.empl_name">
                                <small class="text-danger" v-if="errors.empl_name">{{ errors.empl_name[0] }}</small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label custom_form_label">Phone <span class="req_star">*</span> </label>
                                <input type="text" class="form-control custom_form_control" placeholder="Enter Employee Phone Number..." v-model="form.empl_phone">
                                <small class="text-danger" v-if="errors.empl_phone">{{ errors.empl_phone[0] }}</small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label custom_form_label">Email <span class="req_star">*</span> </label>
                                <input type="email" class="form-control custom_form_control" placeholder="Enter Employee Email Address..." v-model="form.empl_email">
                                <small class="text-danger" v-if="errors.empl_email">{{ errors.empl_email[0] }}</small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label custom_form_label">Salary <span class="req_star">*</span> </label>
                                <input type="text" class="form-control custom_form_control" placeholder="Salary Amout..." v-model="form.empl_salary">
                                <small class="text-danger" v-if="errors.empl_salary">{{ errors.empl_salary[0] }}</small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label custom_form_label">DOB <span class="req_star">*</span> </label>
                                <input type="date" class="form-control custom_form_control" v-model="form.empl_dob">
                                <small class="text-danger" v-if="errors.empl_dob">{{ errors.empl_dob[0] }}</small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label custom_form_label">Status <span class="req_star">*</span> </label>
                                <select class="form-control custom_form_control" v-model="form.empl_status">
                                  <option value=""> -----Select Status----- </option>
                                  <option value="active">Active</option>
                                  <option value="inactive">Inactive</option>
                                  <option value="suspend">Suspend</option>
                                  <option value="reject">Reject</option>
                                </select>
                                <small class="text-danger" v-if="errors.empl_status">{{ errors.empl_status[0] }}</small>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 m-auto">
                                <label class="form-label custom_form_label">Address <span class="req_star">*</span> </label>
                                <textarea cols="30" rows="3" class="form-control custom_form_control" placeholder="Address Here..." v-model="form.empl_address"></textarea>
                                <small class="text-danger" v-if="errors.empl_address">{{ errors.empl_address[0] }}</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6 m-auto">
                                <label class="form-label custom_form_label">Image <span class="req_star">*</span> </label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control custom_form_control" @change="onFileSelected">
                                        <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
                                    </div>
                                    <div class="col-md-4">
                                        <img :src="form.image" style="margin-top:10px; width: 100px" />
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="card-footer card_footer_button text-center">
                        <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                    </div>
                </form>
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
    // Authentication
    created(){
        if(!User.loggedIn()){
            this.$router.push({ name: '/' })
        }
    },
    // data binding
    data(){
        return {
            form:{
                empl_name: null,
                empl_phone: null,
                empl_email: null,
                empl_salary: null,
                empl_dob: null,
                empl_address: null,
                empl_status: null,
                image:null,
            },
            errors: {}
        }
    },

    // method
    methods:{
        // image readable
        onFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
                // alert =========
                Toast.fire({
                    icon: 'warning',
                    title: 'Upload Image less then 1MB'
                })
                // alert =========
            }else{
                let reader = new FileReader();
                reader.onload = event =>{
                this.form.image = event.target.result

                };
                reader.readAsDataURL(file)
            }
        },

        // Data Submit
        storeEmployee(){
            axios.post('/api/employee',this.form)
            .then(() =>{
                this.$router.push({ name: 'employee-list' })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Added New Employee',
                })
                // alert =========
            })
            .catch( error => this.errors = error.response.data.errors )
        },
    }
}
</script>
