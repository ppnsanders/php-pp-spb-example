'use strict'

//we must set the startSymbol and endSymbol to '[[' and ']]'.

angular.module('phpApp', ['ngRoute', 'ngCookies', 'paypal-button'])
.config(['$interpolateProvider', '$cookiesProvider', '$routeProvider', '$locationProvider', ($interpolateProvider, $cookiesProvider, $routeProvider, $locationProvider) => {
    $interpolateProvider
        .startSymbol('[[');
    $interpolateProvider
        .endSymbol(']]');
    $cookiesProvider.defaults.path = '/';
    $cookiesProvider.defaults.secure = false;
    $locationProvider.html5Mode(true).hashPrefix('!');
    $routeProvider
        .when('/cart', {
            template: '<cart-page></cart-page>'
        })
        .when('/order/review', {
            template: '<review-page></review-page>'
        })
}])