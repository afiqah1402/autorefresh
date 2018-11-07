<script>
  // declaring global variable for data transfer from php to js
  var baseUrl = "<?= base_url() ?>";
  var empId = <?= isset($empId) ? $empId : "-1" ?>;
  var mode = "<?= $mode ?>";
  <?php
    $backUrl = base_url('public/employee/list');
    if( $mode == 'edit' && isset($empId) ){
        $backUrl = base_url('public/employee/info') . "?empId=" . $empId;
    }
  ?>
</script>
<div>
  <!-- load angularjs controller -->
  <script src="<?= base_url('/app/js/services/EmployeeService.js') ?>"></script>
  <script src="<?= base_url('/app/js/controllers/EmployeeModifyController') ?>"></script>
</div>
<div ng-controller="EmployeeModifyController" ng-cloak="" layout-gt-sm="row" layout="column">
  <div flex-gt-sm="20" flex></div>
  <div flex-gt-sm="60" flex="" class="md-padding">

    <md-toolbar>
      <div class="md-toolbar-tools">
        <md-button aria-label="Go Back" ng-href="<?= $backUrl ?>">
          Back
        </md-button>
        <?php if($mode == 'add'){?>
            <h2 flex="" md-truncate="">Add New Employee</h2>
        <?php } ?>
        <?php if($mode == 'edit'){?>
            <h2 flex="" md-truncate="">Edit Employee Details</h2>
        <?php } ?>
        <!-- <md-button class="md-raised md-accent md-hue-3" aria-label="Learn More">
          Edit
        </md-button> -->
      </div>
    </md-toolbar>

    <div class="md-padding" layout-padding="">

    <div layout="row">
        <md-input-container flex="50" class="md-block">
            <label>First Name</label>
            <input ng-model="emp.first_name" type="text">
        </md-input-container>

        <md-input-container flex="50"class="md-block">
            <label>Last Name</label>
            <input ng-model="emp.last_name" type="text">
        </md-input-container>
    </div>

    <div layout="row">
        <md-input-container flex="45" class="md-icon-float md-block">
            <label>Designation</label>
            <md-icon class="designation"><i class="fas fa-briefcase"></i></md-icon>
            <input ng-model="emp.designation" type="text">
        </md-input-container>
        <div flex="5"></div>
        <md-input-container flex="45" class="md-icon-float md-block">
            <label>Based in</label>
            <md-icon class="based"><i class="fas fa-building"></i></md-icon>
            <input ng-model="emp.based" type="text">
        </md-input-container>
    </div>

    <div layout="row">
        <md-input-container flex="45" class="md-icon-float md-block">
            <label>Gender</label>
            <md-icon class="gender"><i class="fas fa-male"></i></md-icon>
            <!-- <input ng-model="emp.salary"> -->

            <md-select name="type" ng-model="emp.gender">
                <md-option value="male">Male</md-option>
                <md-option value="female">Female</md-option>
            </md-select>
        </md-input-container>
        <div flex="5"></div>
        <md-input-container flex="45" class="md-icon-float md-block">
            <label>Salary</label>
            <md-icon class="based"><i class="fas fa-money-check-alt"></i></md-icon>
            <input ng-model="emp.salary" type="number" step="0.01">
        </md-input-container>  
    </div>

    <div layout="row" layout-align="end center">
        <md-button class="md-raised md-primary" type="submit" ng-click="submit()">Submit</md-button>
    </div>

  </md-content>
    </div>
  </div>

  <script type="text/ng-template" id="toast-template.html"><md-toast>
    <span class="md-toast-text" flex>{{ msg }}</span>
    <md-button ng-click="closeToast()">
        Close
    </md-button>
    </md-toast>
    </script>
</div>