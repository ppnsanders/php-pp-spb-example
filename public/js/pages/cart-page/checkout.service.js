'use strict'

angular.module('phpApp').service('checkoutServiceModel', function ($http, $cookies, $location) {

	function setup() {
		model.cart = $cookies.getObject('cart-cookie')
	}

	function checkCart() {
		if(typeof model.cart.items == 'undefined') {
			$('#emptyCartAlert').show()
			return { error: true }
		} else {
			return { error: false }
		}
	}

	function createPayment() {
		model.cart = $cookies.getObject('cart-cookie')
		const reqUrl = $location.protocol() + '://' + $location.host() + ':' + $location.port() + '/php-pp-spb-example/api/paypal/index.php/create'
		const config = {
            'xsrfHeaderName': 'X-CSRF-TOKEN',
            'xsrfCookieName': 'XSRF-TOKEN'
        }
        const reqData = JSON.stringify(model.cart)
        return $http.post(reqUrl, reqData, config).then((response) => {
        	model.paymentResponse = response.data
        	return model.paymentResponse
        })
	}

	let model = {
		cart: {},
		paymentResponse: {},
		createPayment: (model) => {
			return createPayment(model)
		},
		setup: (model) => {
			return setup(model)
		},
		checkCart: (model) => {
			return checkCart(model)
		}
	}

	return model
})
