'use strict'

angular.module('phpApp').directive('cartPage', [ ($cookies) => {
	return {
		restrict: 'E',
		scope: {},
		controller: ['$scope', 'cartPageModel', function ($scope, cartPageModel) {
			$scope.model = cartPageModel
			$scope.model.setup()
		}],
		templateUrl: '/php-pp-spb-example/public/js/pages/cart-page/template.html'
	}
}])