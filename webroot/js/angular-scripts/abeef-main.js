var app = angular.module('abeef', ['ui.bootstrap'  , 'ngAnimate', 'ngCookies', 'ngFileUpload', 'HttpService']);

app.config(function($controllerProvider, $compileProvider, $filterProvider, $provide) {
  app.register = {
    controller: $controllerProvider.register,
    directive: $compileProvider.directive,
    filter: $filterProvider.register,
    factory: $provide.factory,
    service: $provide.service
  };
});

var urlGlobal = 'http://localhost/abeeftak/';