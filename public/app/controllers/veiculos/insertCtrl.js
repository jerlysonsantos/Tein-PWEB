const insert = angular.module('sa_insert', []);

insert.controller('insertCrtl', ['$scope', '$http', ($scope, $http) => {
    $scope.insert = () => {
        const data = {
            mark: $scope.mark,
            model: $scope.model,
            licensePlate: $scope.licensePlate,
            carOwnName: $scope.carOwnName,
        };
        $http.post(
        "vehicles/insert", data).success((data) => {
            alert(data);
            $scope.mark = null;
            $scope.model = null;
            $scope.licensePlate = null;
            $scope.carOwnName = null;
            window.location.href = '/veiculos';
        }).error((response) => {
            alert(response);
        });
    }
}]);
