<div id="paginacao">
    <?php
    $numeraçãoFinal = 0;
    for ($cont = 0; $cont < $paginacao['COUNT(*)']; $cont = $cont + 10) {
        $numeraçãoFinal++;
    };
    $numeração = $numeroPagina;
    ?>
    <p id="pagina">Página <?php echo $page ?> de <?php echo $numeraçãoFinal ?> </p>


     
    <?php 

    $contadorteste = 0;
    if($page > 3){
        ?>
           <p><a href="anuncios.php?page=1&estado=<?= $estado ?>&cidade=<?= $cidade ?>">1</a></p>
         <p><a href="anuncios.php?page=<?= $page-2 ?>&estado=<?= $estado ?>&cidade=<?= $cidade ?>"><?php echo $page-2; ?></a></p>
         <p><a href="anuncios.php?page=<?= $page-1 ?>&estado=<?= $estado ?>&cidade=<?= $cidade ?>"><?php echo $page-1; ?></a></p>
         <?php
    }else if($page > 2){
        ?>
        <p><a href="anuncios.php?page=<?= $page-2 ?>&estado=<?= $estado ?>&cidade=<?= $cidade ?>"><?php echo $page-2; ?></a></p>
         <p><a href="anuncios.php?page=<?= $page-1 ?>&estado=<?= $estado ?>&cidade=<?= $cidade ?>"><?php echo $page-1; ?></a></p>
        <?php
    }else{
        ?>
        <p><a href="anuncios.php?page=1&estado=<?= $estado ?>&cidade=<?= $cidade ?>">1</a></p>
        <?php
    }
    for ($cont = $page * 10; $cont < $paginacao['COUNT(*)']; $cont = $cont + 10) {
        $numeração++;
        $contadorteste++;
        if ($contadorteste == 3) {
            break;
        }
        ?>
        <p><a href="anuncios.php?page=<?= $numeração ?>&estado=<?= $estado ?>&cidade=<?= $cidade ?>"><?php echo $numeração; ?></a></p>
    <?php }
    

    if ($page != $numeraçãoFinal - 1 && $page != $numeraçãoFinal && $page != $numeraçãoFinal - 2) : ?>
        <p><a href="anuncios.php?page=<?= $numeraçãoFinal ?>&estado=<?= $estado ?>&cidade=<?= $cidade ?>"><?php echo $numeraçãoFinal; ?></a></p>
    <?php endif; ?>
</div>
