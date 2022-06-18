<?php

use \App\Entity\Employee;

    $alert = "";
    if(isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $alert = '<div class="alert alert-success">Operação realizada com sucesso!</div>';
                break;

            case 'error':
                $alert = '<div class="alert alert-danger">Operação não foi realizada!</div>';
                break;
        }
    }

    $employees = Employee::getAllEmployees();

    $results = "";

    foreach($employees as $employee) {
        $results .=
            "<tr>
                <td>$employee->id</td>
                <td>$employee->name</td>
                <td>$employee->role</td>
                <td>R$ $employee->wage,00</td>
                <td>
                    <a href='editStaff.php?id=$employee->id'><button type='button' class='btn btn-primary btn-sm'>Editar</button></a>
                    <a href='deleteStaff.php?id=$employee->id'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></a>
                </td>
            </tr>";
    }

?>

<main>

    <section class="mt-4">
        <div class="container">
            <?=$alert?>
            <h4>Menu</h4>
            <a href="newStaff.php">
                <button class="btn btn-primary btn-sm">Novo funcionário</button>
            </a>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">

            <h4>Lista de funcionários</h4>

            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?=$results?>
                </tbody>

            </table>
        </div>
    </section>

</main>