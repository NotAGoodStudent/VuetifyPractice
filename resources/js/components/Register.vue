<template>
    <v-form v-model="valid" class="form" >
        <v-container
            fluid
            class="fields_container"
            style="width: 600px; height: 600px;"
        >
            <h3 style="text-align: center; color: #fff" class="mt-5">Register</h3>
            <div class="flex ma-auto d-flex justify-content-sm-center ">
                <div class="fields d-flex flex-md-column mt-3" style="width: 80%" >
                    <div class="d-flex">
                        <v-icon
                            left
                            color="#007CC7"
                        >
                            mdi-email

                        </v-icon>
                        <v-text-field
                            v-model="form.email"
                            type="email"
                            :rules="[rules.required]"
                            name="email"
                            label="E-mail"
                            required
                            class="inputs"
                            color="primary"
                        ></v-text-field>
                    </div>
                    <div class="d-flex">
                        <v-icon
                            left
                            color="#007CC7"
                        >
                            mdi-account

                        </v-icon>
                        <v-text-field
                            v-model="form.name"
                            :rules="[rules.required]"
                            name="name"
                            label="Name"
                            required
                            class="inputs"
                            color="primary"
                        ></v-text-field>
                    </div>
                    <div class="d-flex">
                        <v-icon
                            left
                            color="#007CC7"
                        >
                            mdi-account

                        </v-icon>
                        <v-text-field
                            v-model="form.surname"
                            :rules="[rules.required]"
                            name="surname"
                            label="Surname"
                            class="inputs"
                            required
                            color="primary"
                        ></v-text-field>
                    </div>

                    <div class="d-flex">
                        <v-icon
                            left
                            color="#007CC7"

                        >
                            mdi-lock

                        </v-icon>
                        <v-text-field
                            v-model="form.password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required]"
                            :type="show1 ? 'text' : 'password'"
                            class="inputs password"
                            name="password"
                            label="Password"
                            hint="At least 8 characters"
                            counter
                            @click:append="show1 = !show1"
                        ></v-text-field>
                    </div>
                    <div class="d-flex">
                        <v-icon
                            left
                            color="#007CC7"

                        >
                            mdi-lock

                        </v-icon>
                        <v-text-field
                            v-model="form.password_confirmation"
                            :rules="[rules.required]"
                            name="password_confirmation"
                            class="inputs"
                            :type="show3 ? 'text' : 'password'"
                            label="Re-enter password"
                        ></v-text-field>
                    </div>

                    <input style="margin-top: 20px" @click.prevent="registerUser" type="submit" value="Sign in">
                    <div style="" class="flash-message mt-4">
                        <p class="alert-danger" id="message" style="text-align: center; display: none" >
                            {{errors}}
                        </p>

                    </div>
                </div>

            </div>

        </v-container>
        <svg style="position: fixed; bottom: 0; z-index: -1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CC7" fill-opacity="1" d="M0,0L34.3,21.3C68.6,43,137,85,206,96C274.3,107,343,85,411,85.3C480,85,549,107,617,106.7C685.7,107,754,85,823,69.3C891.4,53,960,43,1029,69.3C1097.1,96,1166,160,1234,170.7C1302.9,181,1371,139,1406,117.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

    </v-form>
</template>

<script>
export default {
    data () {
        return {
            show1: false,
            show2: true,
            show3: false,
            show4: false,
            rules: {
                required: value => !!value || 'Required.',
                emailMatch: () => (`The email and password you entered don't match`),
            },
            form:{
                email: '',
                name: '',
                surname: '',
                password: '',
                password_confirmation: '',
            },
            errors: [],

        }
    },
    methods: {
        registerUser(){
            console.log(this.form)
            axios.post('/registerUser', this.form).then((response) => {
                window.location = response.data.redirect;
            }).catch((error) => {
                this.errors = "Some fields could be empty";

                $(function(){
                    $("#message").show('slow');
                });
                $(function(){
                    setTimeout(function() {
                        $("#message").hide('slow');
                    }, 3000);
                });
            });
        }
    }

}
</script>

<style scoped>
.inputs {
    color: #fff !important;

}

.password .v-icon{
    color: #fff !important;
    border-color: white ;

}
.v-messages__message{
    color: #F5461F;

}
.inputs label{
    color: #fff !important;

}
.inputs input{
    color: #fff !important;
    border-bottom: 1px solid white;
}
.fields_container{
    background-color: #203647;
    border-radius: 5px;
    z-index: 999;


}

input[type="submit"]{
    color: #EEFBFB;
    background-color: #203647;
    background-clip: padding-box;
    border: 1px solid #4DA8DA;
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

}


input[type="submit"]:hover {
    box-shadow: inset 500px 0 0 0 #007CC7;
    color: #fff;
    border: #007CC7;
}
.v-input__icon--append {
    color: purple;
}
</style>
