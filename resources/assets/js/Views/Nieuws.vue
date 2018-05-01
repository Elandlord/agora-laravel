<template>
	<div>
		<generic-page title="NIEUWS"> 
		
			<div class='container'>
				<div class='row space-outside-up-md'>
					<div class='col-lg-6'>

						<news-list search='yes'>

							<news-headline slot='news-headline'></news-headline>

							<news-item slot='news-item' class='space-outside-sm'></news-item>

							<news-item slot='news-item' class='space-outside-sm'></news-item>

							<news-item slot='news-item' class='space-outside-sm'></news-item>

						</news-list>

					</div>

<!-- 					<div class='col-lg-6 hidden-xs'>

						<h2 class='text-color-light bg-accent space-inside-sides-sm space-inside-up-xs inline-block'>INSTAGRAM</h2>
						
						<div class='divider bg-accent space-inside-xs'></div>

					</div> -->
				</div>
			</div>

		</generic-page>
	</div>
</template>

<script>
    export default {

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>