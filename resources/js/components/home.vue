<template>
    <div>

            <h1>Hello Home Component</h1>

    </div>
</template>

<script>
import User from '../Helpers/User'
export default{
    created(){
        if(!User.loggedIn()){
            this.$router.push({ name: '/' })
        }
    }
}
</script>
