<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cow[]|\Cake\Collection\CollectionInterface $cows
 */
?>
<script>var cows_id = '';</script>

<div ng-app="abeef" ng-controller="CowUpdateController">
    <div class="page-header"><b><h3>เพิ่มโค</h3></b></div>
            <br>
            <form name="cow_info" novalidate>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.name.$valid,'has-error' : cow_info.name.$invalid}">
                            <label>ชื่อโค :</label>
                            <input type="text" name="name" ng-model="Cows.cow_breed.name" class="form-control">
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.name.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.name.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.breed_level.$valid,'has-error' : cow_info.breed_level.$invalid}">
                            <label>ระดับสายพันธุ์ :</label> 
                            <select class="form-control" name="breed_level" ng-model="Cows.breed_level" required="true" ng-options="level.id as level.name  for level in BreedLevelList">
                                <option value="">------- กรุณาเลือก -------</option>
                                
                            </select>
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.breed_level.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.breed_level.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.birthday.$valid,'has-error' : cow_info.birthday.$invalid}">
                            <label>วัน/เดือน/ปี เกิด :</label> 
                            <input type="date" name="birthday" ng-model="Cows.birthday" class="form-control" required="true">
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.birthday.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.birthday.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>เพศ :</label><br> 
                            <input type="radio" name="gender" ng-model="Cows.gender" ng-value="'M'"> ผู้ &nbsp; 
                            <input type="radio" name="gender" ng-model="Cows.gender" ng-value="'F'"> เมีย &nbsp; 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md- col-lg-4">
                        <div class="form-group">
                            <label>สถานะการเป็นพ่อพันธุ์ - แม่พันธุ์ :</label> <br>
                            <input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'N'"> ไม่เป็น &nbsp; 
                            <span ng-show="Cows.gender == 'M'"><input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'F'"> พ่อพันธุ์</span> &nbsp;
                            <span ng-show="Cows.gender == 'F'"><input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'M'"> แม่พันธุ์ &nbsp; </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.grade.$valid,'has-error' : cow_info.grade.$invalid}">
                            <label>สายพันธุ์ :</label>
                            <input type="text" name="grade" ng-model="Cows.grade" class="form-control">
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.grade.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.grade.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>วิธีผสมพันธุ์ :</label><br> 
                            <input type="radio" name="breeding" ng-model="Cows.breeding" ng-value="'AI'"> ผสมเทียม &nbsp; 
                            <input type="radio" name="breeding" ng-model="Cows.breeding" ng-value="'NM'"> ธรรมชาติ &nbsp; 
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="Cows.breeding == 'NM'">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.father_code.$valid,'has-error' : cow_info.father_code.$invalid}">
                            <label>พ่อพันธุ์ :</label>
                            <input type="text" name="father_code" ng-model="Cows.father_code" class="form-control" ng-required="Cows.breeding == 'NM'">
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.father_code.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.father_code.$valid"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.mother_code.$valid,'has-error' : cow_info.mother_code.$invalid}">
                            <label>แม่พันธุ์ :</label>
                            <input type="text" name="mother_code" ng-model="Cows.mother_code" class="form-control" ng-required="Cows.breeding == 'NM'">
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.mother_code.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.mother_code.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>แหล่งที่มา :</label><br> 
                            <input type="radio" name="origins" ng-model="Cows.origins" ng-value="'IN'"> สัตว์ในประเทศ &nbsp; 
                            <input type="radio" name="origins" ng-model="Cows.origins" ng-value="'IM'"> สัตว์นำเข้า &nbsp; 
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="Cows.origins == 'IM'">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.import_date.$valid,'has-error' : cow_info.import_date.$invalid}">
                            <label>วันที่นำเข้า :</label>
                            <input type="date" name="import_date" ng-model="Cows.import_date" class="form-control" ng-required="Cows.origins == 'IM'">
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.import_date.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.import_date.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <button type="button" class="btn btn-primary" ng-click="saveCows('cows','saveCows', Cows)" ng-disabled="cow_info.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
                    </div>
                </div>
            </form>
        
</div>
<div class="page-header"></div>

<style type="text/css" media="screen">
    .container {
        width: 100%;
    }
    .nav-link {
        height: 60px;
    }
</style>