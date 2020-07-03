app.controller("ctrl_service", ['$scope', 'svcApi', '$parse', '$http',
    function ($scope, svcApi, $parse, $http) {

        $scope.str_series_type = Globalize.localize("str_series_type");
        $scope.str_interval = Globalize.localize("str_interval");
        $scope.str_interval_type = Globalize.localize("str_interval_type");

        $scope.employees = [];

        $scope.listTasks = function () {
            $http.get('api/objects/list.php', {})
            .then(function success(e) {
                $scope.employees = e.data.employees;
                console.log($scope.employees, 'Employees');
                }, function error(e) {
            });
        };

        $scope.listTasks();

        $scope.addTask = function () {
            $http.post('api/objects/create.php', {
                employee: $scope.employee
            })
            .then(function success(e) {

                $scope.errors = [];
                $scope.employees.push(e.data.employee);

                // var modal_element = angular.element('#add_new_task_modal');
                // modal_element.modal('hide');
                // modal_element.modal('show');

                }, function error(e) {
                    $scope.errors = e.data.errors;
            });
        };

        $scope.EditTask = function (index) {
            $scope.employee_details = $scope.employees[index];
        };

        $scope.cancelTask = function () {
            $scope.listTasks();
        };

        $scope.updateTask = function () {
            $http.post('api/objects/update.php', {
                employee: $scope.employee_details
            })
                .then(function success(e) {

                    $scope.errors = [];

                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        };

        $scope.DeleteTask = function (index) {
            var conf = confirm("Do you really want to delete task?");

            if (conf === true) {
                $http.post('api/objects/delete.php', {
                    employee: $scope.employees[index]
                })
                .then(function success() {

                    $scope.errors = [];
                    $scope.employees.splice(index, 1);

                    }, function error(e) {
                        $scope.errors = e.data.errors;
                });
            }
        };

    }]);


