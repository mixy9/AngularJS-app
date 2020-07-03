app.controller("ctrl_welcome", ['$scope', '$http', '$window', '$location', function ($scope, $http, $location) {


    $scope.str_series_type = Globalize.localize("str_series_type");
    $scope.str_interval = Globalize.localize("str_interval");
    $scope.str_interval_type = Globalize.localize("str_interval_type");

    $scope.alert = "alert alert-success";
    $scope.alertText = "Fill up all the Fields";
    $scope.btnName = "Register";

    $scope.logInForm = false;
    $scope.registerForm = true;

    $scope.faq1 = false;
    $scope.faq2 = false;
    $scope.faq3 = false;
    $scope.faq4 = false;

    $scope.users = [];

    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $http.get('api/objects/User.Class.php', {})
        .then(function success(e) {
            $scope.users = e.data.user;
            console.log($scope.users, 'Users');
        }, function error(e) {
        });

    $scope.register = function (user) {
        $scope.btnName = "Register";

        if (angular.isUndefined(user.email) || user.email === "") {
            $scope.alertText = "Please input email";
        }
        else if (angular.isUndefined(user.firstname) || user.firstname === "") {
            $scope.alertText = "Please input firstname";
        }
        else if (angular.isUndefined(user.lastname) || user.lastname === "") {
            $scope.alertText = "Please input lastname";
        }
        else if (angular.isUndefined(user.username) || user.username === "") {
            $scope.alertText = "Please input username";
        }
        else if (angular.isUndefined(user.password) || user.password === "") {
            $scope.alertText = "Please input password";
        }
        else if (user.password !== $scope.repassword) {
            $scope.alertText = "Password didn't match";
        }
        else {
            $scope.btnName = "Checking...";

            $http.post('api/objects/register.php', {
                user: $scope.user
            })
                .then(function success(e) {
                    $scope.btnName = "Register";

                    $scope.errors = [];

                    $scope.users.push(e.data.user);

                    if (e.status === 200) {
                        $scope.alertText = "Registration Successful";
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

    $scope.logIn = function (user) {

        if (angular.isUndefined(user.username) || user.username === "") {
            $scope.alertText = "Please input Username";
        }
        else if (angular.isUndefined(user.password) || user.password === "") {
            $scope.alertText = "Please input Password";
        }
        else {
            $scope.btnName = "Checking...";

            $http.post(
                "api/objects/login.php", {
                    'username': user.username,
                    'password': user.password
                }).then(function success(e) {

                $scope.btnName = "Log in";

                $scope.errors = [];

                if (e.status === 200) {
                    $scope.alertText = "Login Successful";
                    $location.path('/service');
                }

            }, function error(e) {
                $scope.btnName = "Sign in";
                $scope.errors = e.data.errors;
                console.log($scope.errors, 'Errors');

                if (e.status === 500) {
                    $scope.alertText = "Login Failed. Wrong username or password!";
                }
            });
        }
    };

    $scope.signIn = function () {
        $scope.logInForm = true;
    };

    $scope.signUp = function () {
        $scope.logInForm = false;
        $scope.registerForm = true;
    };

    $scope.enter = function (keyEvent) {
        if (keyEvent.which === 13) {
            register();
        }
    };

    $scope.enter = function (keyEvent) {
        if (keyEvent.which === 13) {
            register();
        }
    };

}]);


