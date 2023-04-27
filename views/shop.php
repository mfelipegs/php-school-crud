<?php 
include("../models/conexao.php");
include("blades/header.php") 
?>
<div class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
    <a class="btn btn-success mb-3" href="index.php">
        <span class="material-symbols-outlined" style="font-size: 30px;">
            arrow_back
        </span>
    </a>
    <table class="table table-bordered table-striped table-hover">
        <?php

        //vai abrir uma linha
        echo "<tr>";
        $i = 1;
        $query = mysqli_query($conexao, "SELECT * FROM aluno");
        while($exibe = mysqli_fetch_array($query)){ 
        //célula com o campo recebido do banco (segunda coluna por ser 1), e vai incrementando o contador $i
        echo "<td>".$exibe[1]."</td>";
        $i++;
        if($i == 4) {
            //se tiver chegado em 3 registros vindos do banco, vai fechar uma linha e abrir outra, e dps reseta
            echo "</tr><tr>";
            $i = 1;
        }
        }
        echo "</tr>";

        ?>
    </table>
</div>
<?php
include("blades/footer.php")
?>
