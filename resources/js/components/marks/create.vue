<template>
    <div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header custom__header">
                            <h4 class="card-title">Create New Marks</h4>
                            <router-link class="btn btn-primary" v-bind:to="{ name: 'marks-list' }">Marks List</router-link>
                        </div>
                        <form @submit.prevent="storeMarks" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Student Name:<span class="req_star">*</span></label>

                                    <div class="col-md-5">
                                        <select class="form-control" v-model="form.student_id">

                                            <option v-for="(value, index) in student" v-bind:value="value.id" v-bind:selected="index === 0">
                                                {{ value.name }}
                                            </option>

                                        </select>
                                        <small class="text-danger" v-if="errors.student_id">{{errors.student_id[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Subject:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Subject" class="form-control" v-model="form.subject">
                                        <small class="text-danger" v-if="errors.subject">{{errors.subject[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Marks:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Marks" class="form-control" v-model="form.marks">
                                        <small class="text-danger" v-if="errors.marks">{{errors.marks[0]}}</small>
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
// import Notification from '../../Helpers/Notification';
import User from '../../Helpers/User'

export default{
    created(){
        if(!User.loggedIn()){
            this.$router.push({ name: '/' })
        }
    },
    // Data Bingding
    data(){
        return {
            form:{
                student_id: null,
                subject: null,
                marks: null,
            },
            student:[],
            errors:{}
        }
    },

    // method
    methods:{

        allStudent(){
            axios.get('/api/student/')
            .then(({data}) => (this.student = data))
            .catch()
        },
        storeMarks(){
            axios.post('/api/marks',this.form)
            .then(() =>{
                this.$router.push({ name: 'marks-list' })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Save New Student Marks'
                })
                // alert =========
            })
            .catch( error => this.errors = error.response.data.errors )
        }
    },

    created(){
        this.allStudent();
    }



}
</script>
