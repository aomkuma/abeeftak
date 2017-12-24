angular.module('abeef').controller('CowUpdateController', function($scope, $q, $cookies, $filter, $uibModal, HttpService) {
	//console.log('Hello !');
    
    $scope.getCows = function(service, action, obj)
    {
    	HttpService.clientRequest(service, action, obj).then(function(result){
    		//console.log(result.data);
    		if(result.status == 200)
    		{
    			$scope.Cows = result.data;
    			$scope.Cows.birthday = convertDate($scope.Cows.birthday);
                $scope.Cows.import_date = convertDate($scope.Cows.import_date);
                
                // Make Wean Object
                var weanIndex = $filter('FindWean')($scope.Cows.growth_records);
                if(weanIndex != -1)
                {
                    $scope.Wean = $scope.Cows.growth_records[weanIndex];
                }

                // Make BreedingList Object
                $scope.BreedingList = $scope.Cows.breeding_records;

                // Make GivebirthList Object
                $scope.GivebirthList = $scope.Cows.givebirth_records;

                // Make MovementList Object
                $scope.MovementList = $scope.Cows.movement_records;

                // Make TreatmentList Object
                $scope.TreatmentList = $scope.Cows.treatment_records;                

    		}else{
    			alert(result.errorMsg);
    		}
    	});
    }

    $scope.saveCows = function(service, action, obj){
        // obj.birthday = makeSQLDate(obj.birthday);
        // obj.import_date = makeSQLDate(obj.import_date);
        obj.createdby = '1';
        obj.code = 'TAK20170002';
        obj.id = '';
        HttpService.clientRequest(service, action, obj).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }
        });
    }

    $scope.editFertilize = function(data){
        data.age = parseInt(data.age);
        data.total_eating = parseInt(data.total_eating);
        data.record_date = convertDate(data.record_date);
        $scope.Fertilize = data;
        $scope.FertilizeUpdate = true;
    }

    $scope.addFertilize = function(){
        $scope.Fertilize = null;
        $scope.FertilizeUpdate = true;
    }

    $scope.cancelFertilize = function(){
        $scope.Fertilize = null;
        $scope.FertilizeUpdate = false;
    }

    $scope.editBreeder = function(data){
        data.breeding_date = convertDate(data.breeding_date);
        $scope.Breeder = data;
        $scope.BreederUpdate = true;
    }

    $scope.addBreeder = function(){
        $scope.Breeder = null;
        $scope.BreederUpdate = true;
    }

    $scope.cancelBreeder = function(){
        $scope.Breeder = null;
        $scope.BreederUpdate = false;
    }

    $scope.editGivebirth = function(data){
        data.breeding_date = convertDate(data.breeding_date);
        $scope.Givebirth = data;
        $scope.GivebirthUpdate = true;
    }

    $scope.addGivebirth = function(){
        $scope.Givebirth = null;
        $scope.GivebirthUpdate = true;
    }

    $scope.cancelGivebirth = function(){
        $scope.Givebirth = null;
        $scope.GivebirthUpdate = false;
    }

    $scope.editMovement = function(data){
        data.movement_date = convertDate(data.movement_date);
        $scope.Movement = data;
        $scope.MovementUpdate = true;
    }

    $scope.addMovement = function(){
        $scope.Movement = null;
        $scope.MovementUpdate = true;
    }

    $scope.cancelMovement = function(){
        $scope.Movement = null;
        $scope.MovementUpdate = false;
    }

    $scope.editTreatment = function(data){
        data.treatment_date = convertDate(data.treatment_date);
        $scope.Treatment = data;
        $scope.TreatmentUpdate = true;
    }

    $scope.addTreatment = function(){
        $scope.Treatment = null;
        $scope.TreatmentUpdate = true;
    }

    $scope.cancelTreatment = function(){
        $scope.Treatment = null;
        $scope.TreatmentUpdate = false;
    }

	// Loaf all data
    if(cows_id != '')
    {
	   $scope.getCows('cows','loadData',{cows_id : cows_id});
    }
    $scope.FertilizeUpdate = false;
    $scope.BreederUpdate = false;
    $scope.GivebirthUpdate = false;
    $scope.MovementUpdate = false;
    $scope.TreatmentUpdate = false;

})
.controller('ModalDialogCtrl', function ($scope, $uibModalInstance, params) {
    // console.log(params);
    
    $disabledOK = false;
    $scope.ok = function () {
        $uibModalInstance.close('OK');
    };
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

})
.filter('FindWean', function () {
    return function (input) {
        if (input !== undefined && input !== null) {
            var i = 0, len = input.length;
            for (; i < len; i++) {
                //console.log(input[i].UserID, '==' ,val);
                if (input[i].type == 'W') {
                    return i;
                }
            }
            return -1;
        } else {
            return -1;
        }
    };
});

function convertDate(d){
    return new Date(d);   
}

function makeSQLDate(dateObj){
    console.log(dateObj);
    return dateObj.getFullYear() + '-' + (dateObj.getMonth() + 1) + '-' + (dateObj.getDate() < 9?'0'+dateObj.getDate():dateObj.getDate());
}