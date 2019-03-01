<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#3f6bc0">
    <link rel="manifest" href="/manifest.json">
    <title>Ministros</title>
    <base href="/">
    <link rel="icon" type="image/x-icon" href="images/icons/icon-72x72.png">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/fonts/feather/style.min.css" rel="stylesheet">
    <link href="assets/fonts/simple-line-icons/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/vendor/pace/themes/black/pace-theme-flash.css"/>
    <style type="text/css">.pace .pace-activity {
            top: 19px;
            right: 19px;
            display: none;
        }

        .page-loading {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            overflow: hidden;
            background: rgba(51, 51, 51, 0.5);
            opacity: 0;
            transition: opacity 1s ease-in-out;
            z-index: -1;
        }

        .loading-icon {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 38px;
            height: 38px;
            margin-left: -19px;
            margin-top: -19px;
        }

        app-root:empty ~ .page-loading {
            opacity: 1;
            z-index: 1;
        }</style>
    <script src="assets/vendor/pace/pace.min.js"></script>
    <script type="text/javascript">(function (window) {
            // Polyfills DOM4 MouseEvent only on IE11
            // Fixes ngx-charts line-chart hover
            // https://developer.mozilla.org/en-US/docs/Web/API/MouseEvent/MouseEvent#Polyfill
            if (!!window.MSInputMethodContext && !!document.documentMode || document.documentMode === 10) {
                function MouseEvent(eventType, params) {
                    params = params || {bubbles: false, cancelable: false};
                    var mouseEvent = document.createEvent('MouseEvent');
                    mouseEvent.initMouseEvent(eventType, params.bubbles, params.cancelable, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

                    return mouseEvent;
                }

                MouseEvent.prototype = Event.prototype;

                window.MouseEvent = MouseEvent;
            }

            // Initialize PACE
            window.paceOptions = {
                document: true,
                eventLag: true,
                restartOnPushState: true,
                restartOnRequestAfter: true,
                ajax: {
                    trackMethods: ['POST', 'GET']
                }
            };
        })(window);</script>
    <link href="styles.f06de696f75adcae0177.bundle.css" rel="stylesheet"/>
</head>
<body>
<div id="bifrostBarSpinner">
    <div class="bifrost-spinner-container"></div>
    <div class="bifrost-spinner-loader">
        <div class="bifrost-spinner-bar1"></div>
        <div class="bifrost-spinner-bar2"></div>
        <div class="bifrost-spinner-bar3"></div>
        <div class="bifrost-spinner-bar4"></div>
        <div class="bifrost-spinner-bar5"></div>
        <div class="bifrost-spinner-bar6"></div>
    </div>
</div>
<app-root></app-root>
<div class="page-loading"><img src="assets/img/oval.svg" class="loading-icon"/></div>
<script type="text/javascript" src="inline.9e404a03bce7a9005f59.bundle.js"></script>
<script type="text/javascript" src="polyfills.6d5b6f625611d8dc4c14.bundle.js"></script>
<script type="text/javascript" src="scripts.f5bcca9042bb3631df57.bundle.js"></script>
<script type="text/javascript" src="main.a01b1e876fd231a9f650.bundle.js"></script>
</body>
</html>