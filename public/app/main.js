const app = angular.module('app', ['select',
  'sa_insert',
  'ngRoute']);




app.config(['$routeProvider', '$locationProvider', ($routeProvider, $locationProvider) => {
  $locationProvider.html5Mode({
    enabled: true,
    requireBase: false,
  });

  $routeProvider
    .when('/', {
      templateUrl: 'app/views/home.html',
      controller: 'MainCtrl',
    })
    .otherwise({ redirectTo: '/' });
}]);

app.controller('MainCtrl', ['$rootScope', '$location', ($rootScope, $location) => {
  $rootScope.activetab = $location.path();
}]);

angular.bootstrap(document.getElementById('app'), ['select', 'sa_insert']);
