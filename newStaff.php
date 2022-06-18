<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Employee;

define('TITLE','Cadastrar funcionário');

if(isset($_POST['name'],$_POST['role'],$_POST['wage'])){
    $employee = new Employee;
    $employee->name = $_POST['name'];
    $employee->role = $_POST['role'];
    $employee->wage = $_POST['wage'];
    $employee->registerNewEmployee();

    header('Location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__ . "/includes/newStaffForm.php";
include __DIR__."/includes/footer.php";