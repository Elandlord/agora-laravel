<template>
	<div>

		<generic-page title="OVER ONS">
			<div class='container'>
				<div class='row space-outside-up-md'>
					<div class='col-lg-4'>
						<div class='image'>
							<img src='images/agora4.png' class='border-right border-main sm-border-none xs-border-none' />
						</div>
					</div>

					<div class='col-lg-6'>
						<h1 class='text-color-light xs-font-lg xs-text-center xs-space-outside-up-sm'>OVER AGORA</h1>
						<p class='space-outside-up-md text-color-light'>
							AGORA komt uit het Grieks en was in de oudheid dé centrale plek waar het sociale en culturele leven zich afspeelde. Met ons cultureel centrum creëren wij hetzelfde in de gemeente Leek. Naast toneel, theater en live concerten vinden er in ons cultureel centrum ook lezingen en symposia plaats. AGORA is bovenal een plek waar activiteiten worden georganiseerd voor jong en oud en inwoners van Leek elkaar op laagdrempelige wijze kunnen ontmoeten. Door de vele faciliteiten en uitstekende parkeergelegenheden is AGORA bovendien een uitstekende plek om uw evenement te organiseren.
						</p>
					</div>
				</div>

				<div class='row space-outside-up-md'>
					<div class='col-lg-4'>

					</div>

					<div class='col-lg-6'>
						<h1 class='text-color-light'>OVER KERNWAARDEN</h1>
					</div>
				</div>

				<div class='row space-outside-up-md'>
					<div class='col-lg-4 reset-padding'>
						<div class="image">
							<img src='images/agora5.png' class='border-right border-accent sm-border-none xs-border-none' />
						</div>
					</div>

					<div class='col-lg-6 reset-padding'>
						<h3 class='text-color-light inline-block bg-accent space-inside-sm space-inside-sides-sm'>VERBINDEND</h3>
						<p class='text-color-light space-inside-sm space-inside-sides-sm'>AGORA komt uit het Grieks en was in de oudheid dé centrale plek waar het sociale en culturele leven zich afspeelde. Met ons cultureel centrum creëren wij hetzelfde in de gemeente Leek. Naast toneel, theater en live concerten vinden er in ons cultureel centrum ook lezingen en symposia plaats. AGORA is bovenal een plek waar activiteiten worden georganiseerd voor jong en oud en inwoners van Leek elkaar op laagdrempelige wijze kunnen ontmoeten. Door de vele faciliteiten en uitstekende parkeergelegenheden is AGORA bovendien een uitstekende plek om uw evenement te organiseren.</p>
					</div>
				</div>

				<div class='row space-outside-up-md'>

					<div class='col-lg-4 reset-padding'>
						<div class="image">
							<img src='images/agora6.png' class='border-right border-accent sm-border-none xs-border-none' />
						</div>
					</div>

					<div class='col-lg-6 reset-padding'>
						<h3 class='text-color-light inline-block  bg-accent space-inside-sm space-inside-sides-sm'>DYNAMISCH</h3>
						<p class='text-color-light space-inside-sm space-inside-sides-sm'>AGORA komt uit het Grieks en was in de oudheid dé centrale plek waar het sociale en culturele leven zich afspeelde. Met ons cultureel centrum creëren wij hetzelfde in de gemeente Leek. Naast toneel, theater en live concerten vinden er in ons cultureel centrum ook lezingen en symposia plaats. AGORA is bovenal een plek waar activiteiten worden georganiseerd voor jong en oud en inwoners van Leek elkaar op laagdrempelige wijze kunnen ontmoeten. Door de vele faciliteiten en uitstekende parkeergelegenheden is AGORA bovendien een uitstekende plek om uw evenement te organiseren.</p>
					</div>

				</div>

				<div class='row space-outside-md'>
					<div class='col-lg-4 reset-padding'>
						<div class="image">
							<img src='images/agora7.png' class='border-right border-accent sm-border-none xs-border-none' />
						</div>
					</div>

					<div class='col-lg-6 reset-padding'>
						<h3 class='text-color-light inline-block  bg-accent space-inside-sm space-inside-sides-sm'>TALENT</h3>
						<p class='text-color-light space-inside-sm space-inside-sides-sm'>AGORA komt uit het Grieks en was in de oudheid dé centrale plek waar het sociale en culturele leven zich afspeelde. Met ons cultureel centrum creëren wij hetzelfde in de gemeente Leek. Naast toneel, theater en live concerten vinden er in ons cultureel centrum ook lezingen en symposia plaats. AGORA is bovenal een plek waar activiteiten worden georganiseerd voor jong en oud en inwoners van Leek elkaar op laagdrempelige wijze kunnen ontmoeten. Door de vele faciliteiten en uitstekende parkeergelegenheden is AGORA bovendien een uitstekende plek om uw evenement te organiseren.</p>
					</div>
				</div>
			</div>
		</generic-page>

	</div>
</template>

<script>
import Page from '../Models/Page';
import Section from '../Models/Section';

    export default {

    	data() {
    		return{
    			pageSections: null,
    		}
    	},

        mounted() {
            console.log('Component mounted.');

            Page.where({
            	name: 'OverOns'
            }, (page) => {

        	  page.with('sections', (section) => {
                return new Section(section);
              });

            	setTimeout(() => {
            		this.page = page;
            	}, 500);

              console.log(page);
            });
        }
    }
</script>