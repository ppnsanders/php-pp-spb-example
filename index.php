<?php
$dirRoot = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/php-pp-spb-example';
$hasher = time();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP SPB Example</title>
                <link rel="stylesheet" href="<?php echo $dirRoot; ?>/public/components/semantic/dist/semantic.min.css">
                <script src="<?php echo $dirRoot; ?>/public/components/jquery/dist/jquery.min.js"></script>
                <script src="<?php echo $dirRoot; ?>/public/components/semantic/dist/semantic.min.js"></script>
                <script src="<?php echo $dirRoot; ?>/public/components/angular/angular.min.js"></script>
                <script src="<?php echo $dirRoot; ?>/public/components/angular-route/angular-route.min.js"></script>
                <script src="<?php echo $dirRoot; ?>/public/components/angular-cookies/angular-cookies.min.js"></script>
                <base href="<?php echo $dirRoot; ?>/">
                <script src="<?php echo $dirRoot; ?>/public/js/app.js?a=<?php echo $hasher; ?>"></script>
	</head>
	<body id="wrapper" ng-app="phpApp">
		<header-nav></header-nav>
		<div style="margin-top: 60px" class="ui main container">
			<cart-page></cart-page>
		</div>
		<footer-nav></footer-nav>

		<!-- Angular Pages -->
                <script src="<?php echo $dirRoot; ?>/public/js/pages/cart-page/directive.js?a=<?php echo $hasher; ?>"></script>
                <script src="<?php echo $dirRoot; ?>/public/js/pages/review-page/directive.js?a=<?php echo $hasher; ?>"></script>

                <!-- Angular Services -->
                <script src="<?php echo $dirRoot; ?>/public/js/pages/cart-page/api.service.js?a=<?php echo $hasher; ?>"></script>
                <script src="<?php echo $dirRoot; ?>/public/js/pages/cart-page/checkout.service.js?a=<?php echo $hasher; ?>"></script>
                <script src="<?php echo $dirRoot; ?>/public/js/pages/review-page/api.service.js?a=<?php echo $hasher; ?>"></script>

                <!-- Angular Partials -->
                <script src="<?php echo $dirRoot; ?>/public/js/partials/header-nav/directive.js?a=<?php echo $hasher; ?>"></script>
                <script src="<?php echo $dirRoot; ?>/public/js/partials/footer-nav/directive.js?a=<?php echo $hasher; ?>"></script>
                <script src="<?php echo $dirRoot; ?>/public/js/partials/segment-loader/directive.js?a=<?php echo $hasher; ?>"></script>
                <script src="<?php echo $dirRoot; ?>/public/js/partials/pp-button/directive.js?a=<?php echo $hasher; ?>"></script>

                <!-- PayPal Checkout.js -->
                <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	</body>
</html>