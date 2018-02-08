angular.module('abeef').controller('CowUpdateController', function($scope, $q, $cookies, $filter, $uibModal, HttpService) {
	//console.log('Hello !');
    
    $scope.exportToPDF = function(data) {
        var data_detail = [];
        var headerRow = [];
        // set header
        //headerRow.push('ห้องประชุม');
        headerRow.push({text: 'ห้องประชุม', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
        headerRow.push({text: 'พื้นที่', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});  
        headerRow.push({text: 'จำนวนครั้งที่ใช้งาน', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
        headerRow.push({text: 'ปี', style: 'tableHeader', /*rowSpan: 2,*/ alignment: 'center', fontSize: 12, bold: true});
        data_detail.push(headerRow);
        
        // set detail
        var row_index = 1;
        data.forEach(function(sourceRow) {
          var dataRow = [];
          dataRow.push(sourceRow.record_date);
          dataRow.push(sourceRow.age);
          dataRow.push({text: sourceRow.food_type, alignment: 'center'});
          dataRow.push({text: sourceRow.total_eating, alignment: 'center'});
          data_detail.push(dataRow);
          row_index++;
        });

        //return ;
        pdfMake.fonts = {
            SriSuriwongse: {
                
                normal: 'SRISURYWONGSE.ttf'
                ,bold: 'SRISURYWONGSE-Bold.ttf'
            }
        };
        
        var dd = {
            content: [
                {text: 'สรุปการใช้ห้องประชุมประจำปี ', style: 'header', alignment:'center',margin: [0,10,0,0]},
                {
                     table: {
                        headerRows: 1,
                        widths: [170,150,100,50],
                        body: data_detail
                    }
                },
                {text: 'สรุปการใช้ห้องประชุมประจำปี ', style: 'header', alignment:'center',margin: [0,10,0,0]}
            ],
            styles: {
                header: {
                    bold: true,
                    fontSize: 18
                }
            },
            defaultStyle: {
                fontSize: 12,
                font:'SriSuriwongse'
            }
        }

         pdfMake.createPdf(dd).download('summary_room.pdf');
         
    }

    $scope.getCows = function(service, action, obj)
    {
    	HttpService.clientRequest(service, action, obj).then(function(result){
    		//console.log(result.data);
    		if(result.status == 200)
    		{
    			$scope.Cows = result.data;
                $scope.Cows.breed_level = parseInt($scope.Cows.breed_level);
                $scope.Cows.birthday = convertDate($scope.Cows.birthday);
                $scope.Cows.import_date = convertDate($scope.Cows.import_date);
                
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
        HttpService.clientRequest(service, action, obj).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else if(obj.id == null){
                window.location.href = urlGlobal + '/cows/edit/' + result.data.DATA.ID;
            }
        });
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
            }
        });
    }

    $scope.saveFertilize = function(service, action, obj, cow_id){
        var params = {'Fertilize' : obj, 'cow_id' : cow_id};
        HttpService.clientRequest(service, action, params).then(function(result){
            if(result.status != 200){
                alert(result.errorMsg);
            }else{
                
                if(result.data.DATA.ACTION == 'ADD'){
                    obj.id = result.data.DATA.ID;
                    $scope.FertilizeList.push(result.data.DATA.obj);
                }
                $scope.Fertilize = {'id':null,'record_date':null,'age':null,'food_type':null,'total_eating':null,'weight':null,'chest':null,'height':null,'length':null,'growth_stat':null};
                $scope.FertilizeUpdate = false;
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
                
                if(result.data.DATA.ACTION == 'ADD'){
                    obj.id = result.data.DATA.ID;
                    $scope.BreedingList.push(result.data.DATA.obj);
                }
                $scope.Breeder = {'id':null,'breeding_date':null,'mother_code':null};
                $scope.BreederUpdate = false;
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
                
                if(result.data.DATA.ACTION == 'ADD'){
                    obj.id = result.data.DATA.ID;
                    $scope.GivebirthList.push(result.data.DATA.obj);
                }
                $scope.Givebirth = {'id':null,'breeding_date':null,'father_code':null, 'authorities':null, 'breeding_status':null};
                $scope.GivebirthUpdate = false;
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
                
                if(result.data.DATA.ACTION == 'ADD'){
                    obj.id = result.data.DATA.ID;
                    $scope.MovementList.push(result.data.DATA.obj);
                }
                $scope.Movement = {'id':null,'movement_date':null,'departure':null, 'destination':null, 'description':null};
                $scope.MovementUpdate = false;
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
                
                if(result.data.DATA.ACTION == 'ADD'){
                    obj.id = result.data.DATA.ID;
                    $scope.TreatmentList.push(result.data.DATA.obj);
                }
                $scope.Treatment = {'id':null,'treatment_date':null,'disease':null, 'drug_used':null, 'conservator':null};
                $scope.TreatmentUpdate = false;
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
        data.record_date = convertDate(data.record_date);
        $scope.Fertilize = data;
        $scope.FertilizeUpdate = true;
    }

    $scope.addFertilize = function(){
        $scope.Fertilize = {'id':null,'record_date':null,'age':null,'food_type':null,'total_eating':null,'weight':null,'chest':null,'height':null,'length':null,'growth_stat':null};
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
        $scope.Breeder = {'id':null,'breeding_date':null,'mother_code':null};
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
        $scope.Givebirth = {'id':null,'breeding_date':null,'father_code':null, 'authorities':null, 'breeding_status':null};
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
        // angular.copy(data, $scope.Movement);
        $scope.MovementUpdate = true;
    }

    $scope.addMovement = function(){
        $scope.Movement = {'id':null,'movement_date':null,'departure':null, 'destination':null, 'description':null};
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
        $scope.Treatment = {'id':null,'treatment_date':null,'disease':null, 'drug_used':null, 'conservator':null};
        $scope.Treatment = null;
        $scope.TreatmentUpdate = true;
    }

    $scope.cancelTreatment = function(){
        $scope.Treatment = null;
        $scope.TreatmentUpdate = false;
    }

    $scope.updloadImg = function(img, short_desc, cow_id){
        var params = {'imageObj' : img , 'short_desc':short_desc, 'cow_id' : cow_id};
        HttpService.uploadRequest('cows', 'uploadImage', params).then(function(result){
            if(result.status != 200 || result.data.STATUS == 'ERROR'){
                alert(result.errorMsg);
            }else{
                $scope.fileimg = null;
                $scope.short_desc = null;
                $scope.ImageList.push(result.data.DATA.obj);
                console.log('sad');
            }
        });
    }

	// Loaf all data
    if(cows_id != '')
    {
	   $scope.getCows('cows','loaddata',{cows_id : cows_id});
    }
    $scope.FertilizeUpdate = false;
    $scope.BreederUpdate = false;
    $scope.GivebirthUpdate = false;
    $scope.MovementUpdate = false;
    $scope.TreatmentUpdate = false;
    $scope.BreedLevelList = [{'id':1,'name':'1'},{'id':2,'name':'2'},{'id':3,'name':'3'},{'id':4,'name':'4'}];
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

function convertDate(d){
    return new Date(d);   
}

function makeSQLDate(dateObj){
    console.log(dateObj);
    return dateObj.getFullYear() + '-' + (dateObj.getMonth() + 1) + '-' + (dateObj.getDate() < 9?'0'+dateObj.getDate():dateObj.getDate());
}