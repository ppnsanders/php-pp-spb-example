'use strict'

angular.module('phpApp').directive('ppButton', [ () => {
	return {
		restrict: 'E',
		scope: {
			token: '@'
		},
		controller: ['$scope', '$cookies', '$location', 'checkoutServiceModel', function ($scope, $cookies, $location, checkoutServiceModel) {
			$scope.model = checkoutServiceModel
			$scope.model.setup()
			$scope.env = 'sandbox'
			$scope.commit = false
			$scope.style = {
					layout: 'vertical',
			        color: 'blue',
			        size: 'large',
			        shape: 'rect'
			}
			$scope.funding = {
				allowed: [],
				disallowed: [ paypal.FUNDING.CREDIT, paypal.FUNDING.CARD ]
			}
			$scope.payment = function () {
				return new paypal.Promise((resolve, reject) => {
					const cartError = $scope.checkCart()
					if(cartError === true) {
						$scope.model.createPayment().then((res) => {
							resolve(res.id)
						})
					} else {
						reject({error: 'no items in cart'})
					}
				}) 
			}
			$scope.onAuthorize = function(data, actions) {
				$cookies.putObject('on-authorize-data', data)
				$('#consumerCartMain').hide()
				$location.path('/order/review')
			}
			$scope.onCancel = function(data) {
				$cookies.putObject('on-cancel-data', data)
				$location.path('/cart')
			}
			$scope.onError = function(data) {
				$cookies.putObject('on-error-data', data)
				$location.path('/cart')
			}
			$scope.checkCart = () => {
				const cartData = $cookies.getObject('cart-cookie')
				if(cartData.items.length <= 0) {
					$('#emptyCartAlert').show()
					return false
				} else {
					return true
				}
			}
		}],
		templateUrl: '/php-pp-spb-example/public/js/partials/pp-button/template.html'
	}
}])