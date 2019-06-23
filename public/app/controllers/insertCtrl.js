const insert = angular.module('sa_insert', []);

insert.controller('insertCrtl', ['$scope', '$http', ($scope, $http) => {
    $scope.insert = () => {
        const data = {
            name: $scope.name,
            gender: $scope.gender,
            age: $scope.age,
            email: $scope.email,
            phone: $scope.phone,
            organization: $scope.organization,
        };
        $http.post(
        "clients/insert", data).success((data) => {
            alert(data);
            $scope.name = null;
            $scope.email = null;
            $scope.age = null;
            $scope.gender = null;
            $scope.phone = null;
            $scope.organization = null;

            window.location.href = '/';
        });
    }
}]);
