app.factory('ConnectionService', ['$rootScope', function($rootScope){
    var connectionService = {
        employeeData: {},
        getUpdatedEmployee: function(){
            return this.employeeData;
        },
        connection: function(url){
            this.open = false;

            this.socket = new WebSocket("ws://" + url);
            this.setupConnectionEvents();
        },
        setupConnectionEvents : function () {
            var self = this;

            self.socket.onopen = function(evt) { self.connectionOpen(evt); };
            self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
            self.socket.onclose = function(evt) { self.connectionClose(evt); };

            console.log(16, self);
        },

        connectionOpen : function(evt){
            this.open = true;
            this.addSystemMessage("Connected");
        },
        connectionMessage : function(evt){
            var data = JSON.parse(evt.data);
             
            this.addUpdatedData(data.msg);
        },
        connectionClose : function(evt){
            this.open = false;
            this.addSystemMessage("Disconnected");
        },

        updateData : function(message){
            
            this.socket.send(JSON.stringify({
                msg : message
            }));
        },

        addUpdatedData : function(data){
            
            $rootScope.$apply(function() {
                $rootScope.dataUpdated = true;
                $rootScope.cache.updatedData = data.data;
            });
            
            // this.employeeData = data.data;
            // console.log(51, this.employeeData);
            // console.log(52, data);

            // switch(data.broadType){
            //     case Broadcast.POST : this.addNewPost(data); break;
            //     default : console.log("nothing to do");
            // }

            // EmployeeService.getEmployeeDetails(empId).then(function(response){
            //     $scope.employee = response.data;
            // });
        },

        // addNewPost : function(data){
            
        //     var newPost = data.data;
            
        //     var appElement = document.querySelector('[ng-app=AutorefreshApp]');
        //     var $rootScope = angular.element(appElement).scope();

        //     $rootScope.$apply(function() {
        //         $rootScope.posts.unshift(newPost);
        //     });
        // },

        addSystemMessage : function(msg){
            console.log(63, msg);
        }
    }

    return connectionService;
}]);