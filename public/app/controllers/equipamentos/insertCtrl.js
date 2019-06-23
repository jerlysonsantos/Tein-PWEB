const insert = angular.module('sa_insert', []);

insert.controller('insertCrtl', ['$scope', '$http', ($scope, $http) => {
    $scope.insert = () => {
        const data = {
            name: $scope.name,
            type: $scope.type,
            location: $scope.location,
        };
        $http.post(
        "equips/insert", data).success((data) => {
            alert(data);
            $scope.name = null;
            $scope.type = null;
            $scope.location = null;
            window.location.href = '/equipamentos';
        }).error((response) => {
            alert(response);
        });
    }
}]);
