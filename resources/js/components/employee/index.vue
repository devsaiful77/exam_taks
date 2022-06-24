<template>
    <div>
        <!-- breadcumb -->
        <div class="page-titles">
                <div class="">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'home' }">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Employee List</a></li>
                    </ol>
                </div>
        </div>
        <!-- breadcumb -->
        <!-- main part -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header custom__header">
                        <h4 class="card-title"> <i class="fa fa-gg-circle"></i> All Employee</h4>
                        <router-link class="btn btn-primary" v-bind:to="{ name: 'employee-create' }"> <i class="fa fa-plus-circle"></i> Create New Employee </router-link>
                    </div>
                    <!-- <div class="search__partner">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Search Here..." class="form-control" v-model="searchItem">

                                </input>
                            </div>
                        </div>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Image</strong></th>
                                        <th><strong>Employee</strong></th>
                                        <th><strong>Address</strong></th>
                                        <th><strong>Salary</strong></th>
                                        <th><strong>Manage</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in employee" :key="value.empl_id">
                                        <td>
<img :src="value.empl_photo" alt="" class="image_resize">
                                        </td>
                                        <td>
                                            <span>
                                                {{ value.empl_name }}
                                                <span class="custom_badge">
                                                    {{ value.empl_status }}
                                                </span>

                                            </span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
    // ====== Data Binding ======
    data(){
        return {
            employee:[],
        }
    },
    // ====== API Calling ======
    methods:{
        getEmployee(){
            axios.get('/api/employee/')
            .then(({ data }) => (this.employee =data) )
            .catch()
        }
    },

    // calling
    created(){
        this.getEmployee();
    }


}

</script>

<style>
    .image_resize{
        width: 80px;
        border: 1px solid #ddd;
    }

</style>
