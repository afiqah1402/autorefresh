<script>
  // declaring global variable for data transfer from php to js
  var baseUrl = "<?= base_url() ?>"
</script>
<div>
  <!-- load angularjs controller -->
  <script src="<?= base_url('/app/js/services/EmployeeService.js') ?>"></script>
  <script src="<?= base_url('/app/js/services/ConnectionService.js') ?>"></script>
  <script src="<?= base_url('/app/js/controllers/EmployeeListController') ?>"></script>
</div>
<div ng-controller="EmployeeListController" ng-init="getEmpData()" ng-cloak="" layout-gt-sm="row" layout="column">
  <div flex-gt-sm="20" flex></div>
  <div flex-gt-sm="60" flex="" class="md-padding">
    <!-- <md-toolbar layout="row" class="md-hue-3">
      <div class="md-toolbar-tools">
        <span>List of Employee</span>
      </div>
    </md-toolbar> -->

    <md-toolbar>
      <div class="md-toolbar-tools">
        <h2 flex="" md-truncate="">List of Employee</h2>
        <md-button class="md-raised md-accent md-hue-3" aria-label="Add" ng-href="<?= base_url('public/employee/add') ?>">
          Add
        </md-button>
      </div>
    </md-toolbar>

    <md-content class="md-padding" layout-xs="column" layout="row">
      <div flex-xs="" flex-gt-xs="100" layout="column">
        <md-card ng-repeat="employee in employees track by $index">
          <md-card-title>
            <md-card-title-text>
              <div layout="column">
                  <span>First Name: {{ employee.first_name }}</span>
                  <span>Last Name: {{ employee.last_name }}</span>
                  <span>Employee ID: {{ employee.emp_id }}</span>
              </div>
              <div layout="column" ng-show="moreDetails[$index].less">
                  <span>Designation: {{ employee.designation }}</span>
                  <span>Based in: {{ employee.based }}</span>
                  <span>Gender: {{ employee.gender }}</span>
                  <span>Salary: {{ employee.salary }}</span>
              </div>
            </md-card-title-text>
          </md-card-title>
          <md-card-actions layout="row" layout-align="end center">
            <md-button aria-label="edit" class="md-secondary" ng-if="moreDetails[$index].less" ng-href="<?= base_url('public/employee/edit') . "?empId=" ?>{{employee.emp_id}}">Edit</md-button>
            <!-- <md-button aria-label="more" class="md-secondary" ng-click="moreDetails($index)"><span ng-bind="moreOrLess"></span></md-button> -->
            <md-button class="md-secondary" ng-click="toggleMore($index)">
              {{ moreDetails[$index].moreLabel || "More" }}
            </md-button>
            <!-- <more-button state="more" index="$index"></more-button> -->
          </md-card-actions>
        </md-card>
      </div>
    </md-content>
  </div>
  <div flex-gt-sm="20" flex></div>
</div>

<!--
  <md-content>
      <md-list flex="">
        <md-list-item class="md-3-line" ng-repeat="employee in employees">
          <div class="md-list-item-text" layout="column">
            <h3>Full Name: {{employee.first_name}} {{employee.last_name}}</h3>
            <h4>Employee ID: {{employee.emp_id}}</h4>
            <md-button class="md-secondary" ng-click="doSecondaryAction($event)">More Info</md-button>
          </div>
          </md-list-item>
    </md-content>
 -->

<?php
// ng-href="<?= base_url('public/employee/info') . "?empId=" ?>
<!-- ?>{{employee.emp_id}}" -->
