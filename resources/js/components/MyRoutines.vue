<template>
<v-container>
    <div class="wrapper d-flex flex-md-column">
        <div v-if="routines.length > 0" class="routines_wrappers ma-auto d-flex flex-md-column ">
            <ul class="routines ma-auto" v-for="routine in routines">
                {{routine.title}}
            </ul>
        </div>
        <div v-else class="ma-auto mt-5" style="text-align: center;">
            <h5>Woops, seems like the list is empty.</h5>
            <v-img
                class="mt-5"
                style="display: block; margin-right: auto; margin-left: auto"
                src="/images/front/no_routines_img.png"
                aspect-ratio=""
                width="300px"
                height="300px"
            >

            </v-img>
            <v-form v-model="valid" class="form mt-5 ma-auto" >
                <div class="inputs d-flex justify-content-center" style="width: 1000px">
                    <div class="d-flex ma-auto"  style="width: 400px;   ">
                        <v-icon
                            left
                            color="#669DB3FF"
                        >
                            mdi-weight-lifter

                        </v-icon>
                        <v-text-field
                            v-model="form.routineTitle"
                            :rules="[rules.required]"
                            name="routineTitle"
                            label="Routine Name"
                            required
                            class="routine_name"
                            color="primary"
                        ></v-text-field>
                        <input type="submit" @click.prevent="addRoutine" value="Add Routine">
                    </div>
                </div>
            </v-form>
        </div>
    </div>
</v-container>
</template>

<script>
export default {
    name: "MyRoutines",
    data (){
        return{
            routines: [],
            rules: {
                required: value => !!value || 'Required.',
            },

            form: {
                routineTitle: '',
            },
            errors: [],
        }
    },
    mounted() {
        axios.get('/getMyRoutines').then(response => {
            this.routines = response.data;
            console.log(response.data);
        }).catch((error) => {
            this.errors = error.response.data.errors;
            console.log(errors);
        });


    },
    methods: {
        addRoutine(){
            axios.post('/addRoutine', this.form).then(response => {
                console.log('heh');
                window.reload();
            }).catch((error) => {
                console.log('cap');
                this.errors = error.response.data.errors;
                console.log(errors);
            });
        }
    }
}
</script>

<style scoped>
body{

}
.inputs{

}

.routines{
    border: 1px solid black;
    background-color: rgba(0,0,255,0.4);
    border-radius: 5px;
    width: 300px;
}

.routine_name{

}
input[type="submit"]{
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    font-size: 0.9rem;
    font-weight: 400;
    border-radius: 0.25rem;
    height: calc(1.8em + 0.85rem + 2px);
    display: inline-block;
    cursor: pointer;
    box-shadow: inset 0 0 0 0 #669DB3FF;
    -webkit-transition: ease-out 0.4s;
    -moz-transition: ease-out 0.4s;
    transition: ease-out 0.4s;
    width: 100px;

}


input[type="submit"]:hover {
    box-shadow: inset 400px 0 0 0 #669DB3FF;
    color: #fff;
    border: #669DB3FF;
}
</style>
