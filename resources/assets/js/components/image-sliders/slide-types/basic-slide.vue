<template>
<div :style="'height:' + height" class="banner">
    <div class="padding-slider">
        <slot name="content"  > </slot>
    </div>
    <div v-if="overlay" class="overlay-sl"></div>
    <slot class="slider-image-sl lg-banner-height background-sl" name="background"></slot>
</div>
</template>

<style type="text/css">
     .padding-sl {
        padding: 0px 40px;
    }

    .banner-sl{
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .background-sl{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -10;
    }

    .overlay-sl {
        position: absolute;
        background: rgba(0,0,0,0.35);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -9;
    }

    .slider-image-sl img{
        position: absolute;
        top: 0;
        left: 0;
        z-index: -10;
    }

</style>

<script>
    export default {
        props: {
            overlay: false,
            height: "",
        },
        data() {
            return {

            }
        },
        mounted() {

        }
    }
</script>
