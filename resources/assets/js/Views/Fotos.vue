<template>
	<div>

		<generic-page title="FOTO'S">

			<div v-if="isVisible" class='container'>
				<div class='row space-outside-up-md'>
					<div v-for="album in albums" >

						<div class='col-lg-12 space-outside-up-sm reset-padding'>
							<h2 class='text-color-light bg-accent space-inside-sides-sm space-inside-up-xs inline-block'>SONGKWARTIER WEST</h2>
							<div class='divider bg-accent space-inside-xs'></div>
						</div>

						<div v-if="albums != null" v-for="photo in  album.photo"  class='col-lg-2 reset-padding space-inside-sides-xs'>
							<div class='block bg-light-opacity-md pointer' style='min-height: 150px;'>
								<img @click="displayAlbum(album)" :src="'/images/album/' + album.id + '/1x1/' + photo.filename">
							</div>
						</div>
					</div>
				</div>
			</div>

		<album-display> </album-display>
		</generic-page>
	</div>
</template>
<script>
	import Album from '../Models/Album';
	import Photo from '../Models/Photo';
  export default {
  		data() {
  			return {
  				albums: null,
  				isVisible: true,
  			}
  		},
      mounted() {
      	this.init();
      },
      methods: {
      	init() {
      		this.initData();
      	},
      	displayAlbum(album){
      		this.isVisible = false;
      		Event.fire('album:display', album);
      	},
      	initData() {
      		Album.all((albums) => {
	      		albums.forEach((album) => {
	      			album.with('photo', (photos) => {

	      				return photos.map((photo) => {
	      					return new Photo(photo);
	      				});

	      			});
	      		});

	      		setTimeout(() => {
	      			this.albums = albums;
	      			console.log(this.albums);
	      		}, 400);
	      		console.log(this.albums);
	      	});
      	},
      }
  }
</script>