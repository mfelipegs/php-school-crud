<?php 
include("../models/conexao.php");
include("blades/header.php") 
?>

<div class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
    <a class="btn btn-success" href="cadastro.php">
        <span class="material-symbols-outlined" style="font-size: 30px;">
            add
        </span>
    </a>
    <hr>
        <form action="index.php" method="post">
            <input type="text" name="buscar" size="30" placeholder="Buscar" class="form-control">
        </form>
    <hr>

    <?php
    if(empty($_POST["buscar"])){
        echo "Nenhum resultado";
    } else { 
    $varBusca = $_POST["buscar"];
    ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Frase</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>  
        <tbody>

        <?php   
        $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE nome LIKE '%$varBusca%'");
        while($exibe = mysqli_fetch_array($query)){
            $varSexo = ($exibe[3]=="m")?"o":"a";
            echo "<tr>" .
                "<td>". strtoupper($varSexo) .  " alun$varSexo <b>". $exibe[1] ."</b> mora na cidade de ". $exibe[2].".</td>" .
                "<td><a data-bs-toggle='modal' data-bs-target='#JanelaModalEdit".$exibe[0]."' class='btn btn-primary' href='cadastroAtualiza.php?ida=".$exibe[0]."'>
                    <span class='material-symbols-outlined' style='color: white;'>
                        edit
                    </span>
                </a></td>" .
                "<td><a data-bs-toggle='modal' data-bs-target='#JanelaModalDelete".$exibe[0]."' class='btn btn-danger' href='../controllers/deletarAluno.php?ida=".$exibe[0]."'>
                    <span class='material-symbols-outlined' style='color: white;'>
                        delete
                    </span>
                </a></td>" .
                "</tr>";

        ?>
            <div id="JanelaModalEdit<?=$exibe[0]?>" class="modal fade">
                <!-- Você pode utilizar as classes: "modal-dialog modal-sm", "modal-fullscreen" e "modal-dialog-scrollable" -->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Atenção!</h3>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja navegar para a tela de edição dos dados?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href='cadastroAtualiza.php?ida=<?=$exibe[0]?>'>Confirmar</a>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="JanelaModalDelete<?=$exibe[0]?>" class="modal fade">
                <!-- Você pode utilizar as classes: "modal-dialog modal-sm", "modal-fullscreen" e "modal-dialog-scrollable" -->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Atenção!</h3>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir o registro?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href='../controllers/deletarAluno.php?ida=<?=$exibe[0]?>'>Confirmar</a>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
            echo "</table>"."</div>";
        ?>
        </tbody>
    </table>
    <?php } ?>
    
<?php
include("blades/footer.php")
?>
