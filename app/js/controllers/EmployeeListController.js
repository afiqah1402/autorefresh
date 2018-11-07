app.controller("EmployeeListController", ['$scope', '$http', 'EmployeeService', 
    function($scope, $http, EmployeeService){

        EmployeeService.getAllEmployee().then(function(response){
            console.log(response.data);
            $scope.employees = response.data;
        });
        // console.log(EmployeeService.dataPool["empList"]);
}]);