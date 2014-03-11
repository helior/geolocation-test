<?php
    /**
     * Copy+pasta from http://roshanbh.com.np/2007/12/getting-real-ip-address-in-php.html
     */
    function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //to check ip is pass from proxy
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
          $ip=$_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>geolocation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/favicon.ico">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- build:css styles/vendor.css -->
        <!-- bower:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- endbower -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- endbuild -->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="styles/main.css">
        <!-- endbuild -->
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <!-- <li class="active"><a href="#">Home</a></li> -->
                </ul>
                <h3 class="text-muted text-center">Geolocation detection mechanisms</h3>
            </div>

            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-heading bg-primary">
                            <h3 class="panel-title">Browser Geolocation</h3>
                          </div>
                          <div class="panel-body browser-geolocation">
                            <p><i class="fa fa-spinner fa-spin"></i></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">ESI (Akamai) Geolocation</h3>
                          </div>
                          <div class="panel-body">
                            <dl>
                                <!-- http://esi-examples.akamai.com/geo.html -->
                                <dt>IP address</dt>
                                <!-- Akamai-specific variable -->
                                <dd>
                                    <!--esi
                                    <esi:vars>$(REMOTE_ADDR)</esi:vars>
                                    -->
                                </dd>
                                <dt>Lat/Long</dt>
                                <dd>
                                    <!-- Akamai-specific variable; requires enabling an option in EdgeSuite Configurations. Only available if subscribed to EdgeScape or EdgeScape Pro :/ -->
                                    <!--esi
                                    <esi:choose>
                                        <esi:when test="$(GEO{'lat'}) & $(GEO{'lat'})">
                                            <esi:vars>$(GEO{'lat'}), $(GEO{'long'})</esi:vars>
                                        </esi:when>
                                    </esi:choose>
                                    -->
                                </dd>
                                <dt>Zipcode</dt>
                                <dd>
                                    <!--esi
                                    <esi:choose>
                                        <esi:when test="$(GEO{'zip'})">
                                            <esi:vars>$(GEO{'zip'})</esi:vars>
                                        </esi:when>
                                    </esi:choose>
                                    -->
                                </dd>
                            </dl>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Server IP address detection</h3>
                          </div>
                          <div class="panel-body">
                            <p><?php print getRealIpAddr(); ?></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Timezone approximation</h3>
                          </div>
                          <div class="panel-body">
                            <dl>
                                <dt>ESI Timezone</dt>
                                <dd>
                                    <!--esi
                                    <esi:choose>
                                        <esi:when test="$(GEO{'timezone'})">
                                            <esi:vars name="$(GEO{'timezone'})" />
                                        </esi:when>
                                    </esi:choose>
                                    -->
                                </dd>
                                <dt>Browser timezone</dt>
                                <dd class="browser-timezone"></dd>
                            </dl>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- build:js scripts/vendor.js -->
        <!-- bower:js -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <!-- endbower -->
        <!-- endbuild -->

        <!-- build:js scripts/plugins.js -->
        <script src="bower_components/jstimezonedetect/jstz.js"></script>
        <!-- endbuild -->

        <!-- build:js({app,.tmp}) scripts/main.js -->
        <script src="scripts/main.js"></script>
        <!-- endbuild -->
</body>
</html>
