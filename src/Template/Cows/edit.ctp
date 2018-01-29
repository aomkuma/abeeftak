<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cow[]|\Cake\Collection\CollectionInterface $cows
 */
?>
<script>var cows_id = '<?= $id ?>';</script>

<div ng-app="abeef" ng-controller="CowUpdateController">
	<uib-tabset active="activeJustified" justified="true">
	    <uib-tab index="0" heading="ข้อมูลโค">
	    	<br>
	    	<form name="cow_info" novalidate>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<label class="form-control-static">รหัสโค : {{Cows.code}}</label>
					</div>
				</div>
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
							<input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'Y'"> <span ng-show="Cows.gender == 'M'">พ่อพันธุ์</span><span ng-show="Cows.gender == 'F'">แม่พันธุ์</span> &nbsp;
							<!--<span ng-show="Cows.gender == 'F'"><input type="radio" name="isbreeder" ng-model="Cows.isbreeder" ng-value="'Y'"> แม่พันธุ์ &nbsp; </span>-->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : cow_info.grade.$valid,'has-error' : cow_info.grade.$invalid}">
							<label>สายพันธุ์ :</label>
							<!--<input type="text" name="grade" ng-model="Cows.grade" class="form-control"> -->
							<select class="form-control" ng-name="grade" ng-model="Cows.grade"  ng-options="grade.name as grade.name  for grade in GradeList">
								
							</select>
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
	    </uib-tab>
	    <uib-tab index="1" heading="การเจริญเติบโต (หย่านม)">
	    	<br>
	    	<form name="wean" novalidate>
		    	<div class="row">
		    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.weight.$valid,'has-error' : wean.weight.$invalid}">
							<label>น้ำหนักแรกเกิด :</label>
							<input type="number" name="weight" ng-model="Wean.weight" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.chest.$valid,'has-error' : wean.chest.$invalid}">
							<label>รอบอก :</label>
							<input type="number" name="chest" ng-model="Wean.chest" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.height.$valid,'has-error' : wean.height.$invalid}">
							<label>ความสูง :</label>
							<input type="number" name="height" ng-model="Wean.height" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.length.$valid,'has-error' : wean.length.$invalid}">
							<label>ความยาว :</label>
							<input type="number" name="length" ng-model="Wean.length" class="form-control" min="0" max="9999.99">
						</div>
					</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.weight1.$valid,'has-error' : wean.weight1.$invalid}">
							<label>น้ำหนักหย่านม :</label>
							<input type="number" name="weight1" ng-model="Wean.weight1" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.chest1.$valid,'has-error' : wean.chest1.$invalid}">
							<label>รอบอก :</label>
							<input type="number" name="chest1" ng-model="Wean.chest1" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.height1.$valid,'has-error' : wean.height1.$invalid}">
							<label>ความสูง :</label>
							<input type="number" name="height1" ng-model="Wean.height1" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.length1.$valid,'has-error' : wean.length1.$invalid}">
							<label>ความยาว :</label>
							<input type="number" name="length1" ng-model="Wean.length1" class="form-control" min="0" max="9999.99"></span>
						</div>
					</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : wean.growth_stat.$valid,'has-error' : wean.growth_stat.$invalid}">
							<label>อัตราการเจริญเติบโตหย่านม :</label>
							<input type="number" name="growth_stat" ng-model="Wean.growth_stat" class="form-control" min="0" max="9999.99">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<button type="button" class="btn btn-primary" ng-click="saveWean('cows', 'saveWean', Wean, Cows.id)" ng-disabled="wean.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
					</div>
				</div>
		    </form>
	    </uib-tab>
	    <uib-tab index="2" heading="การเจริญเติบโต (ขุน)">
	    	<br>
	    	<form name="fertilize" novalidate ng-show="FertilizeUpdate">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.record_date.$valid,'has-error' : fertilize.record_date.$invalid}">
							<label>วันที่บันทึก :</label>
							<input type="date" name="record_date" ng-model="Fertilize.record_date" class="form-control" required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="fertilize.record_date.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="fertilize.record_date.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.age.$valid,'has-error' : fertilize.age.$invalid}">
							<label>อายุ :</label>
							<input type="number" name="age" ng-model="Fertilize.age" required="true" class="form-control" min="0" max="99" >
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.food_type.$valid,'has-error' : fertilize.food_type.$invalid}">
							<label>ประเภทอาหาร :</label>
							<input type="text" name="food_type" ng-model="Fertilize.food_type" required="true" class="form-control">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.total_eating.$valid,'has-error' : fertilize.total_eating.$invalid}">
							<label>จำนวนอาหารที่กิน :</label>
							<input type="number" name="total_eating" required="true" ng-model="Fertilize.total_eating" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
		    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.weight.$valid,'has-error' : fertilize.weight.$invalid}">
							<label>น้ำหนัก :</label>
							<input type="number" name="weight" required="true" ng-model="Fertilize.weight" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.chest.$valid,'has-error' : fertilize.chest.$invalid}">
							<label>รอบอก :</label>
							<input type="number" name="chest" required="true" ng-model="Fertilize.chest" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.height.$valid,'has-error' : fertilize.height.$invalid}">
							<label>ความสูง :</label>
							<input type="number" name="height" required="true" ng-model="Fertilize.height" class="form-control" min="0" max="9999.99">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.length.$valid,'has-error' : fertilize.length.$invalid}">
							<label>ความยาว :</label>
							<input type="number" name="length" required="true" ng-model="Fertilize.length" class="form-control" min="0" max="9999.99">
						</div>
					</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : fertilize.growth_stat.$valid,'has-error' : fertilize.growth_stat.$invalid}">
							<label>อัตราการเจริญเติบโต :</label>
							<input type="number" name="growth_stat" required="true" ng-model="Fertilize.growth_stat" class="form-control" min="0" max="9999.99">
						</div>
					</div>
				</div>
		    	<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<input type="hidden" name="id" ng-model="Fertilize.id">
						<button type="button" class="btn btn-primary" ng-click="saveFertilize('cows', 'saveFertilize', Fertilize, Cows.id)" ng-disabled="fertilize.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
						<button type="button" class="btn btn-warning" ng-click="cancelFertilize()"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
					</div>
				</div>
				<div class="page-header"></div>
			</form>
	    	<div class="table-responsive">
	    		<table class="table table-striped">
	    			<caption>
	    				<button type="button" class="btn btn-default" ng-click="addFertilize()"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</button>
	    			</caption>
	    			<thead>
	    				<tr>
	    					<th>#</th>
	    					<th>ครั้งที่</th>
	    					<th>วันที่</th>
	    					<th>อายุ</th>
	    					<th>ประเภทอาหาร</th>
	    					<th>จำนวนอาหารที่กิน</th>
	    					<th>น้ำหนัก</th>
	    					<th>รอบอก</th>
	    					<th>ความสูง</th>
	    					<th>ความยาว</th>
	    					<th>อัตราการเจริญเติบโต</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr ng-repeat="data in FertilizeList | filter: { type: 'F' }">
	    					<td>
	    						<button class="btn btn-info btn-sm" ng-click="editFertilize(data)"><span class="glyphicon glyphicon-edit"></span></button> 
	    						<button class="btn btn-danger btn-sm" ng-click="deleteFertilize('cows', 'deleteFertilize', data, $index)"><span class="glyphicon glyphicon-trash"></span></button>
	    					</td>
	    					<td>{{$index + 1}}</td>
	    					<td>{{data.record_date | date:'dd/MM/yyyy'}}</td>
	    					<td>{{data.age}}</td>
	    					<td>{{data.food_type}}</td>
	    					<td>{{data.total_eating}}</td>
	    					<td>{{data.weight}}</td>
	    					<td>{{data.chest}}</td>
	    					<td>{{data.height}}</td>
	    					<td>{{data.length}}</td>
	    					<td>{{data.growth_stat}}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </uib-tab>
	    <uib-tab index="3" heading="สถิติการผสม" ng-show="Cows.isbreeder == 'Y' && Cows.gender == 'M'">
	    	<br>
	    	<form name="breeder" novalidate ng-show="BreederUpdate">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : breeder.breeding_date.$valid,'has-error' : breeder.breeding_date.$invalid}">
							<label>วันที่ผสม :</label>
							<input type="date" name="breeding_date" ng-model="Breeder.breeding_date" class="form-control" required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="breeder.breeding_date.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="breeder.breeding_date.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : breeder.mother_code.$valid,'has-error' : breeder.mother_code.$invalid}">
							<label>หมายเลขประจำตัวโคแม่พันธุ์ที่ผสม :</label>
							<input type="text" name="mother_code" ng-model="Breeder.mother_code" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="breeder.mother_code.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="breeder.mother_code.$valid"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<button type="button" class="btn btn-primary" ng-click="saveBreeder('cows', 'saveBreeder', Breeder, Cows.id)" ng-disabled="breeder.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
						<button type="button" class="btn btn-warning" ng-click="cancelBreeder()"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
					</div>
				</div>
			</form>
	    	<div class="table-responsive">
	    		<table class="table table-striped">
	    			<caption>
	    				<button type="button" class="btn btn-default" ng-click="addBreeder()"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</button>
	    			</caption>
	    			<thead>
	    				<tr>
	    					<th>#</th>
	    					<th>ครั้งที่</th>
	    					<th>วันที่ผสม</th>
	    					<th>หมายเลขประจำตัวโคแม่พันธุ์ที่ผสม</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr ng-repeat="data in BreedingList">
	    					<td>
	    						<button class="btn btn-info btn-sm" ng-click="editBreeder(data)"><span class="glyphicon glyphicon-edit"></span></button> 
	    						<button class="btn btn-danger btn-sm" ng-click="deleteBreeder('cows', 'deleteBreeder', data, $index)"><span class="glyphicon glyphicon-trash"></span></button>
	    					</td>
	    					<td>{{$index + 1}}</td>
	    					<td>{{data.breeding_date | date:'dd/MM/yyyy'}}</td>
	    					<td>{{data.mother_code}}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </uib-tab>
	    <uib-tab index="4" heading="ประวัติการให้ลูก" ng-show="Cows.isbreeder == 'Y' && Cows.gender == 'F'">
	    	<br>
	    	<form name="givebirth" novalidate ng-show="GivebirthUpdate">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : givebirth.breeding_date.$valid,'has-error' : givebirth.breeding_date.$invalid}">
							<label>วันที่ผสม :</label>
							<input type="date" name="breeding_date" ng-model="Givebirth.breeding_date" class="form-control" required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="givebirth.breeding_date.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="givebirth.breeding_date.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : givebirth.father_code.$valid,'has-error' : givebirth.father_code.$invalid}">
							<label>หมายเลขประจำตัวโคพ่อพันธุ์ที่ผสม :</label>
							<input type="text" name="father_code" ng-model="Givebirth.father_code" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="givebirth.father_code.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="givebirth.father_code.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : givebirth.authorities.$valid,'has-error' : givebirth.authorities.$invalid}">
							<label>เจ้าหน้าที่ผู้ผสม :</label>
							<input type="text" name="authorities" ng-model="Givebirth.authorities" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="givebirth.authorities.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="givebirth.authorities.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : givebirth.breeding_status.$valid,'has-error' : givebirth.breeding_status.$invalid}">
							<label>สถานะการผสม :</label>
							<select name="breeding_status" ng-model="Givebirth.breeding_status" class="form-control">
								<option value="">กรุณาเลือก ..</option>
								<option value="Y">ติด</option>
								<option value="N">ไม่ติด</option>
							</select>
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="givebirth.breeding_status.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="givebirth.breeding_status.$valid"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<button type="button" class="btn btn-primary" ng-click="saveGivebirth('cows', 'saveGivebirth', Givebirth, Cows.id)" ng-disabled="givebirth.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
						<button type="button" class="btn btn-warning" ng-click="cancelGivebirth()"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
					</div>
				</div>
			</form>
	    	<div class="table-responsive">
	    		<table class="table table-striped">
	    			<caption>
	    				<button type="button" class="btn btn-default" ng-click="addGivebirth()"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</button>
	    			</caption>
	    			<thead>
	    				<tr>
	    					<th>#</th>
	    					<th>ครั้งที่</th>
	    					<th>วันที่ผสม</th>
	    					<th>หมายเลขประจำตัวโคพ่อพันธุ์ที่ผสม</th>
	    					<th>เจ้าหน้าที่ผู้ผสม</th>
	    					<th>สถานะการผสม</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr ng-repeat="data in GivebirthList">
	    					<td>
	    						<button class="btn btn-info btn-sm" ng-click="editGivebirth(data)"><span class="glyphicon glyphicon-edit"></span></button> 
	    						<button class="btn btn-danger btn-sm" ng-click="deleteGivebirth('cows', 'deleteGivebirth', data, $index)"><span class="glyphicon glyphicon-trash"></span></button>
	    					</td>
	    					<td>{{$index + 1}}</td>
	    					<td>{{data.breeding_date | date:'dd/MM/yyyy'}}</td>
	    					<td>{{data.father_code}}</td>
	    					<td>{{data.authorities}}</td>
	    					<td>{{data.breeding_status=='Y'?'ติด':'ไม่ติด'}}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </uib-tab>
	    <uib-tab index="5" heading="ประวัติการเป็นเจ้าของสัตว์">
	    	
	    </uib-tab>
	    <uib-tab index="6" heading="ประวัติการเคลื่อนย้าย">
	    	<br>
	    	<form name="movement" novalidate ng-show="MovementUpdate">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : movement.movement_date.$valid,'has-error' : movement.movement_date.$invalid}">
							<label>วันที่เคลื่อนย้าย :</label>
							<input type="date" name="movement_date" ng-model="Movement.movement_date" class="form-control" required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="movement.movement_date.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="movement.movement_date.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : movement.departure.$valid,'has-error' : movement.departure.$invalid}">
							<label>ต้นทาง :</label>
							<input type="text" name="departure" ng-model="Movement.departure" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="movement.departure.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="movement.departure.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : movement.destination.$valid,'has-error' : movement.destination.$invalid}">
							<label>ปลายทาง :</label>
							<input type="text" name="destination" ng-model="Movement.destination" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="movement.destination.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="movement.destination.$valid"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback">
							<label>วัตถุประสงค์การเคลื่อนย้าย :</label>
							<textarea name="description" ng-model="Movement.description" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<button type="button" class="btn btn-primary" ng-click="saveMovement('cows', 'saveMovement', Movement, Cows.id)" ng-disabled="movement.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
						<button type="button" class="btn btn-warning" ng-click="cancelMovement()"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
					</div>
				</div>
			</form>
	    	<div class="table-responsive">
	    		<table class="table table-striped">
	    			<caption>
	    				<button type="button" class="btn btn-default" ng-click="addMovement()"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</button>
	    			</caption>
	    			<thead>
	    				<tr>
	    					<th>#</th>
	    					<!--<th>ครั้งที่</th>-->
	    					<th>วันที่เคลื่อนย้าย</th>
	    					<th>ต้นทาง</th>
	    					<th>ปลายทาง</th>
	    					<th>วัตถุประสงค์การเคลื่อนย้าย</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr ng-repeat="data in MovementList">
	    					<td>
	    						<button class="btn btn-info btn-sm" ng-click="editMovement(data)"><span class="glyphicon glyphicon-edit"></span></button> 
	    						<button class="btn btn-danger btn-sm" ng-click="deleteMovement('cows', 'deleteMovement', data, $index)"><span class="glyphicon glyphicon-trash"></span></button>
	    					</td>
	    					<!--<td>{{$index + 1}}</td>-->
	    					<td>{{data.movement_date | date:'dd/MM/yyyy'}}</td>
	    					<td>{{data.departure}}</td>
	    					<td>{{data.destination}}</td>
	    					<td>{{data.description}}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </uib-tab>
	    <uib-tab index="7" heading="ประวัติการฉีดวัคซีน">
	    	Long Labeled Justified content
	    </uib-tab>
	    <uib-tab index="8" heading="ประวัติการรักษา">
	    	<br>
	    	<form name="treatment" novalidate ng-show="TreatmentUpdate">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : treatment.treatment_date.$valid,'has-error' : treatment.treatment_date.$invalid}">
							<label>วันที่รักษา :</label>
							<input type="date" name="treatment_date" ng-model="Treatment.treatment_date" class="form-control" required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="treatment.treatment_date.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="treatment.treatment_date.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : treatment.disease.$valid,'has-error' : treatment.disease.$invalid}">
							<label>โรค :</label>
							<input type="text" name="disease" ng-model="Treatment.disease" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="treatment.disease.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="treatment.disease.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : treatment.drug_used.$valid,'has-error' : treatment.drug_used.$invalid}">
							<label>การให้ยา :</label>
							<input type="text" name="drug_used" ng-model="Treatment.drug_used" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="treatment.drug_used.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="treatment.drug_used.$valid"></span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="form-group has-feedback" ng-class="{ 'has-success' : treatment.conservator.$valid,'has-error' : treatment.conservator.$invalid}">
							<label>ผู้รักษา :</label>
							<input type="text" name="conservator" ng-model="Treatment.conservator" class="form-control" ng-required="true">
							<span class="glyphicon glyphicon-remove form-control-feedback" ng-show="treatment.conservator.$invalid"></span> 
							<span class="glyphicon glyphicon glyphicon-ok form-control-feedback" ng-show="treatment.conservator.$valid"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<button type="button" class="btn btn-primary" ng-click="saveTreatment('cows', 'saveTreatment', Treatment, Cows.id)" ng-disabled="treatment.$invalid"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
						<button type="button" class="btn btn-warning" ng-click="cancelTreatment()"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
					</div>
				</div>
			</form>
	    	<div class="table-responsive">
	    		<table class="table table-striped">
	    			<caption>
	    				<button type="button" class="btn btn-default" ng-click="addTreatment()"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</button>
	    			</caption>
	    			<thead>
	    				<tr>
	    					<th>#</th>
	    					<th>วันที่รักษา</th>
	    					<th>โรค</th>
	    					<th>การให้ยา</th>
	    					<th>ผู้รักษา</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr ng-repeat="data in TreatmentList">
	    					<td>
	    						<button class="btn btn-info btn-sm" ng-click="editTreatment(data)"><span class="glyphicon glyphicon-edit"></span></button> 
	    						<button class="btn btn-danger btn-sm" ng-click="deleteTreatment('cows', 'deleteTreatment', data, $index)"><span class="glyphicon glyphicon-trash"></span></button>
	    					</td>
	    					<td>{{data.treatment_date | date:'dd/MM/yyyy'}}</td>
	    					<td>{{data.disease}}</td>
	    					<td>{{data.drug_used}}</td>
	    					<td>{{data.conservator}}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </uib-tab>
	    <uib-tab index="9" heading="รูปโค">
	    	<br>
	    	<form name="com_img" novalidate>
	    		<div class="row form-group">
					<label class="col-lg-2">
					รูปภาพ
					<br>
					(.png,.jpg,.raw ขนาดไม่เกิน 5 MB)
					</label>
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-4" >
								<p class="input-group">
				                  <input type="text" readonly="true" class="form-control" ng-model="fileimg.name" />
				                  <span class="input-group-btn">
									<button class="btn btn-default" ngf-select ng-model="fileimg" accept="image/*" ngf-max-size="5MB" ngf-pattern="'.png,.jpg,.raw,.gif'" ngf-model-invalid="invalidMainImgFile">เลือก</button>
								</span>
				                </p>
				                <br>
				                 <input type="text" class="form-control" ng-model="short_desc" placeholder="รายละเอียดรูปภาพ" maxlength="50" />
							</div>
							<div class="col-lg-1">
								<button class="btn btn-primary" ng-click="updloadImg(fileimg, short_desc, Cows.id)"><span class="glyphicon glyphicon-upload"></span> อัพโหลด</button>
							</div>
							<div class="col-lg-7 text-center">
								<img ngf-thumbnail="fileimg" style="height: 20vh;">
								<div class="file-alert" ng-show="invalidMainImgFile.$error === 'maxSize'">ขนาดไฟล์ต้องไม่เกิน : {{invalidMainImgFile.$errorParam}}</div>
							</div>
						</div>
						
					</div>
					<br><br>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-3" ng-repeat="img in ImageList">
							<img src="../../{{img.image.path + img.image.name}}" style="height: 20vh; margin: 5em;" title="{{img.image.short_desc}}">
						</div>
					</div>
				</div>
	    	</form>
	    </uib-tab>
	</uib-tabset>
	
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