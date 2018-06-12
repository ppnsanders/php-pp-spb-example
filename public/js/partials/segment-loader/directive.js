'use strict'

angular.module('phpApp').directive('segmentLoader', [ () => {
	return {
		restrict: 'E',
		scope: {},
		controller: ['$scope', function($scope) {

		}],
		templateUrl: '/php-pp-spb-example/public/js/partials/segment-loader/template.html'
	}
}])