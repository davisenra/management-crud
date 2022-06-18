<main>

    <section class="mt-4">
        <div class="container">

            <h4>Remover funcionário</h4>

            <form method="post" class="d-flex flex-column gap-2">
                <div class="form-group w-50">
                    <p>Deseja remover o funcionário <strong><?=$employee->name?></strong>?</p>
                </div>

                <div class="form-group mt-2">
                    <a href="index.php"><button type="button" class="btn btn-primary btn-sm">Cancelar</button></a>
                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Sim, confirmar exclusão</button>
                </div>
            </form>

        </div>
    </section>

</main>