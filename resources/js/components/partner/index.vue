<template>
    <div>
        <!-- main part -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header custom__header">
                        <h4 class="card-title">All Partner</h4>
                        <router-link class="btn btn-primary" v-bind:to="{ name: 'create-partner' }">Create New Partner </router-link>
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
                                        <th><strong>Name</strong></th>
                                        <th><strong>Address</strong></th>
                                        <th><strong>Parcentage</strong></th>
                                        <th><strong>Manage</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in partner" :key="value.id">
                                        <td>
                                            <img :src="value.image" alt="" class="image_resize">
                                        </td>
                                        <td>{{ value.name }}</td>
                                        <td>{{ value.location }}</td>
                                        <td>{{ value.parcantage }}</td>

                                        <td>
                                            <div class="d-flex">

                                                <router-link :to="{ name: 'edit-partner', params:{id:value.id} }" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                                </router-link>
                                                <!-- delete method -->
                                                <a @click="deletePartner(value.id)" class="btn btn-danger shadow btn-xs sharp"><i
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
            partner:[],
            // searchItem: ''
        }
    },
    // // search data
    // computed:{
    //     filtersearch(){
    //         return this.partner.filter( value => {
    //             return value.name.match(this.searchItem)
    //         })
    //     }
    // },

    // ======== API Calling =========
    methods:{
        allPartner(){
            axios.get('/api/partner/')
            .then(({data}) => (this.partner = data))
            .catch()
        },
        // delete method
        deletePartner(id){
            axios.delete('/api/partner/'+id)
            .then(() => {
                this.partner = this.partner.filter(value =>{
                    return value.id != id
                })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Delete This Partner'
                })
                // alert =========

            })
            .catch(() =>{
                this.$router.push({name: 'list-partner'})
            })
        }


    },

    created(){
        this.allPartner();
    }

}

</script>
