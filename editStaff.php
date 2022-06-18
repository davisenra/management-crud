<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Employee;

define('TITLE','Editar funcionário');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
    exit;
}

$employee = Employee::getEmployee($_GET['id']);

if(!$employee instanceof Employee){
    header('Location: index.php?status=error');
    exit;
}

if(isset($_POST['name'],$_POST['role'],$_POST['wage'])){
    $employee->name = $_POST['name'];
    $employee->role = $_POST['role'];
    $employee->wage = $_POST['wage'];
    $employee->updateEmployee();

    header('Location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__ . "/includes/newStaffForm.php";
include __DIR__."/includes/footer.php";