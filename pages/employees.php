
<?php include "classes/Employee-class.php" ?>
<?php include "classes/Job-class.php" ?>
<?php include "classes/Departament-class.php" ?>

<?php 
    $employees = $employeesObject->index(); 
    $cols =  $employeesObject->cols();    
    $employeesObject->deleteEmployee();
    $employeesObject->createEmployee();
    $jobs = $jobsObject->index(); //visa darbu masyva
    $departments = $departmentsObject->index();

?>  


<div class="row">
        <div class="col-lg-8">
            <h1>Employees</h1>
        </div>
</div>


<div class="row">
    <div class="col-lg-6">
        <?php include "components/create.php"; ?>
    </div>
</div>


<div class="row">
    <div class="col-lg-8">
        <table class="table table-striped">
            <tr>
                <?php foreach($cols as $col) { ?>
                    <th><?php echo $col; ?></th>
                <?php } ?>
                <th>Actions</th>    
            </tr>
                <?php foreach($employees as $employee) { ?>
                    <tr>
                        <?php foreach($cols as $key=>$col) { ?>
                            <td><?php echo $employee[$key]; ?></td>
                        <?php } ?>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger" value="<?php echo $employee["employee_id"]; ?>">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                   
        </table>
    </div>
</div>