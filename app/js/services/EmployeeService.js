app.factory('EmployeeService', ['$http', '$q', function($http, $q){
    var httpConfig = {
        headers : {
            'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
        }
    }
    var employeeService = {
        baseUrl: function(){
            console.log(4, baseUrl);
        },
        dataPool: {
            "empList": [],
            "empInfo": {}
        },
        getAllEmployee: function(){
            return $http.get(baseUrl+"public/employee/all");
        },
        getEmployeeDetails: function(empId){
            return $http.get(baseUrl+"public/employee/one?empId="+empId);
        },
        editEmployeeDetails: function(emp){
            console.log("service line 17", emp);
            return $http.post(baseUrl+"public/employee/update", emp);
        },
        addEmployee: function(emp){
            console.log("service line 21", emp);
            return $http.post(baseUrl+"public/employee/insert", emp);
        }//,
        // getAllEmployee: function(){
        //     let dataPool = this.dataPool;
        //     let promise = $q(function(resolve,reject){
        //         return $http.get(baseUrl+"public/employee/all")
        //         .then(function(response){
        //             dataPool["empList"] = response.data;
        //             resolve (response.data);
        //         },
        //         function(httpError){
        //            reject ({"error":httpError.status,"data":httpError.data});
        //         });
        //     })
        //     return promise;
        // }
    }

    return employeeService;
}]);