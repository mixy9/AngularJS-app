app.controller("ctrl_contact", ['$scope', 'svcApi', '$parse', '$http',
    function ($scope, svcApi, $parse, $http) {

        $scope.alertText = "Fill up all the Fields";

        $scope.sendMessage = function (contact) {

            if (angular.isUndefined(contact.name) || contact.email === "") {
                $scope.alertText = "Please input your name";
            }
            else if (angular.isUndefined(contact.email) || contact.email === "") {
                $scope.alertText = "Please input your email";
            }
            else if (angular.isUndefined(contact.text) || contact.text === "") {
                $scope.alertText = "Please write a message";
            }
            else {
                $scope.btnName = "Checking...";

                $http.post('api/objects/contact.php', {
                    user: $scope.user
                })
                .then(function success(e) {

                    $scope.errors = [];

                    $scope.users.push(e.data.user);

                    if (e.status === 200) {
                        $scope.alertText = "Your message has been sent. Thank you!";
                        $scope.logInForm = true;
                    }
                }, function error(e) {
                    $scope.btnName = "Register";
                    $scope.errors = e.data.errors;
                    console.log($scope.errors, 'Errors');

                    if (e.status === 400) {
                        $scope.alertText = "Invalid email format!";
                    }
                    else if (e.status === 500) {
                        $scope.alertText = "Only letters, numbers and underscore allowed!";
                    }
                })
            }
        };

    }]);


