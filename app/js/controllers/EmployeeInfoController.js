app.controller("EmployeeInfoController", ['$scope', '$http', '$interval', 'EmployeeService', 
    function($scope, $http, $interval, EmployeeService){
        $scope.showOrHide = "Show";
        $scope.showEmpDetails = false;

        $scope.showOrHideDetails = function(){
            var currShowOrHide = $scope.showEmpDetails;
            $scope.showOrHide = currShowOrHide ? "Show" : "Hide";
            $scope.showEmpDetails = currShowOrHide ? false : true;
        }

        EmployeeService.getEmployeeDetails(empId).then(function(response){
            $scope.employee = response.data;
        });

        $interval(function(){
            EmployeeService.getEmployeeDetails(empId).then(function(response){
                $scope.employee = response.data;
            });
        }, 5000);
}]);