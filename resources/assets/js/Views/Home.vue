<template>
	<div >
		<homepage-banner></homepage-banner>

		<div class='bg-main container-fluid space-inside-sides-xl'>
			<div class='row space-outside-md space-outside-sides-lg hidden-xs'>
				<div class='col-lg-6 text-center  text-center'>
					<h1 class='text-color-light text-center text-uppercase'>Agenda</h1>
				</div>
				<div class='col-lg-6 text-center'>
					<h1 class='text-color-light text-center text-uppercase'>Nieuws</h1>
				</div>
			</div>
		</div>

		<div class='achtergrond-content' style='min-height:500px;'>
			<div class='container'>
				<div class='row space-outside-up-md'>
          <div class='col-lg-6 col-xs-12'>
            <h1 class="text-color-light visible-xs text-center space-outside-down-md text-uppercase">Agenda</h1>
            <agenda-list limit="3" headline="yes" trimtext="yes"></agenda-list>
          </div>
          <div class='col-lg-6 col-xs-12'>
            <h1 class="text-color-light visible-xs text-center text-uppercase space-outside-up-md">Nieuws</h1>
            <news-list limit="3" class="xs-space-outside-up-md md-space-outside-up-md sm-space-outside-up-md"></news-list>
          </div>
        </div>
			</div>
		</div>

	</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');


        }
    }
</script>