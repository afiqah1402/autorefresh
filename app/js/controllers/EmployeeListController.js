app.controller("EmployeeListController", ['$scope', '$interval', 'EmployeeService', 
    function($scope, $interval, EmployeeService){
        $scope.moreDetails = {};
        $scope.toggleMore = function(index){
            if(!$scope.moreDetails[index]){
                $scope.moreDetails[index] = {};
            }
            $scope.moreDetails[index].less = ! $scope.moreDetails[index].less;
            $scope.moreDetails[index].moreLabel = $scope.moreDetails[index].less ? "Close" : "More";
        }

        EmployeeService.getAllEmployee().then(function(response){
            $scope.employees = response.data;
        });

        $interval(function(){
            EmployeeService.getAllEmployee().then(function(response){
                $scope.employees = response.data;
            });
        }, 5000);
}]);