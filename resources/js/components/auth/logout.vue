<template>
   <div>
       logout
   </div>
</template>

<script>
export default{
    created(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        // Toast Alert
        Toast.fire({
            icon: 'success',
            title: 'Logout Successfully'
        })
        this.$router.push({ name: '/' })

    }
}
</script>
