<template>
	<div>

		<generic-page title='CONTACT'>

			<div class='container'>
				<div class='row space-outside-down-lg'>
					<div class='col-lg-12 space-outside-md'>
						<h2 class='text-color-light text-center space-outside-sm'>NEEM CONTACT MET ONS OP</h2>

						<form method='post' action='mail/contact-mail'>

							<input type='text' name='name' placeholder='NAAM' class='form-control bg-none text-color-light border-light' required/>

							<input type='text' name='email' placeholder="EMAIL" class='form-control space-outside-sm bg-none text-color-light border-light' required/>

							<input type='text' name='phone' placeholder="TELEFOON" class='form-control bg-none text-color-light border-light' required/>

							<textarea name='message' class='text-color-light form-control bg-none border-light space-outside-sm' placeholder="BERICHT" required></textarea>

							<input type='hidden' name='_token' :value="axios"  />

							<button  class="font-md text-uppercase space-inside-sides-md space-inside-sm bg-accent border-none text-color-light right">Versturen</button>

						</form>
					</div>
				</div>

				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='
							text-color-light
							inline
							bg-accent
							space-inside-up-sm space-inside-sides-sm
							xs-font-sm sm-font-md
							hidden-xs'>LOCATIE
						</h2>
						<h4 class='
							text-color-light
							inline
							right
							space-outside-sides-md sm-space-outside-sides-md-none xs-space-outside-up-xs
							sm-font-md xs-font-xs'>Rodenburg 1B • 9351 PV Leek
						</h4>
						<h4 class='
							text-color-light sm-font-md xs-font-xs
							inline
							right
							space-outside-sides-md xs-space-outside-up-xs
							'>Ma - Vr: 09:00 - 17:00
						</h4>
						<h4 class='
							text-color-light
							inline
							right
							space-outside-sides-md xs-space-outside-up-xs
							sm-font-md xs-font-xs'>info@agoraleek.nl
						</h4>
					</div>
				</div>
			</div>



			<div style="max-height: 470px;" class='container-fluid reset-padding no-overflow'>
				<div class='divider bg-accent space-inside-sm'></div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2391.6223706268315!2d6.370299815831829!3d53.17081467994258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c835a3911d22df%3A0x4c2e8f57f281cd81!2sRodenburg+1B%2C+9351+PV+Leek!5e0!3m2!1snl!2snl!4v1487273076773" width="100%" height="450" frameborder="0" style="border:0; padding: 0; margin: 0;" allowfullscreen></iframe>
			</div>

		</generic-page>

	</div>
</template>

<script>
    export default {

    	data(){
    		return{
    			axios: axios.defaults.headers.common['X-CSRF-TOKEN']
    		}
    	},

        mounted() {
            console.log('Component mounted.');
        }
    }
</script>