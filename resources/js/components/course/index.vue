<template>
    <div>
        <!-- main part -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header custom__header">
                        <h4 class="card-title">All Course</h4>
                        <router-link class="btn btn-primary" v-bind:to="{ name: 'create-course' }">Create New Course </router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Course Name</strong></th>
                                        <th><strong>Remarks</strong></th>
                                        <th><strong>Manage</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in course" :key="value.id">

                                        <td>{{ value.course_name }}</td>
                                        <td>{{ value.remarks }}</td>

                                        <td>
                                            <div class="d-flex">

                                                <router-link :to="{ name: 'edit-course', params:{id:value.id} }" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                                </router-link>

                                                <a @click="deleteCourse(value.id)" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

export default {
    // Authentication checking
    created(){
        if(!User.loggedIn()){
            this.$router.push({ name: '/' })
        }
    },
    // ======= Data Bingding =======
    data(){
        return{
            course:[],
        }
    },

    // ======== API Calling =========
    methods:{
        allCourse(){
            axios.get('/api/course/')
            .then(({data}) => (this.course = data))
            .catch()
        },
        // delete method
        deleteCourse(id){
            axios.delete('/api/course/'+id)
            .then(() => {
                this.course = this.course.filter(value =>{
                    return value.id != id
                })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Delete This Course'
                })
                // alert =========

            })
            .catch(() =>{
                this.$router.push({name: 'course-list'})
            })
        }


    },

    created(){
        this.allCourse();
    }

}

</script>
