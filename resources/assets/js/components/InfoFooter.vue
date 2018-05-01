<template>
    <footer class="achtergrond-content space-inside-md">
        <div class="container">
            <div class="row ">          
                <div class="col-lg-12">
                    <p class='text-color-light' style='display: inline;'><span class='text-color-main'> T </span> 0594-517 877</p>
                    <p class='text-color-light space-outside-left-md' style='display: inline;'><span class='text-color-main'> E </span> info@agoraleek.nl</p>
                    <p class='text-color-light right hidden-xs' style='display: inline;'><span class='text-color-accent'> &copy; </span> {{ getCurrentYear() }} all rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            getCurrentYear() {
                return (new Date()).getFullYear();
            }
        }
    }
</script>
