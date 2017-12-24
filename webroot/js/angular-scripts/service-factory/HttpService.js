angular.module('HttpService',[]).factory('HttpService', ['$http', '$q', 'Upload', function($http, $q, Upload){
	return {
         
		clientRequest : function(service, action, obj) {
			// console.log(urlGlobal + '/' + service + '/' + action);
			return $http.post( urlGlobal + '/' + service + '/' + action , obj )
    		.then(function(response){
    			// console.log(response);
    			return {'status':response.status, 'data':response.data};
            }, 
            function(errResponse){
            	// console.log(errResponse);
                return {'status':errResponse.status, 'errorMsg' : errResponse.statusText};
            }
	    	);
	    },

        uploadRequest : function(service, action, obj) {
            // console.log(service, action);
            Upload.upload({
                url: urlGlobal + '/' + service + '/' + action,
                data: { 'uploadObj' : obj }
            }).then(function (response) {
                return {'status':response.status, 'data':response.data};
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
            });
        },        

	} 

}]);