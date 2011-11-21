<?php
$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
?>
<?php $readys=$this->requestAction('/users/planes'); ?>
<!--NUEVO-->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
<style type="text/css">
    /*NUEVO*/
         #demo-frame >  div.demo 
         { 
            padding: 10px;
            width: 390px;
         }
         #demo-frame{
                clear: right;
                overflow: hidden;
                position: relative;
                width: 420px;
         }
         
         .ui-slider-horizontal .ui-slider-handle { 
              background: url("../img/redondo.png") no-repeat scroll 0 0px transparent;
              border: medium none !important;
              height: 27px;
              width: 27px;
         }
         
         .ui-slider-horizontal
         {
                background: url("../img/barra.png") no-repeat scroll 0 4px transparent; 
                border: medium none;
                height: 21px;
            
         }
         
         
         /*
         #content .content_content #main .content_up_how .middle .price .hire  #divPrecio
                {
                    
                    
                }
           */     
                
    /*FIN NUEVO*/
    </style>
    
                
    <script type="text/javascript">
    //NUEVO
                	$(function()
                    {
                      $('#slider1').bxSlider({
                        displaySlideQty: 6,
                        moveSlideQty: 1
                      });
                    });
                        
                    
        
                   $(function() 
                   {
                            var precio_fijo=5;
                    		$( "#slider" ).slider({
                    			//value:100,
                                value:10,
                    			min: 10,
                    			//max: 500,
                                max: 200,
                    			//step: 50,
                                step: 1,
                    			slide: function( event, ui ) {			
                                	$( "#amount" ).html( "" + ui.value );
                                    $( "#precio" ).html( "" + ui.value*precio_fijo );
                    			}
                    		});		
                            $( "#amount" ).html( "" + $( "#slider" ).slider( "value" ) );
                            $( "#precio" ).html( "" + $( "#slider" ).slider( "value" )*precio_fijo );                   
                    
            	     });
    //FIN NUEVO                                          
    </script>

<script type="text/javascript">
/*
var unitario=<?php  //echo $readys[0]['Payment']['costo']?>;
$(function(){
$('#slider').slider({
    animate: true, 
    value: 10,
    min:10, 
    max:200,
    slide: function(event, ui) { 
        $('#costo').html((ui.value*unitario )+ 'usd');
        $('#numero-preguntas').html(ui.value);

    }
});
});
*/
</script>
<div id="content">
            <div class="head_content"> 
              <div class="main">
                <h1> Ventajas y Precios </h1>
              </div>  
            </div>    
              <div class="content_content">
               <div id="main">
                    <div class="content_up_how">
                        <h2> 30 DIAS DE PRUEBA</h2>
                        <h3> NO REQUIERE TARJETA DE CREDITO. SE CANCELA AUTOMATICAMENTE</h3>
                        <div class="plans">
                            <ul>
                                <li>
                                    <p class="basic">Basic</p><p class="fifty">50</p>
                                    <p class="usd">USD</p><p class="select">10 VIDEO SELECCIONES</p>
                                    
                                    <?php echo $html->link($b['registro'], "/pages/register") ?> 
                                    <input type="button" class="reg" /></li>
                                    </a>
                                    
                                <li>
                                        <p class="basic">Standart</p>
                                        <p class="fifty">240</p>
                                        <p class="usd">USD</p><p class="select">10 VIDEO SELECCIONES</p>
                                        <?php echo $html->link($b['registro'], "/pages/register") ?>
                                            <input type="button" class="reg" />
                                        </a>
                                </li>
                                
                                <li>
                                        <p class="basic">Plus</p>
                                        <p class="fifty">470</p>
                                        <p class="usd">USD</p>
                                        <p class="select">10 VIDEO SELECCIONES</p>
                                        
                                        <?php echo $html->link($b['registro'], "/pages/register") ?>
                                            <input type="button" class="reg" />
                                        </a>
                                </li>
                                <li>
                                        <p class="basic">High</p>
                                        <p class="fifty">680</p>
                                        <p class="usd">USD</p>
                                        <p class="select">10 VIDEO SELECCIONES</p>
                                        
                                        <?php echo $html->link($b['registro'], "/pages/register") ?>
                                              <input type="button" class="reg" />
                                        </a>
                                </li>
                            </ul>
                        </div>
                        <div class="middle">
                            <div class="advantage">
                                    <h3>Nuestras ventajas</h3>
                                        <ul>
                                            <li><a href="#">Administración desde el panel de control de múltiples Video selecciones.</a></li>
                                            <li><a href="#">Listas con preguntas para cada video selección totalmente personalizadas</a></li>
                                            <li><a href="#">Ver las video selecciones cuantas veces lo desee.</a></li>
                                            <li><a href="#">Compartir las video selecciones con pares o clientes. </a></li>
                                            <li><a href="#">Y muchas ventajas más. </a></li>
                                        </ul>
                            </div>
                            <div class="price">
                                    <h3>Regulador de Precio</h3>
                                    
                                    <div class="regulator">
                                        <p class="left">10</p><p class="right"> 200 </p>
                                        <!-- <p><img src="images/scroll.png" /></p>-->
                                        
                                         <div id="demo-frame">

                                            <div class="demo">                                             
                                             <div  id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                             <a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                             </div>
                                            </div>                        
                                         </div><!-- End demo -->
                                        
                                    </div>
                                    
                                        <p class="solid"><span id="amount"></span> VIDEO SELECCIONES</p>
                                        
                                    <div class="hire">            
                                                                        
                                                <p>                                                
                                                       <span id="precio" "></span>
                                                        
                                                 USD
                                                       
                                                 <input type="button" class="bottom" /></p>
                                                   
                                    </div>
                            </div>
                        </div>
                        <div class="sidebar">
                            <a href="#" class="title"> EMPRESAS QUE YA UTILIZAN SELECCIONWEB </a>
                              <div class="side">
                                
                                    <ul id="slider1">
                                        <li><a href="#"><?php echo $html->image("file1.png", array('alt' => 'file1')) ?></a></li>
                                        <li><a href="#"><?php echo $html->image("file2.png", array('alt' => 'file2')) ?></a></li>
                                        <li><a href="#"><?php echo $html->image("file3.png", array('alt' => 'file3')) ?></a></li>
                                        <li><a href="#"><?php echo $html->image("file4.png", array('alt' => 'file4')) ?></a></li>
                                        <li><a href="#"><?php echo $html->image("file5.png", array('alt' => 'file5')) ?></a></li>
                                    </ul>
                                
                              </div>
                        </div>
                    </div>
               </div>  
            </div>
</div> 