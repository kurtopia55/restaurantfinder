<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- polymer -->
        <link rel="import" href="{{{ asset('/assets/bower_components/polymer/polymer.html') }}}">
        
        <!-- web components -->
        <link rel="import" href="{{{ asset('/assets/bower_components/paper-input/paper-input.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/iron-icons.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icon/iron-icon.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-icons/maps-icons.html') }}}">
        <link rel="import" href="{{{ asset('/assets/bower_components/iron-ajax/iron-ajax.html') }}}">
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
            }

            app-drawer app-toolbar #toolbar-title{
                font-size:14px;
                margin-left:15px;
            }

            #map{
                height:715px;
            }

            .byNode{
                background-color: #00897B;
                color: #fff;
                font-size: 20px;
                font-weight: 300;
                font-family: Roboto, Arial, sans-serif;
                padding: 20px 15px;
            }

            .byNode iron-icon{
                margin-right:15px;
            }

             /* Let's get this party started */
            ::-webkit-scrollbar {
                width: 8px;
            }
             
            /* Track */
            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            }
             
            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #BDBDBD; 
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
            }
            ::-webkit-scrollbar-thumb:window-inactive {
                background: #E0E0E0; 
            }
        </style>
    </head>
    <body>
        <app-drawer-layout>
            <app-drawer>
                <app-header-layout has-scrolling-region>
                    <app-header fixed>
                        <app-toolbar>
                            <iron-icon icon = "stars"></iron-icon>
                            <span id = "toolbar-title" class = "flex">Your Direction</span>
                            <iron-icon icon = "chevron-right"></iron-icon>
                        </app-toolbar>
                    </app-header>
                    <div class = "content" id = "getDirectionNode">
                        <div class = "byNode">Suggested Routes</div>
                        <storefinder-directions id = "directionNode"></storefinder-directions>
                    </div>  
                </app-header-layout> 
            </app-drawer>
            <app-header-layout>
                <app-header reveals effects="waterfall">
                    <app-toolbar>
                        <paper-icon-button icon="menu" drawer-toggle></paper-icon-button>
                        <div main-title>Restaurant Finder</div>
                    </app-toolbar>
                </app-header>
                <div class = "content" style = "height:500px;">
                    <iron-ajax url="/search/locations" id = "requestNode" handle-as="json"></iron-ajax>
                    <div id="map"></div>
                </div>
            </app-header-layout>
        </app-drawer-layout>
    <script type="text/javascript" src="{{{ asset('/js/storefinder.js') }}}"></script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEciDOD1dKEuR7gGaEAwvqZz5mpzy-TfM&callback=initMap"></script>
    </body>
</html>
