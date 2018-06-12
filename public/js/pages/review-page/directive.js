'use strict'

angular.module('phpApp').directive('reviewPage', [ () => {
	return {
		restrict: 'E',
		scope: {},
		controller: ['$scope', 'reviewPageModel', function ($scope, reviewPageModel) {
			$scope.model = reviewPageModel
			$scope.model.setup()
		}],
		templateUrl: '/php-pp-spb-example/public/js/pages/review-page/template.html'
	}
}])