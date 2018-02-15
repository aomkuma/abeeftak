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
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback" >
                            <label>ทะเบียนปศุสัตว์ :</label>
                            <input type="text" name="livestock_register" ng-model="Cows.livestock_register" class="form-control" maxlength="35">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback">
                            <label>ชื่อโค :</label>
                            <input type="text" name="name" ng-model="Cows.cow_breed.name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
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
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback">
                            <label>วัน/เดือน/ปี เกิด :</label> 
                            <input type="text" name="birthday" id="birthday" ng-model="Cows.birthday" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group">
                            <label>เพศ <span style="color: #a94442;">*</span> :</label><br> 
                            <input type="radio" name="gender" ng-model="Cows.gender" ng-value="'M'" ng-required="!Cows.gender"> ผู้ &nbsp; 
                            <input type="radio" name="gender" ng-model="Cows.gender" ng-value="'F'" ng-required="!Cows.gender"> เมีย &nbsp; 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md- col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group">
                            <label>สถานะการเป็นพ่อพันธุ์ - แม่พันธุ์ :</label> <br>
                            <input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'N'"  ng-required="!Cows.isbreeder"> ไม่เป็น &nbsp; 
                            <input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'Y'" ng-show="Cows.gender == 'M' || Cows.gender == 'F'" ng-required="!Cows.isbreeder"> 
                            <span ng-show="Cows.gender == 'M'">พ่อพันธุ์</span>
                            <span ng-show="Cows.gender == 'F'">แม่พันธุ์</span> &nbsp;
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.grade.$valid,'has-error' : cow_info.grade.$invalid}">
                            <label>สายพันธุ์ :</label>
                            <select class="form-control" ng-name="grade" ng-model="Cows.grade"  ng-options="grade.name as grade.name  for grade in GradeList">
                                <option value="">------- กรุณาเลือก -------</option>
                            </select>
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.grade.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.grade.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group">
                            <label>วิธีผสมพันธุ์ :</label><br> 
                            <input type="radio" name="breeding" ng-model="Cows.breeding" ng-value="'AI'"> ผสมเทียม &nbsp; 
                            <input type="radio" name="breeding" ng-model="Cows.breeding" ng-value="'NM'"> ธรรมชาติ &nbsp; 
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="Cows.breeding == 'AI'">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback">
                            <label>น้ำเชื้อพ่อพันธุ์ :</label>
                            <input type="text" name="artificial_father" ng-model="Cows.artificial_father" class="form-control" maxlength="35">
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" >
                            <label>สายพันธุ์ :</label>
                            <input type="text" name="artificial_father_breed" ng-model="Cows.artificial_father_breed" class="form-control" maxlength="35">
                            
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="Cows.breeding == 'NM'">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.father_code.$valid,'has-error' : cow_info.father_code.$invalid}">
                            <label>พ่อพันธุ์ :</label>
                            <div class="div-autocomplete">
                                <div class="div-autocomplete-table" ng-show="ShowAutocompleteFATHERCODE" id="autocomplete_father_code">
                                    <table id="mstrTable" class="table table-hover table-striped">
                                        <caption ng-click="closeAutocomplete('FATHERCODE')">Close (X)</caption>
                                        <tr>
                                            <th></th>
                                            <th>รหัสโค</th>
                                        </tr>
                                        <tbody>
                                            <tr ng-repeat="item in autocompleteUserResult">
                                                <td>
                                                    <input type="radio" name="radio_auto" ng-model="radio_auto" value="{{item}}" ng-keyup="setAutocompleteValueByEnter('Cows.father_code', item, 'FATHERCODE', 'father_code', $event)" 
                                                    ng-dblclick="setAutocompleteValue('Cows.father_code', item, 'FATHERCODE', 'father_code')">
                                                </td>
                                                <td class="point-select">
                                                    <a ng-click="setAutocompleteValue('Cows.father_code', item, 'FATHERCODE', 'father_code')">{{item.code}}</a>
                                                </td>
                                                <!--<td>{{item.name}}</td>-->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <input type="text"
                                name="father_code" id="father_code" class="form-control"
                                ng-model="Cows.father_code" ng-keyup="checkAutocomplete(Cows.father_code, 'FATHERCODE', 1, 'autocomplete_father_code', $event)" ng-required="Cows.breeding == 'NM'" />
                            </div>
                            <!--<input type="text" name="father_code" ng-model="Cows.father_code" class="form-control" ng-required="Cows.breeding == 'NM'">-->
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.father_code.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.father_code.$valid"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.mother_code.$valid,'has-error' : cow_info.mother_code.$invalid}">
                            <label>แม่พันธุ์ :</label>
                            <div class="div-autocomplete">
                                <div class="div-autocomplete-table" ng-show="ShowAutocompleteMOTHERCODE" id="autocomplete_mother_code">
                                    <table id="mstrTable" class="table table-hover table-striped">
                                        <caption ng-click="closeAutocomplete('MOTHERCODE')">Close (X)</caption>
                                        <tr>
                                            <th></th>
                                            <th>รหัสโค</th>
                                        </tr>
                                        <tbody>
                                            <tr ng-repeat="item in autocompleteUserResult">
                                                <td>
                                                    <input type="radio" name="radio_auto" ng-model="radio_auto" value="{{item}}" ng-keyup="setAutocompleteValueByEnter('Cows.mother_code', item, 'MOTHERCODE', 'mother_code', $event)" 
                                                    ng-dblclick="setAutocompleteValue('Cows.mother_code', item, 'MOTHERCODE', 'mother_code')">
                                                </td>
                                                <td class="point-select">
                                                    <a ng-click="setAutocompleteValue('Cows.mother_code', item, 'MOTHERCODE', 'mother_code')">{{item.code}}</a>
                                                </td>
                                                <!--<td>{{item.name}}</td>-->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <input type="text"
                                name="mother_code" id="mother_code" class="form-control"
                                ng-model="Cows.mother_code" ng-keyup="checkAutocomplete(Cows.mother_code, 'MOTHERCODE', 1, 'autocomplete_mother_code', $event)" ng-required="Cows.breeding == 'NM'" />
                            </div>
                            <!--<input type="text" name="mother_code" ng-model="Cows.mother_code" class="form-control" ng-required="Cows.breeding == 'NM'">-->
                            <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="cow_info.mother_code.$invalid"></span> 
                            <span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="cow_info.mother_code.$valid"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group">
                            <label>แหล่งที่มา :</label><br> 
                            <input type="radio" name="origins" ng-model="Cows.origins" ng-value="'IN'"> สัตว์ในประเทศ &nbsp; 
                            <input type="radio" name="origins" ng-model="Cows.origins" ng-value="'IM'"> สัตว์นำเข้า &nbsp; 
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="Cows.origins == 'IM'">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-2  col-md-offset-2">
                        <div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.import_date.$valid,'has-error' : cow_info.import_date.$invalid}">
                            <label>วันที่นำเข้า :</label>
                            <input type="text" name="import_date" id="import_date" ng-model="Cows.import_date" class="form-control" ng-required="Cows.origins == 'IM'">
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
    div.div-autocomplete {
        position: relative;
    }
    div.div-autocomplete-table {
        background-color: #FFF;
        width: 100%;
        position: absolute;
        top: 2.5em;
        left: 0;
        z-index: 999999999;
        border: dashed 1px #ccc;
    }
    .point-select{
        cursor: pointer;
    }
</style>