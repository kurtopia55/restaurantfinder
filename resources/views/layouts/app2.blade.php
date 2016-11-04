<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Restaurant Finder') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- polymer -->
        <link rel="import" href="{{{ asset('/assets/bower_components/polymer/polymer.html') }}}">
        
        <!-- web components -->
        <link rel="import" href="{{{ asset('/assets/bower_components/paper-input/paper-input.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/iron-icons.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icon/iron-icon.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/maps-icons.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/communication-icons.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/editor-icons.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/iron-icons.html') }}}">

        <link rel="import" href="{{{ asset('/assets/bower_components/paper-item/paper-item.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/paper-item/paper-item-body.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/paper-icon-button/paper-icon-button.html') }}}">

        <!-- app layout -->
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-layout.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-drawer-layout/app-drawer-layout.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-drawer/app-drawer.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-scroll-effects/app-scroll-effects.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-header/app-header.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-header-layout/app-header-layout.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/app-layout/app-toolbar/app-toolbar.html') }}}">

        <link rel="import" href="{{{ asset('/assets/bower_components/storefinder/directions/storefinder-directions.html') }}}">

        <link href="/css/app.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: Roboto, 'Noto', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size:13px;
                margin: 0;
            }

            app-header {
                background-color: #00897B;
                color: #fff;
            }

            app-header paper-icon-button {
                --paper-icon-button-ink-color: white;
            }

            app-drawer app-toolbar{
                color:#666;
                background: #fafafa;
                height:56px;
                font-weight: 300;
            }

           app-toolbar a, app-toolbar a:hover{
                color:#fff;
            }

            app-drawer app-toolbar #toolbar-title{
                font-size:14px;
                margin-left:15px;
            }

            .menu .location-menu{
                padding:15px;
                font-size:13px;
                border-bottom:1px solid #EEEEEE;
                cursor: pointer;
                display: flex;
                color:#757575;
                font-weight:300;
                text-decoration: none;
                outline: 0;
            }

            .menu .location-menu div:nth-child(1){
                margin-right:15px;
                flex-basis:10%;
            }

            .menu .location-menu div:nth-child(1) iron-icon{
                width:17px;
            }

            .menu .location-menu div:nth-child(2){
                flex-basis:90%;
                padding:5px 0 0;
            }

            .dashboard-content{
                padding:15px;
            }

            .heading{
                font-weight: 300;
                margin: 0 0 10px;
            }

            .update-form .form-group{
                min-height: 35px;
            }

            .content paper-item{
                padding:10px 15px;
                border-bottom:1px solid #dadada;
                font-weight:300;
                position:relative;
            }

            .content paper-item:hover .button-options{
                display: block;
            }

            .content paper-item .button-options{
                position: absolute;
                top: 21px;
                right: 25px;
                display:none;
            }

            .content paper-item paper-item-body div.paper-item-title{
               font-size: 18px;
                margin-bottom: 3px;
                color: #d2401d;
                font-weight: 500;
            }

            .content paper-item paper-item-body iron-icon{
                width:17px;
                /*color:rgba(0, 0, 0, 0.54);*/
            }

            .content paper-item paper-item-body div:nth-child(2){
                display:flex;
                font-weight:300;
                /*color:rgba(0, 0, 0, 0.54);*/
            }
        </style>

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <app-drawer-layout>
            <app-drawer>
                <app-header-layout has-scrolling-region>
                    <app-header fixed>
                        <app-toolbar>
                            Menu
                        </app-toolbar>
                    </app-header>
                    <div class = "content">
                        <div class="menu">
                            <a href="{{ url('/home') }}" class="location-menu">
                                <div><iron-icon icon="icons:home"></iron-icon></div>
                                <div>Home</div>
                            </a>
                            <a href="{{ url('/locations') }}" class="location-menu">
                                <div><iron-icon icon="maps:restaurant-menu"></iron-icon></div>
                                <div>Locations</div>
                            </a>
                            <a href = "{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="location-menu">
                                <div><iron-icon icon="icons:arrow-back"></iron-icon></div>
                                <div>Logout</div>
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>  
                </app-header-layout> 
            </app-drawer>
            <app-header-layout>
                <app-header reveals effects="waterfall">
                    <app-toolbar>
                        <paper-icon-button icon="menu" drawer-toggle></paper-icon-button>
                        <div main-title>Administrator Panel</div>
                        @if($page && $page == 'locations')
                            <a href="{{url('locations/new')}}"><paper-icon-button icon="icons:add"></paper-icon-button></a>
                        @endif
                    </app-toolbar>
                </app-header>
                <div class = "content">
                    @yield('content')
                </div>
            </app-header-layout>
        </app-drawer-layout>
    </body>
</html>