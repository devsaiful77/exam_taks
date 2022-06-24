<template>
    <div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header custom__header">
                            <h4 class="card-title"> Edit Student</h4>
                            <router-link class="btn btn-primary" v-bind:to="{ name: 'student-list' }">Student List</router-link>
                        </div>
                        <form @submit.prevent="updateCourse" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Course Name:<span class="req_star">*</span></label>

                                    <div class="col-md-5">
                                        <select class="form-control" v-model="form.course_id">

                                            <option v-for="(value, index) in course" v-bind:value="value.id" v-bind:selected="index === 0">
                                                {{ value.course_name }}
                                            </option>

                                        </select>
                                        <small class="text-danger" v-if="errors.course_id">{{errors.course_id[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Name:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Name" class="form-control" v-model="form.name">
                                        <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Roll:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Roll" class="form-control" v-model="form.roll">
                                        <small class="text-danger" v-if="errors.roll">{{errors.roll[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Class:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Class" class="form-control" v-model="form.class">
                                        <small class="text-danger" v-if="errors.class">{{errors.class[0]}}</small>
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
                course_id: null,
                name: null,
                roll: null,
                class: null,
            },
            course:[],
            errors:{}
        }
    },

    created(){
        let id = this.$route.params.id
        axios.get('/api/student/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))

        this.allCourse();
    },

    // method
    methods:{

        allCourse(){
            axios.get('/api/course/')
            .then(({data}) => (this.course = data))
            .catch()
        },
        updateCourse(){
            axios.post('/api/student',this.form)
            .then(() =>{
                this.$router.push({ name: 'student-list' })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Update Student'
                })
                // alert =========
            })
            .catch( error => this.errors = error.response.data.errors )
        }
    },





}
</script>
