app.controller("EmployeeListController", ['$scope', 'EmployeeService',
    function($scope, EmployeeService){
        // ConnectionService.connection("192.168.0.139:2000");

        EmployeeService.getAllEmployee().then(function(response){
            console.log(response.data);
            $scope.employees = response.data;
        });
        // console.log(EmployeeService.dataPool["empList"]);
}]);