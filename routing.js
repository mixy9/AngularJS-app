
app.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('welcome', {
            url: '/welcome',
            templateUrl: 'pages/welcome/welcome.html',
            controller: 'ctrl_welcome'
        })
        .state('service', {
            url: '/service',
            templateUrl: 'pages/service/service.html',
            controller: 'ctrl_service'
        })
        .state('contact', {
            url: '/contact',
            templateUrl: 'pages/contact/contact.html',
            controller: 'ctrl_contact'
        });
    $urlRouterProvider.otherwise('/welcome');
}]);