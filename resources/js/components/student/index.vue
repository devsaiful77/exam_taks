<template>
    <div>
        <!-- main part -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header custom__header">
                        <h4 class="card-title">All Student</h4>
                        <router-link class="btn btn-primary" v-bind:to="{ name: 'create-student' }">Create New Student </router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Course</strong></th>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Class</strong></th>
                                        <th><strong>Roll</strong></th>
                                        <th><strong>Manage</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in student" :key="value.id">

                                        <td>{{ value.course.course_name }}</td>
                                        <td>{{ value.name }}</td>
                                        <td>{{ value.roll }}</td>
                                        <td>{{ value.class }}</td>

                                        <td>
                                            <div class="d-flex">

                                                <router-link :to="{ name: 'edit-student', params:{id:value.id} }" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                                </router-link>

                                                <a @click="deleteStudent(value.id)" class="btn btn-danger shadow btn-xs sharp"><i
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
            student:[],
        }
    },

    // ======== API Calling =========
    methods:{
        allCourse(){
            axios.get('/api/student/')
            .then(({data}) => (this.student = data))
            .catch()
        },
        // delete method
        deleteStudent(id){
            axios.delete('/api/student/'+id)
            .then(() => {
                this.student = this.student.filter(value =>{
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
                this.$router.push({name: 'student-list'})
            })
        }


    },

    created(){
        this.allCourse();
    }

}

</script>
