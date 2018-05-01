<template>
	<div>
		<generic-page title="AGENDA">
			<div class='container'>
        <div class="col-lg-12 space-outside-up-sm">
          <agenda-list trimtext="no" search="yes"></agenda-list>
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