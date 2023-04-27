<?php include("blades/header.php"); ?>
    <div class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
        <form action="../controllers/cadastrarAluno.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nome</span>
                </div>
                <input type="text" name="alunoNome" class="form-control" aria-descibedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cidade</span>
                </div>
                <input type="text" name="alunoCidade" class="form-control" aria-descibedby="basic-addon1">
            </div>
            <div class="form-check">
                <input type="radio" value="m" name="alunoSexo" class="form-check-input">
                <label class="form-check-label">M</label>
            </div>
            <div class="form-check">
                <input type="radio" value="f" name="alunoSexo"class="form-check-input">
                <label class="form-check-label">F</label>
            </div>
            <div class="mt-3"></div>
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </form>
    </div>
<?php include("blades/footer.php"); ?>