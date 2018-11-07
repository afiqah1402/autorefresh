<script>
  // declaring global variable for data transfer from php to js
  var baseUrl = "<?= base_url() ?>"
  var empId = "<?= $empId ?>"
</script>
<div>
  <!-- load angularjs controller -->
  <script src="<?= base_url('/app/js/services/EmployeeService.js') ?>"></script>
  <script src="<?= base_url('/app/js/controllers/EmployeeInfoController') ?>"></script>
</div>
<div ng-controller="EmployeeInfoController" ng-cloak="" layout-gt-sm="row" layout="column">
  <div flex-gt-sm="20" flex></div>
  <div flex-gt-sm="60" flex="" class="md-padding">
    <!-- <md-toolbar layout="row" class="md-hue-3">
      <div class="md-toolbar-tools">
        <span>Employee Detail Information</span>
      </div>
    </md-toolbar> -->

    <md-toolbar>
      <div class="md-toolbar-tools">
        <md-button aria-label="Go Back" ng-href="<?= base_url('public/employee/list')?>">
          Back
        </md-button>

        <h2 flex="" md-truncate="">Employee Detail Information</h2>
        <md-button class="md-raised md-accent md-hue-3" aria-label="Edit" ng-href="<?= base_url('public/employee/edit') . "?empId=" ?>{{employee.emp_id}}">
          Edit
        </md-button>
      </div>
    </md-toolbar>

    <md-content class="md-padding" layout-xs="column" layout="row">
    <div flex-xs="" flex-gt-xs="100" layout="column">
      <md-card>
        <md-card-title>
          <md-card-title-text>
            <div layout="column">
                <span>First Name: {{ employee.first_name }}</span>
                <span>Last Name: {{ employee.last_name }}</span>
                <span>Employee ID: {{ employee.emp_id }}</span>
            </div>
            <div layout="column" ng-show="showEmpDetails">
                <span>Designation: {{ employee.designation }}</span>
                <span>Based in: {{ employee.based }}</span>
                <span>Gender: {{ employee.gender }}</span>
                <span>Salary: {{ employee.salary }}</span>
            </div>
          </md-card-title-text>
        </md-card-title>
        <md-card-actions layout="row" layout-align="end center">
          <md-button ng-click="showOrHideDetails()">{{ showOrHide }}</md-button>
        </md-card-actions>
      </md-card>
    </div>
  </md-content>
  </div>
  <div flex-gt-sm="20" flex></div>
</div>