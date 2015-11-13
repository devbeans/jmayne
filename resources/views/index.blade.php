
<!DOCTYPE html>
<html lang="en" ng-app="mayneApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>jMayne v1.0</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/plugins/datepicker/angular-datepicker.min.css"/>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="#/">Calibrate</a></li>
                <li role="presentation"><a href="#/predictions">Predictions</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">jMayne</h3>
    </div>

    <div ng-view></div>

    <footer class="footer">
        <p>&copy; Cocorium 2015</p>
    </footer>

</div> <!-- /container -->


<script src="/assets/js/angular.min.js"></script>
<script type="text/javascript" src="https://code.angularjs.org/1.4.7/angular-route.min.js"></script>
<script type="text/javascript" src="/assets/plugins/datepicker/angular-datepicker.min.js"></script>

<script type="text/javascript" src="app.js"></script>
<script type="text/javascript" src="components/spending/spendingController.js"></script>
<script type="text/javascript" src="components/prediction/predictionController.js"></script>


</body>
</html>
