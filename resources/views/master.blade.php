<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        <title>@yield('title') || Agora</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">

        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' };
        </script>
        @include('partials.styles')

    </head>

    <body >

    	<div id="app" class="no-overflow">

            @include('layouts.navigation')

            <transition name="slide-fade">
                <router-view>

                </router-view>
            </transition>

            @include('partials.footer')

            @include('partials.info-footer')

    	</div>


    	@include('partials.scripts')

    </body>

</html>