
app.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('welcome', {
            url: '/welcome',
            templateUrl: 'pages/welcome/welcome.html',
            controller: 'ctrl_welcome'
        })
        .state('contact', {
            url: '/contact',
            templateUrl: 'pages/contact/contact.html',
            controller: 'ctrl_contact'
        })
        .state('service', {
            url: '/service',
            templateUrl: 'pages/service/service.html',
            controller: 'ctrl_service'
        });
    $urlRouterProvider.otherwise('/welcome');
}]);