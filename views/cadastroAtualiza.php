<?php 
include("../models/conexao.php");
include("blades/header.php");
?>
    <?php
    $query = mysqli_query($conexao,"SELECT * FROM aluno WHERE codigo = ". $_GET["ida"]);
    while($exibe = mysqli_fetch_array($query)){
    ?>
    <div class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
        <form action="../controllers/atualizarAluno.php" method="post">
            <input type="hidden" name="alunoCodigo" value="<?=$exibe[0]?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nome</span>
                </div>
                <input type="text" name="alunoNome" value="<?=$exibe[1]?>" class="form-control" aria-descibedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">Cidade</span>
                </div>
                <input type="text" name="alunoCidade" value="<?=$exibe[2] ?>" class="form-control" aria-descibedby="basic-addon1">
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" value="m" name="alunoSexo" <?=($exibe[3]=="m")?"checked":""?>>
                <label class="form-check-label">M</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" value="f" name="alunoSexo" <?=($exibe[3]=="f")?"checked":""?>>
                <label class="form-check-label">F</label>
            </div>
            <div class="mt-3"></div>
            <input type="submit" value="Atualizar" class="btn btn-success">
        </form>
    </div>

    <?php } ?>

<?php
include("blades/footer.php")
?>