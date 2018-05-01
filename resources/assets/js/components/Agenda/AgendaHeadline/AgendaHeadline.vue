<template>
<div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-outside-down-sm ">
    <div class="border-bottom border-accent reset-padding">
      <div  style="position: relative; top: 1px"
        class="
          inline-block
          space-inside-sides-xs space-inside-xs
          bg-accent
          reset-padding
        ">
        <h1 class="text-color-light block custom-h1 reset-padding text-uppercase">
          {{ agendaItem.day_name | toShortDayName }}
        </h1>
        <span class="text-center text-color-light text-bold block  text-uppercase custom-span">
          {{ agendaItem.day }} {{ agendaItem.month_name | toShortDateName }}
        </span>
      </div>
      <div class="inline-block text-color-light space-inside-xs space-inside-sides-xs">
          <p class="text-bold text-color-light">{{ agendaItem.time_start | toTime }}</p>
        <p class="text-bold text-uppercase text-color-light">uur</p>
      </div>
    </div>

    <div class="bg-light-opacity-lg relative inline-block" style="width: 100%;">
      <div class="col-lg-6 col-md-6 col-sm-6 reset-padding">
        <div  class="image bg-secondary">
          <img class="width-auto" :src="agendaItem.thumbnail">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 reset-padding  space-inside-sides-sm space-inside-up-sm">
        <h2 class="text-uppercase text-color-light space-outside-down-sm">{{ agendaItem.title }}</h2>
        <p class="font-sm text-light text-color-light space-outside-down-sm">
        {{ agendaItem.description | cutString | addDots }}
        </p>
      </div>

      <a :href="'#/agenda/page/' +agendaItem.id"  style="left: 53%; bottom: 10px;" class="font-sm position-bottom-center hidden-xs  text-uppercase space-inside-sides-sm space-inside-xs bg-accent border-none text-color-light">Lees meer</a>

      <div style="clear:both;"></div>
      <a :href="'#/agenda/page/' + agendaItem.id "
        class="
          relative
          font-sm text-uppercase text-color-light
          space-inside-sides-sm space-inside-xs space-outside-sm space-outside-left-sm
          bg-accent
          border-none
          hidden-sm hidden-md hidden-lg inline-block
        ">Lees meer</a>

    </div>
  </div>
</div>
</template>

<style >
h1.custom-h1 {
  position: relative;
  right: 4px;
}
</style>

<script type="text/javascript">
export default {
  props: {
    agendaItem: null,
  },
  filters: {
    toTime(time) {
      return time.substring(0, 5)
    },
    toShortDateName(date) {
      return date.substring(0,3);
    },
    toShortDayName(dayName) {
      return dayName.substring(0,2)
    },
    cutString(str){
      return str.substring(0, 90);
    },
    addDots(str){
      if(str.length > 85) {
        return str + '...';
      }
      return str;
    }
  },
  mounted() {
    console.log('agenda-item is mounted');
  }
}
</script>