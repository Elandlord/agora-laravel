<template>
	<div >
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 reset-padding space-outside-sm' v-if="news != null">
			<a :href="'#nieuws/page/' + news.id">
				<div class='image' style='width: 100%;'>
					<img class='width-auto' :src='news.thumbnail'/>
				</div>
				<div class='border-top border-accent '>
					<div class='bg-accent reset-padding inline-block space-inside-sides-lg'>
						<h2 class='text-color-light space-inside-sm text-center text-uppercase sm-font-md xs-font-md'>{{ news.title }}</h2>
					</div>

					<div class='space-inside-right-xs inline-block right relative' style='top: 10px; left: 5px;'>
						<h2 class='text-color-light block text-right'>{{ news.publish_year }}</h2>
						<h3 class='text-color-light block text-right font-sm text-uppercase'>{{ news.publish_day }} {{ news.month_name }} </h3>
					</div>
				</div>

				<div class='col-lg-12 reset-padding'>
					<p class='text-color-light space-inside-sm'>
						{{ news.body | cutString |  addDots }}
					</p>

					<a :href="'#nieuws/page/' + news.id" class="hidden-xs font-sm text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light inline">LEES MEER</a>
				</div>
			</a>
		</div>
	</div>
</template>

<script>
    export default {

    	props: {
    		news: null,
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
        }
    }
</script>
