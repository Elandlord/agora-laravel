<template>
<div class="container space-inside-up-md">
  <div v-if="album != null" class="row">
    <div v-for="photo in album.photo" class="col-lg-3 thumb">
      <a class="thumbnail " style="width: 100%; height: 100%;" :href="'/images/' + photo.type + '/' + photo.model_id + '/' +  photo.filename " data-gallery="project" data-toggle="lightbox">
        <img style="width: 100%; height: 100%;" :src="'/images/' + photo.type + '/' + photo.model_id + '/1x1/' +  photo.filename ">
      </a>
    </div>
  </div>
</div>
</template>

<script type="text/javascript">
  export default {
    mounted() {
      this.init();
    },
    data() {
      return {
        album: null,
      }
    },
    methods: {
      init() {
        this.initEvents();
      },

      initEvents() {
        Event.listen('album:display', (album) => {
          this.album = album;
        });
      }
    }

  }
</script>