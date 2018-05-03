<template>
	<div v-if="activity != null">
		<generic-page :title='activity.title' v-if="activity != null">

            <div class='container'>
                <div class='row space-outside-md'>
                    <div class='col-lg-12'>
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12 reset-padding space-inside-sm'>
                                <a :href="'#/agenda'"
                                    class="
                                        font-sm text-uppercase text-color-light
                                        space-inside-sides-sm space-inside-xs xs-space-inside-sm
                                        bg-accent
                                        border-none
                                        inline xs-inline-block
                                        xs-height-auto
                                    ">GA TERUG</a>
                            </div>

                            <div class='col-lg-6 col-md-6 col-sm-6 reset-padding'>
                                <div class="image">
                                    <img :src='activity.landscape' class='border-right border-main xs-border-none' />
                                </div>
                            </div>

                            <div class='
                                col-lg-6 col-md-6 col-sm-6
                                reset-padding
                                xs-text-center
                            '>
                                <div class='
                                    bg-main
                                    space-inside-sm space-inside-sides-sm
                                    inline-block
                                    xs-full-width
                                    xs-space-outside-down-md
                                '>
                                    <h2 class='
                                        text-color-light
                                        xs-inline-block
                                        xs-space-outside-right-sm
                                    '>{{ activity.day }} {{ activity.month_name | uppercase | cutString }}</h2>
                                    <h1 class='space-inside-xs right xs-clear-floats xs-inline-block text-color-light'>2017</h1>
                                </div>


                                <h3 class='
                                    text-color-light
                                    space-outside-up-sm space-outside-left-sm
                                    xs-inline-block
                                '>GENRE</h3>
                                <p v-for='tag in activity.tag' v-if='activity != null' class='
                                    text-color-light
                                    space-outside-left-sm xs-space-outside-up-sm
                                    xs-inline-block
                                '>{{ tag.name }}</p>

                                <h3 class='
                                    text-color-light
                                    space-outside-up-sm space-outside-left-sm
                                    xs-inline-block
                                '>PRIJS</h3>
                                <p class='
                                    text-color-light
                                    space-outside-left-sm
                                    xs-inline-block
                                '>&euro; {{ activity.price }}</p>

                                <h3 class='
                                    text-color-light
                                    space-outside-up-sm space-outside-left-sm
                                    xs-inline-block
                                '>TIJD</h3>
                                <p class='
                                    text-color-light
                                    space-outside-left-sm
                                    xs-inline-block
                                '>{{ activity.time_start | cutTime }} tot {{ activity.time_end | cutTime }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class='row xs-space-inside-sides-sm'>
                    <div class='col-lg-12 col-md-12 col-sm-12 reset-padding'>
                        <a href="#contact" class=" font-sm text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light">RESERVEREN</a>
                    </div>
                </div>

                <div class='row space-outside-md xs-space-inside-sides-sm'>
                    <div class='col-lg-12 col-md-12 col-sm-12 reset-padding'>
                        <h2 class='text-color-light space-outside-down-md'>{{ activity.title | uppercase }}</h2>
                        <p class='text-color-light'>
                        {{ activity.description | nl2br}}
                        </p>
                    </div>
                </div>
            </div>

		</generic-page>
	</div>
</template>

<script>
    import Activity from '../../../Models/Activity';
    import Tag from '../../../Models/Tag';

    export default {

    	data(){
    		return{
    			activity: null,
    		}
    	},

        filters: {
            uppercase(str){
                return str.toUpperCase();
            },

            cutString(str){
                return str.substring(0, 3);
            },

            cutTime(str){
                return str.substring(0, 5);
            },

            nl2br(str){
               return str.split("\n").join("<br/>");
            }
        },

        beforeMount(){
            Factory.getStaticInstance('event').find(this.$route.params.id).then((activity) => {
                    this.activity = activity;
            });
        },

        mounted() {
            console.log('Component mounted.');
        }

    }
</script>
