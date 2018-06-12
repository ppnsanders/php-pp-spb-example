'use strict'

angular.module('phpApp').directive('footerNav', [ () => {
	return {
		restrict: 'E',
		scope: {},
		controller: ['$scope', function ($scope) {
		}],
		templateUrl: '/php-pp-spb-example/public/js/partials/footer-nav/template.html'
	}
}])