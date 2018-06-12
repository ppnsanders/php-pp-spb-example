'use strict'

angular.module('phpApp').directive('headerNav', [ () => {
	return {
		restrict: 'E',
		scope: {},
		controller: ['$scope', function($scope) {
			$scope.nav = [ 
							{
								url: "/php-pp-spb-example/",
								text: "Home"
							}
						]
		}],
		templateUrl: '/php-pp-spb-example/public/js/partials/header-nav/template.html'
	}
}])