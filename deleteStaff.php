<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Employee;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
    exit;
}

$employee = Employee::getEmployee($_GET['id']);

if(!$employee instanceof Employee){
    header('Location: index.php?status=error');
    exit;
}

if(isset($_POST['delete'])){
    $employee->deleteEmployee();

    header('Location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__ . "/includes/deleteStaff.php";
include __DIR__."/includes/footer.php";