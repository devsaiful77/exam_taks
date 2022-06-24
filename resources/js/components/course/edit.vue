<template>
    <div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header custom__header">
                            <h4 class="card-title">Edit Course</h4>
                            <router-link class="btn btn-primary" v-bind:to="{ name: 'course-list' }">Course List</router-link>
                        </div>
                        <form @submit.prevent="EditCourse" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Course Name:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Enter Course Name" class="form-control" v-model="form.course_name">
                                        <small class="text-danger" v-if="errors.course_name">{{errors.course_name[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Remarks:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Remaks" class="form-control" v-model="form.remarks">
                                        <small class="text-danger" v-if="errors.remarks">{{errors.remarks[0]}}</small>
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer card_footer_button text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Update</button>
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
                course_name: null,
                remarks: null,
            },
            errors:{}
        }
    },

    created(){
        let id = this.$route.params.id
        axios.get('/api/course/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },

    // method
    methods:{


        EditCourse(){
            let id = this.$route.params.id
            axios.patch('/api/course/'+id,this.form)
            .then(() =>{
                this.$router.push({ name: 'course-list' })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Update Course'
                })
                // alert =========
            })
            .catch( error => this.errors = error.response.data.errors )
        }
    }



}
</script>
