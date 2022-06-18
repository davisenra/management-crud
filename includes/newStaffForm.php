<main>

    <section class="mt-4">
        <div class="container">

            <h4>Menu</h4>
            <a href="index.php">
                <button class="btn btn-primary btn-sm">Voltar</button>
            </a>

        </div>
    </section>

    <section class="mt-4">
        <div class="container">

            <h4><?=TITLE?></h4>

            <form method="post" class="d-flex flex-column gap-2">
                <div class="form-group w-50">
                    <div class="input-group">
                        <span class="input-group-text">Nome</span>
                        <input type="text" name="name" class="form-control" value="<?=$employee->name?>">
                    </div>
                </div>
                <div class="form-group w-50">
                    <div class="input-group">
                        <span class="input-group-text">Cargo</span>
                        <input type="text" name="role" class="form-control" value="<?=$employee->role?>">
                    </div>
                </div>
                <div class="form-group w-50">
                    <div class="input-group">
                        <span class="input-group-text">Salário</span>
                        <input type="number" name="wage" class="form-control" value="<?=$employee->wage?>">
                        <span class="input-group-text">R$</span>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>

        </div>
    </section>

</main>