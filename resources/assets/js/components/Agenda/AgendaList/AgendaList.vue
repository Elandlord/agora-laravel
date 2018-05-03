<template>
<div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row ">
      <div v-if="agendaItems != null && search == 'yes'">
        <div class='col-lg-8 space-outside-md'>
          <input v-model="searchParameters" type='text' placeholder='Trefwoord..' class='
                              form-control
                              bg-none
                              text-color-light
                              space-outside-up-xs
                              '/>
        </div>
        <div class='col-lg-4 space-outside-md'>
          <button class="font-md text-uppercase space-inside-sides-md space-inside-sm bg-accent border-none text-color-light" @click="searchEvents()">Zoeken</button>
        </div>

        <div class='row space-outside-md text-center' v-if="loading">
          <i class='fa fa-cog fa-spin fa-5x fa-fw text-color-accent'></i>
          <h2 class='text-color-light space-outside-md font-md '>Evenementen laden..</h2>
        </div>
      </div>
      <agenda-headline v-if="agendaHeadline != null && headline == 'yes'" :agendaItem="agendaHeadline"></agenda-headline>
      <agenda-item v-if="agendaItems != null" v-for="(item, index) in agendaItems" v-bind:key="index" :trimtext="trimtext"  :agendaItem="item"> </agenda-item>

      <div class="text-center" v-if="isVisible">
        <h2 class='text-color-light'>Geen geplande evenementen gevonden.</h2>
      </div>
    </div>
  </div>
</div>
</template>

<style lang="sass">

</style>

<script type="text/javascript">
  export default {
    props: {
      headline: null,
      trimtext: null,
      limit: null,
      search: null,
    },
    data() {
      return {
        agendaItems: null,
        agendaHeadline: null,
        searchParameters: null,
        loading: false,
        isVisible: false,
      }
    },

    mounted() {
      console.log('agenda-list component is mounted');

      Factory.getStaticInstance('event').all().then((agendaItems) => {
          if(agendaItems.length == 0) {
            this.isVisible = true;
          } else {
            this.isVisible = false;
          }

          if(this.headline != null){
            this.agendaHeadline = agendaItems.shift();
          }

          if(this.limit != null){
            this.agendaItems = agendaItems.splice(0, this.limit);
          }else{
            this.agendaItems = agendaItems;
          }
      });
    },

    methods:
      {
        searchEvents(){
            if(this.searchParameters.length >= 3){
              this.loading = true;

              AgendaItem.search(this.searchParameters, (agendaItems) => {

                if(agendaItems.length == 0) {
                  this.isVisible = true;
                } else {
                  this.isVisible = false;
                }

                if(this.headline != null){
                  this.agendaHeadline = agendaItems.shift();
                }

                if(this.limit != null){
                  this.agendaItems = agendaItems.splice(0, this.limit);
                }else{
                  this.agendaItems = agendaItems;
                }


              });


              setTimeout(() => {
                this.loading = false;
              }, 500);
            }else{
              alert('Minimaal 3 tekens invoeren.');
            }


        }

      },

  }

</script>