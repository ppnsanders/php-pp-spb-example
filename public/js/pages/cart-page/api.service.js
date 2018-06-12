'use strict'

angular.module('phpApp').service('cartPageModel', function ($http, $cookies, $location) {

	function setup() {
		model.getItems()
		$('#consumerCartMain').show()
	}

	function getItems() {
		const reqUrl = $location.protocol() + '://' + $location.host() + ':' + $location.port() + '/php-pp-spb-example/api/cart/index.php/items/2'
		return $http.get(reqUrl).then((response) => {
			if(response.error) {
				console.log('Error: ', response)
			} else {
				response.data.forEach((item) => {
					model.items.push(JSON.parse(item))
				})
				$cookies.remove('cart-cookie')
				model.cookieSetup()
			}
		})
	}

	function cookieSetup() {
			model.cart = {}
			model.cart.items = []
			model.cart.total = 0.00
			$cookies.putObject('cart-cookie', model.cart)
	}

	function cookieDestroy() {
		$cookies.remove('cart-cookie')
		model.cookieSetup()
	}

	function addToCart(item) {
		$('#emptyCartAlert').hide()
		$('#minicart').show()
		$('#' + item.sku).prop('disabled', true)
		model.cart.items.push(item)
		let curTotal = model.cart.total
		model.cart.total = (item.price * item.quantity) + curTotal
		$cookies.putObject('cart-cookie', model.cart)
	}

	function removeItem(index) {
		model.cart.total = model.cart.total - (model.cart.items[index[0][0]].price * model.cart.items[index[0][0]].quantity)
		$('#' + model.cart.items[index[0][0]].sku).prop('disabled', false)
		model.cart.items.splice(index[0][0], 1)
		$cookies.putObject('cart-cookie', model.cart)
	}

	function clearCart() {
		model.cookieDestroy()
	}


	let model = {
		items: [],
		cart: { items: [], total: 0.00 },
		getItems: function (model) {
			return getItems(model)
		},
		addToCart: function (model) {
			return addToCart(model)
		},
		removeItem: function (model) {
			return removeItem(model)
		},
		cookieSetup: function (model) {
			return cookieSetup(model)
		},
		cookieDestroy: function (model) {
			return cookieDestroy(model)
		},
		clearCart: function (model) {
			return clearCart(model)
		},
		setup: function (model) {
			return setup(model)
		}
	}

return model

})