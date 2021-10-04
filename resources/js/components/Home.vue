<template>
    <v-container
        fluid
        class=""


    >
        <article class="d-flex justify-content-sm-around g" style="">
            <div @click="myRoutines"
                 @mouseover="hidden_gym = false"
                 @mouseleave="hidden_gym = true"
                 class="gym"
                 id="gym">

                    <div class=""
                         v-if="!hidden_gym"
                         style="display: block; box-shadow: rgba(0, 0, 0, 0.3) 0px 10px 36px 0px, rgba(0, 0, 0, 0.3) 0px 0px 0px 1px; height: 50px;">
                        <div style="width: 100%" class="ma-auto">
                            <h3 class="m-auto" style="text-align: center;padding-top: 10px">My routines</h3>
                        </div>
                    </div>
                <v-img
                    style=""
                    src="/images/front/gym.jpg"
                    aspect-ratio=""
                    width="500px"
                    height="600px"
                >

                </v-img>
            </div>
            <div @click=""
                 @mouseover="hidden_diet = false"
                 @mouseleave="hidden_diet = true"
                 class="diet"
                 id="diet">

                    <div class=""
                         v-if="!hidden_diet"
                         style="display: block; box-shadow: rgba(0, 0, 0, 0.3) 0px 10px 36px 0px, rgba(0, 0, 0, 0.3) 0px 0px 0px 1px; height: 50px">
                        <div style="width: 100%" class="ma-auto">
                            <h3 class="m-auto" style="text-align: center; padding-top: 10px">My diet</h3>
                        </div>
                    </div>
                    <v-img
                        src="/images/front/diet.jpg"
                        aspect-ratio=""
                        width="500px"
                        height="600px"
                    >

                    </v-img>
            </div>
                <div @click=""
                        @mouseover="hidden_calc = false"
                        @mouseleave="hidden_calc = true"
                        class="calculator"
                        id="calculator">

                            <div class=""
                                          v-if="!hidden_calc"
                                          style="display: block; box-shadow: rgba(0, 0, 0, 0.3) 0px 10px 36px 0px, rgba(0, 0, 0, 0.7) 0px 0px 0px 1px; height: 50px">
                                <div style="width: 100%" class="ma-auto">
                                    <h3 class="m-auto" style="text-align: center; padding-top: 10px">Calculate calories</h3>
                                </div>
                            </div>
                            <v-img
                                src="/images/front/calculator.jpg"
                                aspect-ratio=""
                                width="500px"
                                height="600px"
                            >

                            </v-img>
                </div>
            </article>

    </v-container>
</template>

<script>

export default {
    name: "Home",
    data() {
        return{
            hidden_gym: true,
            hidden_diet: true,
            hidden_calc: true,
        };
    },
    methods: {
        myRoutines(){
            window.location = '/myRoutines';
        }
    }

}
</script>

<style scoped>
.gym, .diet, .calculator{
    margin: 2%;
}
 .gym, .diet, .calculator {
     transition: 0.4s all ease-in-out;
     filter: grayscale(100%);
 }
.gym:hover, .diet:hover, .calculator:hover{
    filter: grayscale(0);
    cursor: pointer;
    transform: scale(1.02);
}

h3{
    color: white;
}


</style>
