<template>
	<div class='text-over-image hidden-xs'>
    	<img src='images/agora-banner-pagina.jpg' />
        <div class="header-on-image">
            <h2 class='
            text-center'> {{ title | uppercase }} </h2>
        </div>

    </div>
</template>

<script>
    export default {

        props: {
            title: null,
        },

        filters: {
            uppercase(str){
                return str.toUpperCase();
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
