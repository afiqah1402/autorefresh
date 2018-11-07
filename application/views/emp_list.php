<script>
  // declaring global variable for data transfer from php to js
  var baseUrl = "<?= base_url() ?>"
</script>
<div>
  <!-- load angularjs controller -->
  <script src="<?= base_url('/app/js/services/EmployeeService.js') ?>"></script>
  <script src="<?= base_url('/app/js/controllers/EmployeeListController') ?>"></script>
</div>
<div ng-controller="EmployeeListController" ng-cloak="" layout-gt-sm="row" layout="column">
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

    <md-content>
      <md-list flex="">
        <md-list-item class="md-3-line" ng-repeat="employee in employees" ng-href="<?= base_url('public/employee/info') . "?empId=" ?>{{employee.emp_id}}">
          <div class="md-list-item-text" layout="column">
            <h3>Full Name: {{employee.first_name}} {{employee.last_name}}</h3>
            <h4>Employee ID: {{employee.emp_id}}</h4>
          </div>
          <!-- <md-button class="md-raised md-primary" ng-click="doSecondaryAction($event)">Edit</md-button> -->
        </md-list-item>
    </md-content>
  </div>
  <div flex-gt-sm="20" flex></div>
</div>