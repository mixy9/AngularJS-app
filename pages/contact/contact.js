app.controller("ctrl_careers", ['$scope', 'svcApi', '$parse', '$http',
    function ($scope, svcApi, $parse, $http) {

        // localisation
        $scope.str_series_type = Globalize.localize("str_series_type");
        $scope.str_interval = Globalize.localize("str_interval");
        $scope.str_interval_type = Globalize.localize("str_interval_type");


    }]);


