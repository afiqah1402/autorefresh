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

        addUpdatedData : function(msg){
            
            $rootScope.$apply(function() {
                $rootScope.dataUpdated = true;
            });
        },

        addSystemMessage : function(msg){
            console.log(63, msg);
        }
    }

    return connectionService;
}]);