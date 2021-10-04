<template>
    <v-form v-model="isFormValid">
        <v-container
            fluid
            id="app"
            class="fields_container"
            data-app
            style="width: 600px;"
        >
            <h3 style="text-align: center" class="mt-5">Edit Profile</h3>
            <div class="flex ma-auto d-flex justify-content-sm-center ">
                <div class="fields d-flex" >
                    <div class="left d-flex flex-md-column">
                        <div class="d-flex mt-3">
                            <v-icon
                                left
                                color="#669DB3FF"
                            >
                                mdi-email

                            </v-icon>
                            <v-text-field
                                v-model="form.email"
                                type="email"
                                :rules="[rules.required, rules.isEmail]"
                                name="email"
                                label="E-mail"
                                class=""
                                color="primary"
                            ></v-text-field>
                        </div>
                        <div class="d-flex mt-3">
                            <v-icon
                                left
                                color="#669DB3FF"
                            >
                                mdi-account

                            </v-icon>
                            <v-text-field
                                v-model="form.name"
                                :rules="[rules.required, rules.length]"
                                name="name"
                                label="Name"
                                class=""
                                color="primary"
                                value=""
                            ></v-text-field>
                        </div>
                        <div class="d-flex mt-3">
                            <v-icon
                                left
                                color="#669DB3FF"
                            >
                                mdi-account

                            </v-icon>
                            <v-text-field
                                v-model="form.surname"
                                :rules="[rules.required, rules.length]"
                                name="surname"
                                label="Surname"
                                class=""
                                color="primary"
                            ></v-text-field>
                        </div>
                    </div>
                    <div class="space" style="width: 100px"></div>
                    <div class="right d-flex flex-md-column">
                        <div class="d-flex mt-3">
                            <v-icon
                                left
                                color="#669DB3FF"
                            >
                                mdi-weight

                            </v-icon>
                            <v-text-field
                                v-model="form.weight"
                                name="weight"
                                :rules="[rules.isNumeric]"
                                label="Weight (kg)"
                                class=""
                                color="primary"
                            ></v-text-field>
                        </div>
                        <div class="d-flex mt-3">
                            <v-icon
                                left
                                color="#669DB3FF"
                            >
                                mdi-human-male-height-variant

                            </v-icon>
                            <v-text-field
                                v-model="form.height"
                                name="height"
                                :rules="[rules.isNumeric]"
                                label="Height (cm)"
                                class=""
                                color="primary"
                            ></v-text-field>
                        </div>
                        <div class="d-flex mt-3">
                            <v-icon
                                left
                                color="#669DB3FF"
                            >
                                mdi-calendar

                            </v-icon>
                            <v-menu
                                ref="menu"
                                v-model="menu"
                                :close-on-content-click="false"
                                :return-value.sync="date"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="date"
                                        label="Birth Date"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    v-model="date"
                                    no-title
                                    scrollable
                                    color="#669DB3FF"
                                >
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="menu = false"
                                    >
                                        Cancel
                                    </v-btn>
                                    <v-btn
                                        text
                                        color="primary"
                                        @click="$refs.menu.save(date)"
                                    >
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-menu>
                            <v-spacer></v-spacer>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isFormValid">
                <div class="button d-flex justify-content-center" style="width: 100%; padding-bottom: 10%">
                    <input :disabled="!isFormValid" class="active" style="margin-top: 40px; " @click.prevent="saveData" type="submit" value="Save">
                </div>
            </div>
            <div v-else>
                <div class="button d-flex justify-content-center" style="width: 100%; padding-bottom: 10%">
                    <input :disabled="!isFormValid" style="margin-top: 40px; border-color: #999999; background-color: #cccccc; color: #666666" @click.prevent="saveData" type="submit" value="Save">
                </div>
            </div>
                <div id="messageSuccess" class="flash-message alert-success" style="height: 50px; " v-if="success.length > 0">
                    <h5 style="text-align: center; padding-top: 15px" class="ma-auto">
                        {{ success }}
                    </h5>
                </div>
        </v-container>
    </v-form>
</template>

<script>
export default {
    name: "EditProfile",
    data () {
        return {

            show1: false,
            show2: true,
            show3: false,
            show4: false,
            rules: {
                required: v => !!v || 'Required.',
                length: v => v.length >= 2 || "Minimum length is 2 characters",
                emailMatch: () => (`The email and password you entered don't match`),
                isEmail:  v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                isNumeric: v => /[0-9]/.test(v) || 'Value has to be numeric',
                maxLengthNumeric: v => v.length >=3 || "Maximum length is 3 characters",
            },
            isFormValid: false,
            form:{
                id: 0,
                email: '',
                name: '',
                surname: '',
                age: '',
                weight: '',
                height: '',
            },
            user: [],
            errors: [],
            success: "",

            date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
            menu: false,
            modal: false,
            menu2: false,

        }

    },
    methods:{
        setValues(){
            this.form.id = this.user.data.id;
            this.form.email = this.user.data.email;
            this.form.name = this.user.data.name;
            this.form.surname = this.user.data.surname;
            this.form.weight = this.user.data.weight;
            this.form.height = this.user.data.height;
            this.form.age = this.user.data.age;
        },
        saveData(){
            console.log(this.form)
            axios.post('/saveProfile', this.form).then((response) => {
                this.success = "Data was successfully updated!"
                $(function(){
                    $("#messageSuccess").show('slow');
                });
                $(function(){
                    setTimeout(function() {
                        $("#messageSuccess").hide('slow');
                    }, 3000);
                });

            }).catch((error) => {
                this.errors = error.response.data.errors;
                console.log(error + "sdffsd")
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
    },
    mounted() {
        axios.get('/getCurrUser').then(response => {
            this.user = response;
            this.setValues();
        }).catch((error) => {
            this.errors = error.response.data.errors;
            console.log(errors);
        });
    },
}
</script>

<style scoped>

.fields_container{
    box-shadow: 0 0 10px rgba(0,0,0, 0.3);

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
    width: 200px;

}


.active:hover {
    box-shadow: inset 400px 0 0 0 #669DB3FF;
    color: #fff;
    border: #669DB3FF;
}
</style>
