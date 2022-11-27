var app = angular.module('confNavApp',[]);
var loginControler = app.controller('loginCntrl',function($scope,$http,$rootScope){
    $scope.loginData={};
    $scope.alertClass="alert-danger";
    $scope.alertMessage="email req,pass invalid";
    $scope.closeMsg=function(){
            $rootScope.alertMsg=false;
        }
    $rootScope.loginForm=true;
    $scope.submitLogin=function(){
        
        }
    $scope.showRegister=function(){
            $rootScope.loginForm=false;
            $rootScope.registerForm=true;
            $rootScope.alertMsg=false;
        }
    });
var registerControler=app.controller('registerCntrl',function($scope,$http,$rootScope){
    $rootScope.registerForm=false;     
    $scope.submitRegister=function(){
            $http({
                method:"POST",
                url:"http://localhost/miniProject/Register.php",
                data:$scope.registerData
            }).success(function(res){
                console.log(res);
            })
        }
    $scope.registerData={};
    $scope.showLogin=function(){
            $rootScope.registerForm=false;
            $rootScope.loginForm=true;
            $rootScope.alertMsg=false;
        }
    });