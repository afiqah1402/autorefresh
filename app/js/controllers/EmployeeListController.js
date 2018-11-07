app.controller("EmployeeListController", ['$scope', '$rootScope', 'EmployeeService', 'ConnectionService',
    function($scope, $rootScope, EmployeeService, ConnectionService){
        $scope.moreDetails = {};
        $scope.toggleMore = function(index){
            if(!$scope.moreDetails[index]){
                $scope.moreDetails[index] = {};
            }
            $scope.moreDetails[index].less = ! $scope.moreDetails[index].less;
            $scope.moreDetails[index].moreLabel = $scope.moreDetails[index].less ? "Close" : "More";
        }

        $scope.getEmpData = function(){
            EmployeeService.getAllEmployee().then(function(response){
                $scope.employees = response.data;
            });
        }
        
        /*============================Websocket============================ */
        $rootScope.dataUpdated = false;
        ConnectionService.connection(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

        $rootScope.$watch('dataUpdated', function() {
            console.log($rootScope.dataUpdated);
            if($rootScope.dataUpdated){
                $scope.getEmpData();
                $rootScope.dataUpdated = false;
            }
        });
        /*============================Websocket============================ */
}]);