<template>
    <footer class="bg-main space-inside-md">
        <div class="container">
            <div class="row ">          
                <div class="col-lg-12 text-center">
                    <h3 class='text-color-light text-light' style='display: inline;'><span class='text-bold text-color-secondary'> T </span> (0594) 51 26 58 </h3>
                    <h3 class='text-color-light space-outside-left-md text-light' style='display: inline;'><span class='text-bold text-color-secondary'> E </span> info@rodenburgtheater.nl </h3>
                    <h3 class='text-color-light space-outside-left-md right hidden-xs text-light' style='display: inline;'><span class='text-bold text-color-accent'> &copy; </span> {{ getCurrentYear() }} all rights reserved</h3>
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
