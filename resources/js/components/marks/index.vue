<template>
    <div>
        <!-- main part -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header custom__header">
                        <h4 class="card-title">All Student Marks</h4>
                        <router-link class="btn btn-primary" v-bind:to="{ name: 'create-marks' }">Create New Marks </router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Subject</strong></th>
                                        <th><strong>Marks</strong></th>
                                        <th><strong>Manage</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in marks" :key="value.id">

                                        <td>{{ value.student.name }}</td>
                                        <td>{{ value.subject }}</td>
                                        <td>{{ value.marks }}</td>

                                        <td>
                                            <div class="d-flex">

                                                <router-link :to="{ name: 'edit-marks', params:{id:value.id} }" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                                </router-link>

                                                <a @click="deletemarks(value.id)" class="btn btn-danger shadow btn-xs sharp"><i
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
            marks:[],
        }
    },

    // ======== API Calling =========
    methods:{
        allMarks(){
            axios.get('/api/marks/')
            .then(({data}) => (this.marks = data))
            .catch()
        },
        // delete method
        deletemarks(id){
            axios.delete('/api/marks/'+id)
            .then(() => {
                this.marks = this.marks.filter(value =>{
                    return value.id != id
                })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Delete Marks'
                })
                // alert =========

            })
            .catch(() =>{
                this.$router.push({name: 'marks-list'})
            })
        }


    },

    created(){
        this.allMarks();
    }

}

</script>
