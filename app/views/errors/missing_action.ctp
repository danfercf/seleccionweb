<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<style type="text/css" >
    .not_found h1{
        color:#CC0000;
        font-size: 36px;
}
    .not_found{
        font-size: 24px;
}
.not_found {
    background: #FEF1EC url(<?php echo $this->Html->url('/')?>/img/not_found.png) 20px center no-repeat;
    padding: 30px;
    padding-left: 160px;
    border: #CC0000 1px solid;
    -moz-border-radius: 5px 5px 5px 5px;
    line-height: 36px;
    text-align: justify;
    margin: 50px auto;
}
</style>
<div class="not_found">
    <h1>La pagina solicitada no se esta disponible</h1>
    
        Si esto no es un error porfavor comuniquese con nosotros y solucionaremos
        el problema los mas antes posible.

        <?php echo $this->Html->link('www.seleccionweb.com', '/')?>
   
</div>
