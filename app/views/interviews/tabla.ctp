
    <table style="margin-top: 10px; margin-left: 0px; width: 615px;">
        <tbody>
            <?php
            if (!empty($interviews)) {
                $i = 0;
                $cambiar="0";
                $camb="1";
                $j=0;
                $g=0;
                foreach ($interviews as $entrevista) {
                    $class = null;
                    
                    if ($i++ % 2 == 0) {
                            $class = ' class="row-b"';
  
                    }
            $cambiar = $entrevista['Selecction']['reference'];  
                     
            if($cambiar==$camb){
                $j++;
            }
            else  {
              $j=0;
            }
            $j++;
            
            if($j==1 ) {echo "<tr class='td_titulo' num_ref='".$entrevista['Selecction']['reference']."'><td>".$entrevista['Selecction']['reference'] . " - ".$entrevista['Selecction']['name']."</td><td></td></tr>";
            $j=0;
            $camb=$entrevista['Selecction']['reference'];
            }
            
            //if($g==1) echo "<tr><td>".$entrevista['Selecction']['reference'] . " - ".$entrevista['Selecction']['name']."</td><td></td></tr>";
            
            ?> 
            <tr <?php echo $class;?>>

                <td id="entrevista-<?php echo $entrevista['Applicant']['id'] ?>" style="width: 340px; position: relative;" class="nombre <?php if($entrevista['Applicant']['ready']=="0") echo 'box_new';?>"><ul class="list_name">
                <li class="l_n"><?php echo $entrevista['Applicant']['name']; ?></li>
                <li class="l_a"><span>Referencia:</span> <?php echo $entrevista['Selecction']['reference']?>  <span> <?php echo "Selecci&oacute;n:</span> ".$entrevista['Selecction']['name'] ?></li>
                </ul></td>
                <td id="entrevis-<?php echo $entrevista['Applicant']['id'] ?>"style="text-align: right; padding: 0pt 4px; width: 310px;" class="oc_detalle">
                <span tg="<?php echo $entrevista['Applicant']['id'] ?>" class="gusta <?php if($entrevista['Applicant']['gender']=="m") echo "me_gusta"; else echo 'no_gusta'; ?>" ><?php if($entrevista['Applicant']['gender']=="m") echo "No me gusta"; else echo 'Me gusta'; ?></span>
                    <label for="Estado activo">Estado Activo</label>
               <!--     <input type="checkbox"  value="<?php echo $entrevista['Applicant']['id']; ?>" at="<?php echo $entrevista['Applicant']['status']?>" name="estado" style="margin-right: 20px;" checked="<?php  if ($entrevista['Applicant']['status']==1) $ch='true'; else $ch='false';echo $ch?>">
                -->
                <input type="checkbox" value="<?php echo $entrevista['Applicant']['id']; ?>"  name="estado" style="margin-right: 20px;" <?php  if ($entrevista['Applicant']['status']==1) echo "checked='true'";?>   at="<?php echo $entrevista['Applicant']['status']?> " />
                
                </td>
            </tr>

            <tr id="detalle-entrevista-<?php echo $entrevista['Applicant']['id']; ?>" class="detalle">
         
                <td colspan="2" style=" padding-bottom: 10px;">
                    <div class="contenido-detalle">
                        <div id="imagen" class="left">
                            <div class="sombra">
                                <?php
                                echo $this->Html->image(
                                        ($entrevista['Applicant']['photo'] != '') ? "applicants/mini/".$entrevista['Applicant']['photo'] : 'applicants/mini/logo-blank.png',
                                        array('alt' => 'Foto personal', "class" => 'thumbail'));
                                ?>
                            </div>
                            <div style="text-align: center">
                                <span class="view-interview">
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image(
                                                    "video.png", array("alt" => "ver entrevista")
                                            ),
                                            array('controller' => 'interviews', 'action' => 'view', $entrevista['Applicant']['id']),
                                            array('escape' => false, 'class'=>'fixedAjaxDOMWindow')
                                    )
                                    ?>
                                </span>
                                <span class="renew">
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image(
                                                    "reload.png", array("alt" => "volver a entrevistar")),
                                            "/interviews/re_interview/" . $entrevista['Applicant']['id'],
                                            array('escape' => false)
                                    )
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div id="descripcion" class="right"><br/>
                           <?php echo  "<span class='text_detalle'>Profesi&oacute;n:</span> ".$entrevista['Applicant']['description']."<br/>";?>
                            <?php echo  "<span class='text_detalle'>Email:</span> ".$entrevista['Applicant']['email']."<br/>";?>
                            <?php echo  "<span class='text_detalle'>Tel&eacute;fono:</span> ".$entrevista['Applicant']['phone']."<br/>";?>
                            <?php echo  "<span class='text_detalle'>Pa&iacute;s:</span> <span style='text-transform: lowercase;'>".$entrevista['Applicant']['pais']."</span><br/>";?>
                            <?php echo  "<span class='text_detalle'>Ciudad:</span> ".$entrevista['Applicant']['address']."<br/>";?>
                            <br/>
                            <h3>Descripcion corta</h3>
                            <p class="descrip">
 
                             <?php //echo  $entrevista['Applicant']['description']."<br/>";
                             echo $this->Form->input('', array('type' => 'textarea', 'escape' => false,'id'=>'id_'.$entrevista['Applicant']['id'],'label'=>'','value'=>$entrevista['Applicant']['description'], 'style'=>'color: #555555;font-family: arial;font-size: 12px;height: 60px;width: 460px;','class'=>'coment'));
                             ?>
                            <a class="actualizar" id_com="<?php echo $entrevista['Applicant']['id'];?>" style="float: right;cursor: pointer;">Actualizar Comentario</a>

                              <!--  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper 
                                feugiat dolor dapibus cursus. Ut a lacus velit, pharetra ullamcorper massa. Praesent
                                porta vehicula nibh, in convallis-->
                            </p>
                            <div class="clear_space_h"></div>
                            
                            <h3>Promedio Postulante</h3>
                             
                              <?php $pe=$entrevista['Rating']['personality'];
                                $kn=$entrevista['Rating']['knowledge'];
                                $pr=$entrevista['Rating']['presentation'];
                                $promedio=($pe+$kn+$pr)/3;
                                ?>
                             <script type="text/javascript">
                                    $(function(){
                                        $('#promedio-<?php echo $entrevista['Applicant']['id']?>').raty({
                                            starOn:    'startazul.png',
                                            starOff:   'startgriz.png',
                                            start: <?php echo  $promedio?>,
                                            path: '<?php echo $this->Html->url('/') ?>img/'
                                        });
                                    })
                                </script>
                               <span id="promedio-<?php echo $entrevista['Applicant']['id']?>"></span>
                                
                             <div class="clear_space_h"></div>
                            <h3>Calificar Postulante</h3>
                            <div>
                                <span>Personalidad : </span>
                               
                                <script type="text/javascript">
                                    $(function(){
                                        $('#personality-<?php echo $entrevista['Applicant']['id']?>').raty({
                                            starOn:    'startazul.png',
                                            starOff:   'startgriz.png',
                                            start: <?php echo $entrevista['Rating']['personality']?>,
                                            path: '<?php echo $this->Html->url('/') ?>img/',
                                            click: function(score, evt) {
                                                  var rol='<?php echo $this->Session->read('rol');?>';
                                              if(rol!='video')  
                                                {
                                                //alert('score: ' + score + ' id: '+ <?php echo $entrevista['Applicant']['id']?>);
                                                $.ajax({
                                                    url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify')) ?>/'+<?php echo $entrevista['Rating']['id']?>+'/personality/'+score
                                                });
                                              }}
                                        });
                                    })
                                    
                                </script>
                                <span id="personality-<?php echo $entrevista['Applicant']['id']?>"></span>

                                <span>Conocimiento : </span>
                                <script type="text/javascript">
                                    $(function(){
                                        $('#knowledge-<?php echo $entrevista['Applicant']['id']?>').raty({
                                            starOn:    'startazul.png',
                                            starOff:   'startgriz.png',
                                            start: <?php echo $entrevista['Rating']['knowledge']?>,
                                            path: '<?php echo $this->Html->url('/') ?>img/',
                                            click: function(score, evt) {
                                                  var rol='<?php echo $this->Session->read('rol');?>';
                                              if(rol!='video')  
                                                {
                                                $.ajax({
                                                    url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify')) ?>/'+<?php echo $entrevista['Rating']['id']?>+'/knowledge/'+score
                                                });
                                              }}
                                        });
                                    })

                                </script>
                                <span id="knowledge-<?php echo $entrevista['Applicant']['id']?>"></span>
                                <span>Presentacion : </span>
                                <script type="text/javascript">
                                    $(function(){
                                        $('#presentation-<?php echo $entrevista['Applicant']['id']?>').raty({
                                            starOn:    'startazul.png',
                                            starOff:   'startgriz.png',
                                            start: <?php echo $entrevista['Rating']['presentation']?>,
                                            path: '<?php echo $this->Html->url('/') ?>img/',
                                            click: function(score, evt) {
                                                
                                                  var rol='<?php echo $this->Session->read('rol');?>';
                                              if(rol!='video')  
                                                {
                                                
                                                 $.ajax({
                                                    url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify')) ?>/'+<?php echo $entrevista['Rating']['id']?>+'/presentation/'+score
                                                });
                                              }}
                                        });
                                    })

                                </script>
                                <span id="presentation-<?php echo $entrevista['Applicant']['id']?>"></span>
                            </div>
                            <div class="clear_space_h"></div>
                            <div style="padding-left: 65px;">
                                <input type="radio"> Recomendar a otra seleccion :
                                <?php echo $this->Form->input('recomendacion', array('label'=>false, 'div'=>false, 'options'=>$selecctions, 'style'=>'width:200px;', 'id'=>'recomendacion-'.$entrevista['Applicant']['id']));?>
                            </div>
                        </div>
                    </div>
                </td>
                
            </tr>
            <script type="text/javascript" >
                $(function(){
                    
                    $('#entrevista-<?php echo $entrevista['Applicant']['id'] ?>').click(function(){
                        
                        //alert(1);
                        $('#entrevista-<?php echo $entrevista['Applicant']['id'] ?>').toggleClass('entrevista-actual');
                       
                         var rol='<?php echo $this->Session->read('rol');?>';
                         if(rol=='administrador' || rol=='cliente')  
                         {
                        
                            if($('#entrevista-<?php echo $entrevista['Applicant']['id'] ?>').hasClass('box_new')){
                                contador=contador-1;
                                $("#pending-messages-id").html("<a>"+contador+"</a>");
                                $(".msg_sin_leer").html("Tiene "+contador+" entrevistas sin ver");    
                                $('#entrevista-<?php echo $entrevista['Applicant']['id'] ?>').removeClass('box_new');
                                 $.ajax({
                                    url: '<?php echo $this->Html->url(array('controller' => 'applicants', 'action' => 'vista')) ?>/<?php echo $entrevista['Applicant']['id'] ?>/1'
                                });
                            }
                        }
                        $('#detalle-entrevista-<?php echo $entrevista['Applicant']['id'] ?>').slideToggle("slow");
                    });
                     $('#entrevis-<?php echo $entrevista['Applicant']['id'] ?>').click(function(){
                       // $('#entrevista-<?php echo $entrevista['Applicant']['id'] ?>').addClass('entrevista-actual');
                      // alert(2);
                    });
                });
            </script>
            <?php }
            } else {
            ?>
            <tr><td colspan="2"> No hay postulantes</td> </tr>
            <?php } ?>
        </tbody>
    </table>
 <div style="display: none;">
  <div id="em_cl">
  <?php echo $this->Form->input('User.id', array('label'=>'Cliente Usuario', 'div'=>false, 'options'=> $users, 'class'=>'selecto','id'=>'select_cliete', 'style'=>'width: 200px;'));?>
</div>
 <div id="em_sel">
<?php echo $this->Form->input('Applicant.selecction_id', array('label'=>'Seleccion', 'div'=>false, 'options'=>$selecctions,  'class'=>'selecto','id'=>'select_seleccion0','style'=>'width: 200px;'));?>
</div>



</div>
