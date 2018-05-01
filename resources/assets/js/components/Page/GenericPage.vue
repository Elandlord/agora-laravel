<template>
	<div>

		<banner :title="title">

		</banner>

		<divider-content></divider-content>

		<div class='achtergrond-content' style='min-height:500px;'>

			<slot> </slot>

		</div>

	</div>
</template>

<script>
    export default {

    	props: {
    		title: null,
    	}, 

    	data(){
    		return{
    			page: null,
    		}
    	},

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>