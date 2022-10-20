<form method="post" action="index.php">
    <!-- <input type="hidden" name="page" value="<?php //echo $_GET['page']; ?>"> -->
    <!-- "employee_id" => "ID",
        "first_name" => "First Name",
        "last_name" => "Last Name",
        "email" => "Email",
        "phone_number" => "Phone Number",
        "hire_date" => "Hire Date",
        "job_id" => "Job ID",
        "salary" => "Salary",
        "manager_id" => "Manager ID",
        "department_id" => "Department ID" -->
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
    </div>
    <div class="form-group">
        <label for="hire_date">Hire Date</label>
        <input type="date" name="hire_date" class="form-control" id="hire_date" placeholder="Hire Date">
    </div>
    <div class="form-group">
        <label for="job_id">Job ID</label>
        <!-- <input type="text" name="job_id" class="form-control" id="job_id" placeholder="Job ID"> -->

        <select name="job_id" class="form-select">
                <!-- masyva kuri gavome is duomenu bazes  -->
                <?php foreach($jobs as $job) { ?>
                        <option value="<?php echo $job["job_id"] ?>"><?php echo $job["job_title"] ?></option>
                <?php } ?>    
        </select>
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" name="salary" class="form-control" id="salary" placeholder="Salary">
    </div>
    <div class="form-group">
        <label for="manager_id">Manager ID</label>
        <input type="text" name="manager_id" class="form-control" id="manager_id" placeholder="Manager ID">
    </div>
    <div class="form-group">
        <label for="department_id">Department ID</label>
        <!-- <input type="text" name="department_id" class="form-control" id="department_id" placeholder="Department ID"> -->
        <select name="department_id" class="form-select">
                <!-- masyva kuri gavome is duomenu bazes  -->
                <?php foreach($departments as $department) { ?>
                        <option value="<?php echo $department["department_id"] ?>"><?php echo $department["department_name"] ?></option>
                <?php } ?>
        </select>
    </div>        
        
    <button type="submit" name="create" class="btn btn-primary">Create</button>
</form>