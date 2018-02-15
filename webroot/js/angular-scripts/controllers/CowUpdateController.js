angular.module('abeef').controller('CowUpdateController', function($scope, $q, $cookies, $filter, $uibModal, HttpService, Upload) {
	//console.log('Hello !');
    $scope.ShowAutocompleteObj = ['ShowAutocompleteFATHERCODE', 'ShowAutocompleteMOTHERCODE'];
    $scope.autocompleteUserResult = [];
    $scope.autoComplete = function (keyword, masterType)
    {
        $scope.autocompleteUserResult = [];
        $scope.force_autocomplete = 'Y';
        if(keyword != '' || $scope.force_autocomplete == 'Y')
        {   
            $params = {'keyword' : keyword
                        ,'masterType' : masterType
                    };
            var autoresult = HttpService.clientRequest('cows', 'autocomplete', $params).then(function(result)
            {
                $scope.force_autocomplete = "";
                if(result.status == 200)
                {
                    var loop = result.data.length;
                    if(loop > 0)
                    {
                        for(var i = 0; i < loop; i++){
                            //console.log(result.data[i]);
                            $scope.autocompleteUserResult.push(result.data[i]);
                        }
                        return $scope.autocompleteUserResult;
                    }else{
                        return null;
                    }
                }else
                {
                    AppFunction.warningDialog(result.statusText);
                }
                
            });

            return autoresult;
        }else
        {
            deferred = $q.defer();
            console.log('asdasd');
            $scope.autocompleteUserResult = [];
            deferred.resolve( [] ); 
            
            return deferred.promise;
        }
    };

    $scope.checkAutocomplete = function(str, masterType, minlength, form, event){
        console.log(str, masterType);
        if(event.which == 27){  // Press ESC button
            $scope.autocompleteUserResult = [];
            eval('$scope.ShowAutocomplete' + masterType + ' = false;');
        }
        else if(event.which == 40){ // Press Down button check & focus radio button
            textboxes = $("#" + form + " :input");
            if($scope.radioAutoIndex == undefined || $scope.radioAutoIndex == null){
                $scope.radioAutoIndex = 0;
            }
            textboxes[0].focus();
            $(textboxes[0]).prop('checked', true);
            $scope.radioAutoIndex++;
        }
        else if(str.length >= minlength || event.which == 113){ // Press enter or string length equal min-length
            $scope.clearAutocomplete();
            $scope.autocompleteUserResult = [];
            $scope.autoComplete(str, masterType);
            eval('$scope.ShowAutocomplete' + masterType + ' = true;');
        }
        else{   // Hide autocomplete
            eval('$scope.ShowAutocomplete' + masterType + ' = false;');
        }
    };

    $scope.setAutocompleteValue = function(obj ,value, masterType, focusParent){
        console.log('$scope.' + obj + ' = "' + value.code + '";');
        eval('$scope.' + obj + ' = "' + value.code + '";');
        $scope.autocompleteUserResult = [];
        eval('$scope.ShowAutocomplete' + masterType + ' = false;');
        $('#' + focusParent).focus();
    }

    $scope.setAutocompleteValueByEnter = function(obj ,value, masterType, focusParent, event){
        if(event.which == 13){
            eval('$scope.' + obj + ' = "' + value.code + '";');
            $scope.autocompleteUserResult = [];
            eval('$scope.ShowAutocomplete' + masterType + ' = false;');

            $('#' + focusParent).focus();
        }
    }

    $scope.closeAutocomplete = function(masterType){
        $scope.autocompleteUserResult = [];
        eval('$scope.ShowAutocomplete' + masterType + ' = false;');
    }

    $scope.clearAutocomplete = function(){
        var loop = $scope.ShowAutocompleteObj.length;
        for(var i = 0; i < loop; i++){
            if($scope.ShowAutocompleteObj[i] !== ''){
                eval('$scope.' + $scope.ShowAutocompleteObj[i] + ' = false;');
            }
        }
    }

    $scope.convertStaticTextDate = function(dateObj){
        var showDate = '';
        if(dateObj != null){
            d = new Date(dateObj);   
            showDate = padLeft(d.getDate(), 2, '0') + '/' + padLeft(d.getMonth() + 1, 2, '0') + '/' + (d.getFullYear() + 543);
        }
        return showDate;
    }

    $scope.getCows = function(service, action, obj)
    {
    	HttpService.clientRequest(service, action, obj).then(function(result){
    		//console.log(result.data);
    		if(result.status == 200)
    		{
                $scope.OwnerRecord = result.data.OwnerRecord;
    			$scope.Cows = result.data.DATA;
                $scope.Cows.breed_level = parseInt($scope.Cows.breed_level);
                
                $scope.Cows.import_date = convertDate($scope.Cows.import_date, 'import_date');
                $scope.Cows.birthday = convertDate($scope.Cows.birthday, 'birthday');
                
                // Make Wean Object
                var weanIndex = $filter('FindWean')($scope.Cows.growth_records);
                if(weanIndex != -1)
                {
                    $scope.Wean = $scope.Cows.growth_records[weanIndex];
                }

                $scope.FertilizeList = $filter('FindFertilize')($scope.Cows.growth_records);

                // Make BreedingList Object
                $scope.BreedingList = $scope.Cows.breeding_records;

                // Make GivebirthList Object
                $scope.GivebirthList = $scope.Cows.givebirth_records;

                // Make MovementList Object
                $scope.MovementList = $scope.Cows.movement_records;

                // Make TreatmentList Object
                $scope.TreatmentList = $scope.Cows.treatment_records;                

                // Make Cow Images Object
                $scope.ImageList =  $scope.Cows.cow_images;                
    		}else{
    			alert(result.errorMsg);
    		}
    	});
    }

    $scope.saveCows = function(service, action, obj){
        // obj.birthday = makeSQLDate(obj.birthday);
        // obj.import_date = makeSQLDate(obj.import_date);
        // obj.createdby = '1';
        // obj.code = 'TAK20170002';
        // obj.id = '';
        showWaiting();
        HttpService.clientRequest(service, action, obj).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else if(obj.id == null){
                window.location.href = urlGlobal + '/cows/edit/' + result.data.DATA.ID;
            }
            showAlert('บันทึก');
        });
    }

    function showAlert(SaveResult){
        $("#waiting-alert").hide();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
            $scope.SaveResult = SaveResult;
        });   
    }

    function showWaiting(){
        $("#waiting-alert").show();
        // $("#waiting-alert").fadeTo(2000, 500).slideUp(500, function(){
        //     $("#waiting-alert").slideUp(500);
        //     $("#waiting-alert").hide();
        // });   
    }

    $scope.saveWean = function(service, action, obj, cow_id){
        var params = {'Wean' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                if($scope.Wean.id == null){
                    $scope.Wean.id = result.data.DATA.ID;
                }
                showAlert('บันทึก');
            }
        });
    }

    $scope.saveFertilize = function(service, action, obj, cow_id){
        var params = {'Fertilize' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                $scope.FertilizeList = result.data.DATA.obj;
                $scope.Fertilize = {'id':null,'record_date':null,'age':null,'food_type':null,'total_eating':null,'weight':null,'chest':null,'height':null,'length':null,'growth_stat':null};
                $scope.FertilizeUpdate = false;
                showAlert('บันทึก');
            }
        });
    }

    $scope.deleteFertilize = function(service, action, obj, index){
        $scope.alertMessage = 'ต้องการลบข้อมูลการเจริญเติบโตนี้ ใช่หรือไม่ ?';
        var modalInstance = $uibModal.open({
            animation : true,
            templateUrl : '../../webroot/js/angular-scripts/views/dialog_confirm.html',
            size : 'sm',
            scope : $scope,
            backdrop : 'static',
            controller : 'ModalDialogCtrl',
            resolve : {
                params : function() {
                    return {};
                } 
            },
        });
        modalInstance.result.then(function (valResult) {
            var params = {'id' : obj.id};
            HttpService.clientRequest(service, action, params).then(function(result){
                if(result.status != 200){
                    alert(result.errorMsg);
                }else{
                    $scope.FertilizeList.splice(index, 1);
                }
            });
        });
    }    

    $scope.saveBreeder = function(service, action, obj, cow_id){
        var params = {'Breeder' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                $scope.BreedingList = result.data.DATA.obj;
                $scope.Breeder = {'id':null,'breeding_date':null,'mother_code':null};
                $scope.BreederUpdate = false;
                showAlert('บันทึก');
            }
        });
    }

    $scope.deleteBreeder = function(service, action, obj, index){
        $scope.alertMessage = 'ต้องการลบข้อมูลสถิตินี้ ใช่หรือไม่ ?';
        var modalInstance = $uibModal.open({
            animation : true,
            templateUrl : '../../webroot/js/angular-scripts/views/dialog_confirm.html',
            size : 'sm',
            scope : $scope,
            backdrop : 'static',
            controller : 'ModalDialogCtrl',
            resolve : {
                params : function() {
                    return {};
                } 
            },
        });
        modalInstance.result.then(function (valResult) {
            var params = {'id' : obj.id};
            HttpService.clientRequest(service, action, params).then(function(result){
                if(result.status != 200){
                    alert(result.errorMsg);
                }else{
                    $scope.BreedingList.splice(index, 1);
                }
            });
        });
    }

    $scope.saveGivebirth = function(service, action, obj, cow_id){
        var params = {'Givebirth' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                $scope.GivebirthList = result.data.DATA.obj;
                $scope.Givebirth = {'id':null,'breeding_date':null,'father_code':null, 'authorities':null, 'breeding_status':null};
                $scope.GivebirthUpdate = false;
                showAlert('บันทึก');
            }
        });
    }

    $scope.deleteGivebirth = function(service, action, obj, index){
        $scope.alertMessage = 'ต้องการลบประวัติการให้ลูกรายการนี้ ใช่หรือไม่ ?';
        var modalInstance = $uibModal.open({
            animation : true,
            templateUrl : '../../webroot/js/angular-scripts/views/dialog_confirm.html',
            size : 'sm',
            scope : $scope,
            backdrop : 'static',
            controller : 'ModalDialogCtrl',
            resolve : {
                params : function() {
                    return {};
                } 
            },
        });
        modalInstance.result.then(function (valResult) {
            var params = {'id' : obj.id};
            HttpService.clientRequest(service, action, params).then(function(result){
                if(result.status != 200){
                    alert(result.errorMsg);
                }else{
                    $scope.GivebirthList.splice(index, 1);
                }
            });
        });
    }

    $scope.saveMovement = function(service, action, obj, cow_id){
        var params = {'Movement' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                $scope.MovementList = result.data.DATA.obj;
                $scope.Movement = {'id':null,'movement_date':null,'departure':null, 'destination':null, 'description':null};
                $scope.MovementUpdate = false;
                showAlert('บันทึก');
            }
        });
    }

    $scope.deleteMovement = function(service, action, obj, index){
        $scope.alertMessage = 'ต้องการลบประวัติการเคลื่อนย้ายรายการนี้ ใช่หรือไม่ ?';
        var modalInstance = $uibModal.open({
            animation : true,
            templateUrl : '../../webroot/js/angular-scripts/views/dialog_confirm.html',
            size : 'sm',
            scope : $scope,
            backdrop : 'static',
            controller : 'ModalDialogCtrl',
            resolve : {
                params : function() {
                    return {};
                } 
            },
        });
        modalInstance.result.then(function (valResult) {
            var params = {'id' : obj.id};
            HttpService.clientRequest(service, action, params).then(function(result){
                if(result.status != 200){
                    alert(result.errorMsg);
                }else{
                    $scope.MovementList.splice(index, 1);
                }
            });
        });
    }

    $scope.saveTreatment = function(service, action, obj, cow_id){
        var params = {'Treatment' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                $scope.TreatmentList = result.data.DATA.obj;
                $scope.Treatment = {'id':null,'treatment_date':null,'disease':null, 'drug_used':null, 'conservator':null};
                $scope.TreatmentUpdate = false;
                showAlert('บันทึก');
            }
        });
    }

    $scope.deleteTreatment = function(service, action, obj, index){
        $scope.alertMessage = 'ต้องการลบประวัติการรักษารายการนี้ ใช่หรือไม่ ?';
        var modalInstance = $uibModal.open({
            animation : true,
            templateUrl : '../../webroot/js/angular-scripts/views/dialog_confirm.html',
            size : 'sm',
            scope : $scope,
            backdrop : 'static',
            controller : 'ModalDialogCtrl',
            resolve : {
                params : function() {
                    return {};
                } 
            },
        });
        modalInstance.result.then(function (valResult) {
            var params = {'id' : obj.id};
            HttpService.clientRequest(service, action, params).then(function(result){
                if(result.status != 200){
                    alert(result.errorMsg);
                }else{
                    $scope.TreatmentList.splice(index, 1);
                }
            });
        });
    }

    $scope.editFertilize = function(data){
        data.age = parseInt(data.age);
        data.total_eating = parseInt(data.total_eating);
        $scope.Fertilize = angular.copy(data);
        $scope.Fertilize.record_date = convertDate($scope.Fertilize.record_date, 'fertilize_record_date');
        $scope.FertilizeUpdate = true;
    }

    $scope.addFertilize = function(){
        $scope.Fertilize = {'id':null,'record_date':null,'age':null,'food_type':null,'total_eating':null,'weight':null,'chest':null,'height':null,'length':null,'growth_stat':null};
        $scope.Fertilize.record_date = convertDate($scope.Fertilize.record_date, 'fertilize_record_date');
        $scope.FertilizeUpdate = true;
    }

    $scope.cancelFertilize = function(){
        $scope.Fertilize = null;
        $scope.FertilizeUpdate = false;
    }

    $scope.editBreeder = function(data){
        $scope.Breeder = angular.copy(data);
        $scope.Breeder.breeding_date = convertDate($scope.Breeder.breeding_date, 'breeding_breeding_date');
        $scope.BreederUpdate = true;
    }

    $scope.addBreeder = function(){
        $scope.Breeder = {'id':null,'breeding_date':null,'mother_code':null};
        $scope.Breeder.breeding_date = convertDate($scope.Breeder.breeding_date, 'breeding_breeding_date');
        $scope.BreederUpdate = true;
    }

    $scope.cancelBreeder = function(){
        $scope.Breeder = null;
        $scope.BreederUpdate = false;
    }

    $scope.editGivebirth = function(data){
        // data.breeding_date = convertDate(data.breeding_date);
        $scope.Givebirth = angular.copy(data);
        $scope.Givebirth.breeding_date = convertDate($scope.Givebirth.breeding_date, 'givebirth_breeding_date');
        $scope.GivebirthUpdate = true;
    }

    $scope.addGivebirth = function(){
        $scope.Givebirth = {'id':null,'breeding_date':null,'father_code':null, 'authorities':null, 'breeding_status':null, 'breeding_type':null};
        $scope.Givebirth.breeding_date = convertDate($scope.Givebirth.breeding_date, 'givebirth_breeding_date');
        $scope.GivebirthUpdate = true;
    }

    $scope.cancelGivebirth = function(){
        $scope.Givebirth = null;
        $scope.GivebirthUpdate = false;
    }

    $scope.editMovement = function(data){
        $scope.Movement = angular.copy(data);
        $scope.Movement.movement_date = convertDate($scope.Movement.movement_date, 'movement_date');
        $scope.MovementUpdate = true;
    }

    $scope.addMovement = function(){
        $scope.Movement = {'id':null,'movement_date':null,'departure':null, 'destination':null, 'description':null};
        $scope.Movement.movement_date = convertDate($scope.Movement.movement_date, 'movement_date');
        $scope.MovementUpdate = true;
    }

    $scope.cancelMovement = function(){
        $scope.Movement = null;
        $scope.MovementUpdate = false;
    }

    $scope.editTreatment = function(data){
        $scope.Treatment = data;
        $scope.Treatment.treatment_date = convertDate($scope.Treatment.treatment_date, 'treatment_date');
        $scope.TreatmentUpdate = true;
    }

    $scope.addTreatment = function(){
        $scope.Treatment = {'id':null,'treatment_date':null,'disease':null, 'drug_used':null, 'conservator':null};
        $scope.Treatment.treatment_date = convertDate($scope.Treatment.treatment_date, 'treatment_date');
        $scope.TreatmentUpdate = true;
    }

    $scope.cancelTreatment = function(){
        $scope.Treatment = null;
        $scope.TreatmentUpdate = false;
    }

    $scope.updloadImg = function(img, short_desc, cow_id){
        console.log($scope.fileimg);
        console.log($scope.short_desc);
        if(img != null){
            var params = {'imageObj' : img , 'short_desc':short_desc, 'cow_id' : cow_id};
            //HttpService.uploadRequest('cows', 'uploadImage', params).then(function(result){
            Upload.upload({
                url: urlGlobal + '/cows/uploadImage',
                data: { 'uploadObj' : params }
            }).then(function (result) {
                //return {'status':response.status, 'data':response.data};
                if(result.status != 200 || result.data.STATUS == 'ERROR'){
                    alert(result.errorMsg);
                }else{
                    img = undefined;
                    $scope.fileimg = undefined;
                    $scope.short_desc = null;
                    window.location.href = cow_id;
                    //$scope.getCows('cows','loaddata',{cows_id : cows_id});
                    //console.log('sad');
                }
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
            });
                
            //});
            

        }else{
            alert('กรุณาเลือกภาพ');
        }
    }

	// Loaf all data
    if(cows_id != '')
    {
	   $scope.getCows('cows','loaddata',{cows_id : cows_id});
    }else{
        $scope.Cows = {import_date:null, birthday:null, isbreeder:'N'};
        $scope.Cows.import_date = convertDate($scope.Cows.import_date, 'import_date');
        $scope.Cows.birthday = convertDate($scope.Cows.birthday, 'birthday');
    }
    $scope.fileimg = null;
    $scope.short_desc = null;
    $scope.FertilizeUpdate = false;
    $scope.BreederUpdate = false;
    $scope.GivebirthUpdate = false;
    $scope.MovementUpdate = false;
    $scope.TreatmentUpdate = false;
    $scope.SaveResult = 'บันทึก';
    $scope.BreedLevelList = [{'id':0, 'name':'ตั้งฐาน'},{'id':1,'name':'โคตาก 1'},{'id':2,'name':'ตาก 2'},{'id':3,'name':'พันธุ์ตาก'},{'id':4,'name':'พันธุ์ตากแท้'}];
    $scope.FoodTypeList = [{'id':'หยาบ', 'name':'หยาบ'},{'id':'ข้น', 'name':'ข้น'},{'id':'TMR', 'name':'TMR'},{'id':'อื่นๆ', 'name':'อื่นๆ'}];
    $scope.GradeList = [
                {'id':'1','name':'ชาโลเล่ย์'}
                ,{'id':'2','name':'บรามัน'}
                ,{'id':'3','name':'แองกัส'}
                ,{'id':'4','name':'วากิว'}
                ,{'id':'5','name':'แบงกัส'}
                ,{'id':'6','name':'ตาก'}
                ,{'id':'7','name':'กำแพงแสน'}
                ,{'id':'8','name':'อื่นๆ'}
            ];

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
})
.filter('FindFertilize', function () {
    return function (input) {
        if (input !== undefined && input !== null) {
            var i = 0, len = input.length;
            var fertilize = [];
            for (; i < len; i++) {
                //console.log(input[i].UserID, '==' ,val);
                if (input[i].type == 'F') {
                    //return i;
                    fertilize.push(input[i]);
                }
            }
            return fertilize;
        } else {
            return [];
        }
    };
})
;

function makeSQLDate(dateObj){
    console.log(dateObj);
    return dateObj.getFullYear() + '-' + (dateObj.getMonth() + 1) + '-' + (dateObj.getDate() < 9?'0'+dateObj.getDate():dateObj.getDate());
}