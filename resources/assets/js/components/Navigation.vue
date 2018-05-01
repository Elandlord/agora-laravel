<template>
  <nav class="navbar bg-main navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed sm-space-outside-right-md xs-space-outside-right-md" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse bg-main navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav lg-space-outside-left-xl xs-text-center">
          <li @click="close()" class='visible-xs'>
            <router-link tag="li" class='space-outside-left-md space-inside-md' to="/" exact>
              <a class="bg-main text-color-light font-md">HOME<span class="sr-only">(current)</span></a>
            </router-link>
          </li>
          <li @click="close()">
            <router-link tag="li" class='space-outside-left-md space-inside-md' to="/agenda" exact>
              <a class="bg-main text-color-light font-md">AGENDA<span class="sr-only">(current)</span></a>
            </router-link>
          </li>
          <li @click="close()">
            <router-link tag="li" class='space-outside-left-md space-inside-md'  to="/nieuws" exact>
              <a class="bg-main text-color-light font-md">NIEUWS</a>
            </router-link>
          </li>
          <!-- <li @click="close()">
            <router-link tag="li" class='space-outside-left-md space-inside-md' to="/fotos" exact>
              <a class="bg-main text-color-light font-md">FOTO'S</a>
            </router-link>
          </li> -->
        </ul>

        <div class='logo-center hidden-xs' style='list-style-type: none;'>
          <router-link tag="li" to="/" style='list-style-type: none;' exact>
            <a><img src='images/agora-logo.png'/></a>
          </router-link>
        </div>

        <ul class="nav navbar-nav navbar-right lg-space-outside-right-xl xs-text-center">
          <li @click="close()">
            <router-link class='space-outside-left-md space-inside-md'  tag="li" to="/over-ons" exact>
              <a class="bg-main text-color-light font-md">OVER ONS</a>
            </router-link>
          </li>
          <!-- <li @click="close()">
            <router-link class='space-outside-left-md space-inside-md'  tag="li" to="/ruimtes" exact>
              <a class="bg-main text-color-light font-md">RUIMTES</a>
            </router-link>
          </li> -->
          <li @click="close()">
            <router-link class='space-outside-left-md space-inside-md' tag="li" to="/contact" exact>
              <a class="bg-main text-color-light font-md">CONTACT</a>
            </router-link>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
          close(){
            if ($(window).width() < 768) {
              $('.navbar-toggle').click();
            }
          }
        }
    }
</script>
