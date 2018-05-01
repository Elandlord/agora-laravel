<template>
	<div>

		<generic-page title="RUIMTES" v-if="!show">
			<!-- start container -->
			<div class='container'>

				<!-- intro text on page -->
				<div class='row'>
					<div class='col-lg-12 space-outside-md'>
						<h2 class='text-color-light'>AGORA biedt u graag verschillende voorzieningen, waar u gebruik van kunt maken.
						Voor meer informatie zijn wij te bereiken op:</h2>
					</div>
				</div>
				<!-- end intro text -->


				<!-- start first box -->
				<div class='row space-outside-up-md' text-inject>
					<!-- div with opacity -->
					<div class='inline-block bg-light-opacity-lg '>
						<div class='col-lg-4 reset-padding'>
							<div class="image">
								<img src='images/theater.png' class='border-right border-main sm-border-none xs-border-none' />
							</div>
						</div>
						<div class='col-lg-6 reset-padding'>

							<h3 class='text-color-light inline-block bg-main space-inside-sm space-inside-sides-sm'>THEATER</h3>

							<p class='text-color-light space-inside-sm space-inside-sides-sm'>Een grote zaal met podium waar feesten in kunnen worden gehouden voor minimaal 50 mensen. Hier is licht en geluid aanwezig voor theater en muziek.</p>

							<a href="/#/contact" class="font-sm text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light inline space-outside-sm space-outside-sides-sm">MEER INFO</a>

						</div>
					</div>
				</div>
				<!-- end first box -->

				<!-- start second box -->
				<div class='row space-outside-up-md' text-inject>
					<div class='inline-block bg-light-opacity-lg '>
						<div class='col-lg-4 reset-padding'>
							<div class="image">
								<img src='images/foyer.png' class='border-right border-main sm-border-none xs-border-none' />
							</div>
						</div>
						<div class='col-lg-6 reset-padding'>

							<h3 class='text-color-light inline-block bg-main space-inside-sm space-inside-sides-sm'>FOYER</h3>

							<p class='text-color-light space-inside-sm space-inside-sides-sm'>Een ruimte met bar om een borrel te houden of een klein feest.</p>

							<a href="/#/contact"  class="font-sm text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light inline space-outside-sm space-outside-sides-sm">MEER INFO</a>

						</div>
					</div>
				</div>
				<!-- end second box -->

				<!-- start third box -->
				<div class='row space-outside-md' text-inject>
					<div class='inline-block bg-light-opacity-lg '>
						<div class='col-lg-4 reset-padding'>
							<div class="image">
								<img src='images/vergaderruimte.png' class='border-right border-main sm-border-none xs-border-none' />
							</div>
						</div>
						<div class='col-lg-6 reset-padding'>

							<h3 class='text-color-light inline-block bg-main space-inside-sm space-inside-sides-sm'>VERGADERRUIMTE</h3>

							<p class='text-color-light space-inside-sm space-inside-sides-sm'>Een ruimte voor +/- 10 personen om vergaderingen in te houden. Voorgaand werden hier ook BHV-trainingen in gehouden.</p>

							<a href="/#/contact" class="font-sm text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light inline space-outside-sm space-outside-sides-sm">MEER INFO</a>

						</div>
					</div>
				</div>
				<!-- end third box -->
			</div>
			<!-- end container -->
		</generic-page>
		
	</div>
</template>

<script>
    export default {

    	data(){
    		return{
    			show: false,
    		}
    	},

        mounted() {
            console.log('Component mounted.')
        },

        methods: {

        }
    }
</script>