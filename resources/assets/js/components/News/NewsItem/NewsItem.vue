<template>
<div v-if="news != null">
   <a :href="'#nieuws/page/' + news.id">
      <div class='col-lg-12 inline-block bg-light-opacity-lg reset-padding space-outside-sm'>

          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 reset-padding'>

            <div class='image border-left border-main sm-border-none xs-border-none' style='width: 100%;'>
              <img class='width-auto' :src='news.landscape'/>
            </div>

          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 reset-padding'>

            <h3 class='text-color-light space-inside-sides-sm space-inside-sm text-uppercase sm-font-md xs-font-md'>{{ news.title }}</h3>

            <p class='text-color-light space-inside-sides-sm xs-space-outside-down-sm'>
              {{ news.body | cutString | addDots }}
            </p>

          </div>

          <a :href="'#/nieuws/page/' + news.id" style="left: 52.5%; bottom: 12px;" class="hidden-xs font-sm position-bottom-center text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light inline">LEES MEER</a>

          <button   class="font-sm visible-xs  space-outside-sm space-outside-sides-sm  text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light">Lees meer</button>

          <div style="bottom: 12px;" class="position-bottom-right">
            <h5  class='block text-color-light text-right space-inside-sides-sm'>{{ news.publish_year }}</h5>
            <span class="block text-color-light  reset-padding space-inside-sides-sm"> {{ news.month_name }} {{ news.publish_day }} </span>
          </div>

      </div>
    </a>
</div>
</template>

<script>
    export default {

    	props: {
    		news: null,
    	},

      data(){
        return{

        }
      },

      filters: {
        cutString(str){
          return str.substring(0, 200);
        },

        addDots(str){
          if(str.length > 200) {
            return str + '...';
          }
          return str;
        }
      },

      mounted() {
          console.log('Component mounted.')
      },

      methods: {
        showNews(){
          Event.fire('news-item.clickPage', this.news);
        }
      }
    }
</script>
