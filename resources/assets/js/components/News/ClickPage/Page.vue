<template>
	<div v-if="news != null">
		<generic-page :title='news.title' v-if="news != null">

            <div class='container'>
                <div class='row space-outside-md'>
                    <div class='col-lg-12'>
                        <div class='row'>

                             <div class='col-lg-12 col-md-12 col-sm-12 reset-padding space-inside-sm'>
                                <a :href="'#/nieuws'"
                                    class="
                                        font-sm text-uppercase text-color-light
                                        space-inside-sides-sm space-inside-xs xs-space-inside-sm
                                        bg-accent
                                        border-none
                                        inline xs-inline-block
                                        xs-height-auto
                                    ">GA TERUG</a>
                            </div>

                            <div class='col-lg-6 col-md-6 col-sm-4 col-xs-12 reset-padding'>
                                <div class="image">
                                    <img :src='news.landscape' class='border-right border-main xs-border-none' style='width: 100%;'/>
                                </div>
                            </div>

                            <div class='col-lg-6 col-md-6 col-sm-8 col-xs-12 reset-padding'>
                                <div class='bg-main space-inside-sm space-inside-sides-sm inline-block'>
                                    <h2 class='text-color-light'>{{ news.publish_day }}  {{ news.month_name | uppercase | cutString }}</h2>

                                    <h1 class='space-inside-xs right text-color-light'>{{ news.publish_year }}</h1>
                                </div>


                                <h2 class='text-color-light space-outside-sm space-outside-left-sm'>{{ news.title }}</h2>

                                <h3 class='text-color-light space-outside-sm space-outside-left-sm'>Auteur: {{ news.author }}</h3>

                                <p class='text-color-light space-outside-left-sm'>{{ news.body }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		</generic-page>
	</div>
</template>

<script>
    export default {

    	data(){
    		return{
    			news: null,
    		}
    	},

        filters: {
            uppercase(str){
                return str.toUpperCase();
            },

            cutString(str){
                return str.substring(0, 3);
            }
        },

        beforeMount(){
            Factory.getStaticInstance('news').find(this.$route.params.id).then((news) => {
                this.news = news;
            });
        },

        mounted() {
            console.log('Component mounted.');
        }

    }
</script>
