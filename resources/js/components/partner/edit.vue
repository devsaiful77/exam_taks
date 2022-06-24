<template>
    <div>
        <!-- main part -->
         <div class="row page-titles mx-0">
            <div class="">
                <div class="welcome-text">
                    <h4>Edit Partner</h4>
                </div>
                </div>
                <div class="">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'home' }">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header custom__header">
                            <h4 class="card-title">Edit Partner</h4>
                            <router-link class="btn btn-primary" v-bind:to="{ name: 'list-partner' }">Partner List</router-link>
                        </div>
                        <form @submit.prevent="updatePartner" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Name:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Enter Name" class="form-control" v-model="form.name">
                                        <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Address:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Enter Address" class="form-control" v-model="form.location">
                                        <small class="text-danger" v-if="errors.location">{{errors.location[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Parcentage:<span class="req_star">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="%" class="form-control" v-model="form.parcentage">
                                        <small class="text-danger" v-if="errors.parcentage">{{errors.parcentage[0]}}</small>
                                    </div>
                                </div>

                                <div class="form-group custom_form_group row">
                                    <label class="control-label custom__control__label col-md-4">Image:<span class="req_star">*</span></label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file btnu_browse">
                                                    Browse… <input type="file" @change="onFileSelected">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img :src="form.image" style="margin-top:10px" >
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer card_footer_button text-center">
                            <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
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
                name: '',
                location: '',
                parcentage: '',
                newphoto: '',
                image: '',
            },
            errors:{}
        }
    },

    created(){
        let id = this.$route.params.id
        axios.get('/api/partner/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },
    // method
    methods:{
        onFileSelected(event){
            let file = event.target.files[0];
            // if(file.size > 1048770){
            //     Notification.image_validation()
            // }else{

            // }

            let reader = new FileReader();
                reader.onload = event =>{
                this.form.newphoto = event.target.result

            };
            reader.readAsDataURL(file)

        },


        updatePartner(){
            let id = this.$route.params.id
            axios.patch('/api/partner/'+id,this.form)
            .then(() =>{
                this.$router.push({ name: 'list-partner' })
                // alert =========
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully Save This Partner'
                })
                // alert =========
            })
            .catch( error => this.errors = error.response.data.errors )
        }
    }



}
</script>
