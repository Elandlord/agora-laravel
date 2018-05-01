require('./bootstrap');
require('./admin-lte'); // pulls in the admin-lte2 admin dashboard
require('./Core/Classes'); // Pulls in some helper classes
//require('owl-carousel-2/owl.carousel');
//npmrequire('ekko-lightbox/dist/ekko-lightbox.min.js');

// Core components
Vue.component('image-display', require('./components/ImageDisplay.vue'));
Vue.component('image-uploader', require('./components/ImageUploader.vue'));
Vue.component('cropper', require('./components/Cropper.vue'));

// Agora lay-out components
Vue.component('example', require('./components/Example.vue'));
Vue.component('navigation', require('./components/Navigation.vue'));
Vue.component('homepage-banner', require('./components/HomepageBanner.vue'));
Vue.component('banner', require('./components/Banner.vue'));
Vue.component('bottom-footer', require('./components/Footer.vue'));
Vue.component('info-footer', require('./components/InfoFooter.vue'));
Vue.component('divider-content', require('./components/DividerContent.vue'));
Vue.component('generic-page', require('./components/Page/GenericPage.vue'));

//Doorklikpagina's
Vue.component('news-page', require('./components/News/ClickPage/Page.vue'));

// Agenda components
Vue.component('agenda-list', require('./components/Agenda/AgendaList/AgendaList.vue'));
Vue.component('agenda-item', require('./components/Agenda/AgendaItem/AgendaItem.vue'));
Vue.component('agenda-headline', require('./components/Agenda/AgendaHeadline/AgendaHeadline.vue'));

Vue.component('album-display', require('./components/AlbumDisplay/AlbumDisplay.vue'));
// image slider
Vue.component('image-slider', require('./components/image-sliders/owl-image-slider.vue'));
Vue.component('slide', require('./components/image-sliders/slide-types/basic-slide.vue'));

// News components
Vue.component('news-list', require('./components/News/NewsList/NewsList.vue'));
Vue.component('news-headline', require('./components/News/NewsHeadline/NewsHeadline.vue'));
Vue.component('news-item', require('./components/News/NewsItem/NewsItem.vue'));


import router from './routes';

new Vue({
    el: '#app',
    router
});


$(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
          alwaysShowClose: true,
          onShown: function() {
              console.log('Eigendom van MEN Technology & Media. Dat betekent: niet in de console kijken stiekemerd!');
          }
      });
  });


// init plugins here
$('.datepicker').datepicker({
  format: 'yyyy-mm-dd'
});
$('.timepicker').timepicker({
  template: 'dropdown',
  showInputs: false,
  maxHours: 24,
  showMeridian: false
});

