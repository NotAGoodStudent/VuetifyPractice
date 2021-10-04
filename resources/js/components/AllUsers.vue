<template>
<div>
    <h2>HAHA</h2>
    <div v-for="user in users" v-bind="user.id">
        <h2>{{user.name}}</h2>
        <p>{{user.email}}</p>
    </div>
</div>
</template>

<script>
export default {
    name: "AllUsers",
    data(){
        return {
            //variable that will be filled with users
            users: [],
        };
    },

    methods: {

        // If using axios put async + function name
        async getData(){
            try{
                // Response will be filled with the data that will be retrieved after the axios call
                let response = await this.$http.get(
                  "http://127.0.0.1:8000/users"
                );
                // we set users to response
                this.users = response.data;
            }
            catch (error){
                console.log(error);
            }
        },
    },
    //once everything is loaded here we can call our functions
    created() {
        this.getData();
    }
}
</script>

<style scoped>

</style>
