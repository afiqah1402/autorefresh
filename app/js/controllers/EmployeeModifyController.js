app.controller("EmployeeModifyController", ['$scope', '$http', '$mdToast', 'EmployeeService', 'ConnectionService',
    function($scope, $http, $mdToast, EmployeeService, ConnectionService){

        ConnectionService.connection(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

        if(mode == 'edit'){
            EmployeeService.getEmployeeDetails(empId).then(function(response){
                $scope.emp = response.data;
                $scope.emp["salary"] = parseFloat($scope.emp["salary"]);
            });
        }

        $scope.submit = function(){
            if(mode == 'add'){
                EmployeeService.addEmployee($scope.emp).then(function(response){
                    // $scope.employee = response.data;
                    // console.log(17, response);
                    $scope.msg = response.data;

                    $mdToast.show({
                        hideDelay   : 3000,
                        position    : 'top right',
                        controller  : 'ToastCtrl',
                        templateUrl : 'toast-template.html',
                        locals      : {
                            param    : $scope.msg
                        }
                    });
                });
            }else if(mode == 'edit'){
                EmployeeService.editEmployeeDetails($scope.emp).then(function(response){
                    // $scope.employee = response.data;
                    // console.log(23, response);
                    $scope.msg = response.data;

                    $mdToast.show({
                        hideDelay   : 3000,
                        position    : 'top right',
                        controller  : 'ToastCtrl',
                        templateUrl : 'toast-template.html',
                        locals      : {
                            param    : $scope.msg
                        }
                    });

                    var typeData = { broadType : Broadcast.POST, data : $scope.emp};
                    ConnectionService.updateData(typeData);
                });
            }
        }
}]);

app.controller("ToastCtrl", ['$scope', '$mdToast', '$mdDialog', 'param', 
    function($scope, $mdToast, $mdDialog, param){
        $scope.msg = param["msg"];

        $scope.closeToast = function() {
            if (isDlgOpen) return;
    
            $mdToast
              .hide()
              .then(function() {
                isDlgOpen = false;
              });
          };
    
          $scope.openMoreInfo = function(e) {
            if ( isDlgOpen ) return;
            isDlgOpen = true;
    
            $mdDialog
              .show($mdDialog
                .alert()
                .title('More info goes here.')
                .textContent('Something witty.')
                .ariaLabel('More info')
                .ok('Got it')
                .targetEvent(e)
              )
              .then(function() {
                isDlgOpen = false;
              });
          };
}]);