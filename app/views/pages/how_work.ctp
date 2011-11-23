<script type="text/javascript">
    $(function(){
        $('#how_works').tabs();
    });

</script>
<?php ?>
<style type="text/css" >
    .ui-tabs-nav li.ui-tabs-selected{

        background: #F5F5F5 scroll repeat;
        border-top: #5B8EBB 2px solid!important;
        color: #5B8EBB;
    }
    .ui-tabs .ui-tabs-nav {
        margin: 0;
        padding: 0;
    }
    .ui-tabs .ui-tabs-nav li.ui-tabs-selected, .ui-tabs .ui-tabs-nav li {
        width: 400px;
        padding: 0px !important;
        height: 30px;
        border-top-width: 0;
        margin-right: 0;
        border-left-width: 0px; border-right-width: 0px; bottom: 0px; top: 0px;

    }
    .ui-tabs .ui-tabs-nav li a {
        width: 250px;
        font-size: 14px;
        font-weight: bold;
    }

    .ui-tabs .ui-tabs-nav li.ui-tabs-selected a{
        color: #5b8ebb;
    }
    .ui-tabs .ui-tabs-nav lu{
        border-width: 0 !important;
    }
    .ui-widget-content {
        background-color: #FFFFFF !important;
        border: 1px ridge #D3D3D3;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
        background: none repeat scroll 0 0 #FFFFFF;
        border: 1px solid #D3D3D3;
        color: #555555;
        font-weight: normal;
        border-top: 2px solid #FFFFFF !important;
    }
    .ui-corner-all {
        -moz-border-radius: 0px 0px 0px 0px !important;
    }

    .ui-widget-header {
        background: none repeat scroll 0 0 #E6E6E6;
        border: medium none;
        color: #222222;
        font-weight: bold;
        height: 35px;
    }
    #cuenta{
        border-width: 0px;
        padding: 0px;
    }
    #cuenta ul{
        border: none;
    }
    #selecciones-creadas, #preguntas-disponibles{
        color: #A3A3A3;
        font-weight: bold;
        font-size: 10px;
    }
    #selecciones-creadas span, #preguntas-disponibles span{
        color: #456c8d;
        font-weight: bold;
        font-size: 10px;
        float: right;
    }
    .inactive{
        color: #A3A3A3 !important;
        font-weight: normal !important;
    }
    .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
        color: #9f9f9f;
        text-decoration: none;
    }
    #how_works{
        font-family: Arial !important;
        margin-bottom: 60px;
        text-align: justify;
    }
</style>
<div id="content">
                    <div class="head_content"> 
                              <div class="main">
                                   <h1>¿ Como Funciona ?</h1>
                              </div>  
                    </div>    
                    
              <div class="content_content">
              
               <div id="main">
                            <div class="content_up_how">
                                        <div class="video">
                                            <?php echo $html->image("video_how.jpg", array('alt' => 'video')) ?>
                                        </div>
                                <div class="text">
                                                  <div class="text_up">  
                                                            <p>
                                                                 SeleccionWeb, una plataforma fácil y rápida diseñada para que empresas, consultoras o                                                                         profesionales reduzcan  tiempos y  costos, en la selección de personal.
                                                            </p>
                                                            <p>
                                                                    Reemplace y agilice los procesos de selección o preselección con el uso de Video                                                                            Entrevistas de preselección.
                                                            </p>
                                                    </div>
                                                     
                                                  <div class="text_down">
                                                    
                                                                        <p>
                                                                            Cuando recibís un mail de SeleccionWeb, responde cómodamente desde tu hogar a las                                                                              preguntas  que te realice tu futuro empleador.
                                                                        </p>
                                                                        <p>
                                                                              Deberás tener solamente una Camara web, Microfono y conexión a internet.
                                                                              SeleccionWeb garantiza la privacidad de tus respuestas. 
                                                                         </p>
                                                  </div>
                                                  <p>
                                                   <a href="registrate.html">
                                                        <input type="button" class="buttom"  />
                                                  </a>
                                                  </p>  
                                </div>
                            </div>
                    
                            <div class="content_down_how">
                                <div class="content_down_how_left">
                                        <h3>Preguntas frecuentes</h3>
                                            <ul>
                                                <li><a href="#">Qué es SelecciónWeb.com?</a></li>
                                                <li><a href="#">Para qué tipo de empresa es útil el servicio de SelecciónWeb?</a></li>
                                                <li><a href="#">Cómo funciona SelecciónWeb?</a></li>
                                                <li><a href="#">Se puede obtener Curriculum Vitae / Hojas de Vida de 
                                                                los pustulantes en la página de SelecciónWeb?</a></li>
                                                <li>
                                                    <a href="#">Necesito algún tipo de tecnología avanzada para usar esta herramienta?</a>
                                                </li>
                                            </ul>
                                            <a href="#" class="more"> Leer mas pregungtas Frecuentes </a>
                                </div>
                                
                                <div class="content_down_how_right">
                                    <h3>Testimonios</h3>
                                        <ul>
                                            <li>
                                                    <?php echo $html->image("photo1.png", array('class' => 'photo')) ?>
                                                    <div class="test">
                                                                <?php echo $html->image("open.png", array('class' => 'open')) ?>
                                                                <p>Fue una experiencia nueva por consecuente senti un poco de nervios al desarrollarla, pero                                                                       creo que  es una herramienta muy util para mejorar la selección de recursos humanos... 
                                                                </p>
                                                                <?php echo $html->image("close.png", array('class' => 'close')) ?>
                                                                <p>- Marcos Rivero. <a href="#">Postulante</a></p>
                                                    </div>
                                                        <?php echo $html->image("line.png", array('class' => 'line')) ?>
                                                        
                                            </li>
                                            <li>
                                            <?php echo $html->image("photo2.png", array('class' => 'photo')) ?>
                                            
                                            <div class="test">
                                                        <?php echo $html->image("open.png", array('class' => 'open')) ?>
                                                        <p>
                                                             La verdad que no sabia que se podian realizar entrevistas con esta modalidad. Pienso que es mucho                                                              mas efectivo que un examen online porque podes ver los gestos de la persona y las tonalidades                                                                 con las que habla. Fue una muy linda experiencia... 
                                                        </p>
                                                        
                                                            <?php echo $html->image("close.png", array('class' => 'close')) ?>
                                                            <p>- Stephanie Eskenazi. <a href="#">Cliente de Empresas</a></p>
                                               </div>
                                                <?php echo $html->image("line.png", array('class' => 'line')) ?>
                                            </li>
                                            <li>
                                            
                                            <?php echo $html->image("photo2.png", array('class' => 'photo')) ?>
                                            <div class="test">
                                            <?php echo $html->image("open.png", array('class' => 'open')) ?>
                                            <p>Una nueva experiencia, sumamente interesante desde el punto de vista del candidato, ya que permite acomodar sus horarios; y desde el punto de vista de la empresa, ya que permite realizar una primera preselección de candidatos. Felicito lo innovador del servicio que brindan... </p>
                                            <?php echo $html->image("close.png", array('class' => 'close')) ?>
                                            <p>- Gonzalo Iglesias.. <a href="#">Postulante</a></p>
                                            <?php echo $html->image("line.png", array('class' => 'line')) ?>                                            
                                            </li>
                                        </ul>
                                </div>
                            </div>
           
               </div>  
            </div>
</div>