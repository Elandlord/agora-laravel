<template>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div v-if="news != null && search == 'yes'">
            <div class='col-lg-8 space-outside-md'>
              <input v-model="searchParameters" type='text' placeholder='Trefwoord..' class='
                                  form-control
                                  bg-none
                                  text-color-light
                                  space-outside-up-xs
                                  '/>
            </div>
            <div class='col-lg-4 space-outside-md'>
              <button class="font-md text-uppercase space-inside-sides-md space-inside-sm bg-accent border-none text-color-light" @click="searchEvents()">Zoeken</button>
            </div>
        </div>
        <div class='row space-outside-md text-center' v-if="loading">
            <i class='fa fa-cog fa-spin fa-5x fa-fw text-color-accent'></i>
            <h2 class='text-color-light space-outside-md font-md '>Nieuws laden..</h2>
        </div>
        <news-headline :news='newsHeadline' ></news-headline>
        <news-item v-for="(item, index) in news" :news='item' v-bind:key="index" class='space-outside-up-sm'></news-item>

        <div class="text-center" v-if="isVisible">
            <h2 class='text-color-light'>Geen nieuwsberichten gevonden.</h2>
        </div>
    </div>
</template>

<script>
    export default {

        props: {
         limit: null,
         search: null,
        },

    	data() {
		   return {
		      news: null,
          newsHeadline: null,
          searchParameters: null,
          loading: false,
          isVisible: false,
		   }
		},

        mounted() {
            console.log('Component mounted.');

            Factory.getStaticInstance('news').all().then((news) => {
                if(news.length === 0) {
                  this.isVisible = true;
                } else {
                  this.isVisible = false;
                }

                this.newsHeadline = news.shift();
                if(this.limit != null){
                    this.news = news.splice(0, this.limit);
                }else{
                    this.news = news;
                }
            });
        },

         methods:{
            searchEvents(){

                if(this.searchParameters.length >= 3){
                  this.loading = true;

                  Factory.getStaticInstance('news').search(this.searchParameters).then((news) => {
                    if(news.length == 0) {
                      this.isVisible = true;
                    } else {
                      this.isVisible = false;
                    }

                    this.newsHeadline = news.shift();

                    if(this.limit != null){
                        this.news = news.splice(0, this.limit);
                    }else{
                        this.news = news;
                    }
                  });

                  setTimeout(() => {
                    this.loading = false;
                  }, 500);
                }else{
                  alert('Minimaal 3 tekens invoeren.');
                }
            }

          },
    }
</script>
