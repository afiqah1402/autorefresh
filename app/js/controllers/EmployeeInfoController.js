app.controller("EmployeeInfoController", ['$scope', '$http', '$interval', '$rootScope', 'EmployeeService', 'ConnectionService',
    function($scope, $http, $interval, $rootScope, EmployeeService, ConnectionService){
        $rootScope.dataUpdated = false;
        $rootScope.cache = {
            "updatedData": {}
        };
        ConnectionService.connection(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

        $scope.showOrHide = "Show";
        $scope.showEmpDetails = false;

        $scope.showOrHideDetails = function(){
            var currShowOrHide = $scope.showEmpDetails;
            $scope.showOrHide = currShowOrHide ? "Show" : "Hide";
            $scope.showEmpDetails = currShowOrHide ? false : true;
        }

        $scope.getEmpData = function(){
            EmployeeService.getEmployeeDetails(empId).then(function(response){
                $scope.employee = response.data;
            });
        }

        $rootScope.$watch('dataUpdated', function() {
            if($rootScope.dataUpdated){
                $scope.employee = $rootScope.cache.updatedData;
                console.log(25, "data is updated", $rootScope.cache);
                $rootScope.dataUpdated = false;
            }
        });

        // $scope.getEmpData();

        // $interval(function(){
        //     EmployeeService.getEmployeeDetails(empId).then(function(response){
        //         $scope.employee = response.data;
        //     });
        // }, 5000);
}]);