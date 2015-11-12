var app = angular.module('TechTrader', []);

app.controller('ProductController', function($scope, $http) {
    $scope.products = [];

    var getProducts = $http.get('/products').success(function(response) {
        var i,chunk = 3;

        angular.forEach(response, function (value, key) {
            value.published = new Date(value.created_at).getTime();
        });

        for (i = 0; i < response.length; i += chunk) {
            $scope.products.push(response.slice(i,i+chunk));
        }

    });

});

app.controller('UserProductController', function($scope, $http) {
    $scope.products = [];

    var getProducts = $http.get('/user/products').success(function(response) {
        var i,chunk = 3;

        angular.forEach(response, function (value, key) {
            value.published = new Date(value.created_at).getTime();
        });

        for (i = 0; i < response.length; i += chunk) {
            $scope.products.push(response.slice(i,i+chunk));
        }
    });
});