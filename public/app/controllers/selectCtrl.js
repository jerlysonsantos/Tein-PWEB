const select = angular.module('select', ['ui.bootstrap', 'sa_insert']);

select.filter('beginning_data', () => {
        return (input, begin) => {
            if (input) {
               begin = +begin;
               return input.slice(begin);
            }
            return [];
         }
});

select.config(($interpolateProvider) => {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

select.controller('controller', ['$scope', '$http', '$timeout', ($scope, $http, $timeout) => {
     $http.get('clients/index')
     .success((user_data) => {
          $scope.file = user_data.data;
          $scope.current_grid = 1;
          $scope.data_limit = 10;
          $scope.filter_data = $scope.file.length;
          $scope.entire_user = $scope.file.length;
          $scope.show_data();
     });

     $scope.page_position = (page_number) => {
          $scope.current_grid = page_number;
     };

     $scope.filter = () => {
          $timeout(() => {
              $scope.filter_data = $scope.searched.length;
          }, 20);
     };

     $scope.sort_with = (base) => {
         $scope.base = base;
         $scope.reverse = !$scope.reverse;
     };

    $scope.show_data = () => {
        $http.get("clients/index")
            .success((user_data) => {
                $scope.names = user_data.data;
            });
    };

   $scope.update_data = (id) => {
        const dados = {
            name: $(`#${id} :input`).eq(0).val(),
            gender: $(`#${id} :input`).eq(1).val(),
            age: $(`#${id} :input`).eq(2).val(),
            email: $(`#${id} :input`).eq(3).val(),
            phone: $(`#${id} :input`).eq(4).val(),
            organization: $(`#${id} :input`).eq(5).val(),
        };
        $http.post(`clients/update/${id}`, dados)
            .success((data) => {
                alert(data);
                $scope.show_data();
        });
    }


    $scope.delete_data = (id) => {
        if (confirm("Voc\u00EA quer realmente excluir?")) {
            $http.get(`clients/destroy/${id}`)
            .success((response) => {
                alert(response);
                $http.get('clients/index').success((user_data) => {
                        $scope.file = user_data.data;
                        $scope.current_grid = 1;
                        $scope.data_limit = 10;
                        $scope.filter_data = $scope.file.length;
                        $scope.entire_user = $scope.file.length;
                        $scope.show_data();
                });

                $scope.page_position = (page_number) => {
                        $scope.current_grid = page_number;
                };

                $scope.filter = () => {
                        $timeout(() => {
                            $scope.filter_data = $scope.searched.length;
                        }, 20);
                };

                $scope.sort_with = (base) => {
                    $scope.base = base;
                    $scope.reverse = !$scope.reverse;
                };


                $scope.show_data();
            });
        } else {
            return false;
        }

	 };
}]);
