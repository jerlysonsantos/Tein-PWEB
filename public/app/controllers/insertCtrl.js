const insert = angular.module('sa_insert', []);

insert.controller('insertCrtl', ['$scope', '$http', ($scope, $http) => {
    $scope.insert = () => {
        const data = {
            name: $scope.name,
            email: $scope.email,
            age: $scope.age,
        };
        $http.post(
        "clients/insert", data).success((data) => {
            alert(data);
            $scope.name = null;
            $scope.email = null;
            $scope.age = null;
            window.location.href = '/iot/';
        });
    }
}]);
