<?php
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
echo $this->Html->css('forms.css');
echo $this->Html->script('qtip/jquery.qtip-1.0.0-rc3.min.js');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'entrevistas');
echo $this->Html->script('jquery/jquery.raty.min.js');
echo $this->Html->script('jquery/jquery.DOMWindow.js');
?>

<script type="text/javascript" >
    $(function(){
        
         
        $('.selecto').append('<option selected="true" >Todos</option>')

        $('select').msDropDown().data("dd");
        $('input[type="radio"]').ezMark();
        $('input[type="checkbox"]:not(".onof")').ezMark({checkboxCls: 'ez-checkbox-iphone', checkedCls: 'ez-checked-iphone'});
        //$('input[type="checkbox"]').click(function(){
        $('.ez-checkbox-iphone').click(function(){
            
              var rol='<?php echo $this->Session->read('rol');?>';
          if(rol!='video')  
            {
            
            //var status = $(this).attr('checked');
            
            if($(this).hasClass('ez-checked-iphone')){
                status = 0;
            }else{
                status = 1;
            }

            $.ajax({
                url: '<?php echo $this->Html->url(array('controller' => 'applicants', 'action' => 'activate')) ?>/'+$(this).children('input[type="checkbox"]').val()+'/'+status
            });
            }
            
        });
        
        $("#imagen span.view-interview").qtip({
            content: 'Ver entrevista',
            corner: {
                target: 'leftTop',
                tooltip: 'bottomLeft'
            },
            style: {
                width: 100,
                height: 18,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 5,
                    color: '#4077A8'
                },
                tip: { // Now an object instead of a string
                    corner: 'topLeft', // We declare our corner within the object using the corner sub-option
                    color: '#4077A8',
                    size: {
                        x: 20, // Be careful that the x and y values refer to coordinates on screen, not height or width.
                        y : 8 // Depending on which corner your tooltip is at, x and y could mean either height or width!
                    }
                }
            }

        });
        $("#imagen span.renew").qtip({
            content: 'Volver a entrevistar',
            corner: {
                target: 'leftTop',
                tooltip: 'bottomLeft'
            },
            style: {
                width: 150,
                height: 18,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 5,
                    color: '#4077A8'
                },
                tip: { // Now an object instead of a string
                    corner: 'topLeft', // We declare our corner within the object using the corner sub-option
                    color: '#4077A8',
                    size: {
                        x: 20, // Be careful that the x and y values refer to coordinates on screen, not height or width.
                        y : 8 // Depending on which corner your tooltip is at, x and y could mean either height or width!
                    }
                }
            }

        });
  
  $("#select_cliete_admin").change(function(){
     $("#select_seleccion").html("");
     $('#select_cliente_div').html("");
            $.ajax({
              url: '<?php echo $this->Html->url(array('controller' => 'interviews', 'action' => 'tabla')) ?>',
              data:$("#form-filtro").serialize() ,  
              type: "POST",           
              success: function(data) {
                $('#select_seleccion').html("");
                $('#select_cliente_div').html("");
                
                $("#live_filter_wrapper").html(data);
                
                $('#select_seleccion').html($('#em_sel').html());
                
                $('#select_cliente_div').html($('#em_cl').html());
                $('#em_sel').remove();
                $('#em_cl').remove();
               
               $('input[type="radio"]').ezMark();
               $('input[type="checkbox"]').ezMark({checkboxCls: 'ez-checkbox-iphone', checkedCls: 'ez-checked-iphone'});
               change_cl();
               change_sel();
                tituloss();
               $('select').msDropDown().data("dd");
              }
            });
            
  });
  change_cl()
  function change_cl(){ 
        $("#select_cliete").change(function(){
           $("#select_seleccion").html("");
            $.ajax({
              url: '<?php echo $this->Html->url(array('controller' => 'interviews', 'action' => 'tabla')) ?>',
              data:$("#form-filtro").serialize() ,  
              type: "POST",           
              success: function(data) {
                $('#select_seleccion').html("");
                $("#live_filter_wrapper").html(data);
                $('#select_seleccion').html($('#em_sel').html());
                $('#em_sel').remove();
                $('#em_cl').remove();
               
               $('input[type="radio"]').ezMark();
               $('input[type="checkbox"]').ezMark({checkboxCls: 'ez-checkbox-iphone', checkedCls: 'ez-checked-iphone'});
               change_sel();
                 tituloss();
               $('select').msDropDown().data("dd");
              }
            });
            
        });
        
  }
    change_sel();    
   function change_sel(){   
$("#select_seleccion0").change(function(){
            $.ajax({
              url: '<?php echo $this->Html->url(array('controller' => 'interviews', 'action' => 'tabla')) ?>',
              data:$("#form-filtro").serialize() ,  
              type: "POST",           
              success: function(data) {
                $("#live_filter_wrapper").html(data);
               $('input[type="radio"]').ezMark();
               $('input[type="checkbox"]').ezMark({checkboxCls: 'ez-checkbox-iphone', checkedCls: 'ez-checked-iphone'});
               $('select').msDropDown().data("dd");
                tituloss();
                 $('#em_sel').remove();
                $('#em_cl').remove();
              }
            });
            
        });
}

        tituloss();
      function tituloss(){  
        $('.td_titulo_exe').click( function(){
            var t=$(this).attr('num_ref');
            $('.filter').val(t);
            $('.filter').keyup();
            return false;
        })
        
}
    });
    
    
    
</script>
<style type="text/css">
    tr{
        height: 40px !important;
    }
    .entrevista-actual{
        font-weight: bold;
        color: #37638A;
    }

    #filtro form fieldset div label.combo {
        margin: 0 20px 0 0;
    }
    #containercategoria, #containerpuntage{
        float: right;
        display: inline;
        padding: 0px !important;
        border: none !important;
        width: 200px;
        margin-top: -3px;
    }

    .detalle{
        height: 300px;
        border-top: none !important;
        cursor: default;
        display: none;
        background: #fafafa url(<?php echo $this->Html->url('/');?>img/f-down.png) 40px -2px no-repeat;
    }
    .sombra {
        float:left;
        background-color: #A7A7A7;
        margin: 10px 0 0 5px;
    }

    .sombra img {
        display: block;
        position: relative;
        background-color: #fff;
        margin: -2px 2px 2px -2px;
        width: 100px;
        width: 100px;
    }

    .thumbail{
        border: 1px #FFFFFF solid;
    }
    #imagen{
        width: 100px;
        margin: auto;
        margin-left: 5px;
        margin-top: 10px;
    }
    #imagen span a{
        color: #fafafa;
    }
    #descripcion{
        width: 460px;
    }
    #descripcion h3{
        margin: 0px;
        color: #37638A;
    }
    #descripcion p{
        margin: 0px;

    }
    .contenido-detalle{
        cursor: auto;
    }
    #containerarea{
        float: right;
        width: 200px;
    }
    #form-filtro, #form-filtro label{
        font-size: 12px;
}
.pending-messages{
        float: right;
    }

tr.row-b{
    background: #EFEBEC;
}

span.gusta{
    border-right: 1px solid;
    margin-right: 6px;
    padding-left: 18px;
    padding-right: 8px;
}

.me_gusta{
        background: #fafafa url(<?php echo $this->Html->url('/');?>img/no_gusta.png) 0px -1px no-repeat;
    }
.no_gusta{
        background: #fafafa url(<?php echo $this->Html->url('/');?>img/me_gusta.png) 0px -1px no-repeat;
    }
    .text_detalle{
    color: #666666;
    font-weight: bold;
    }
    
ul.lista_descripcion{
    display: block;
    margin: 3px 0 0 -1px;
    padding: 1px;
    width: 464px;
}
    
ul.lista_descripcion li{
 
    border: 1px solid #9BC3F8;
    color: #444444;
    list-style: none outside none;
    margin-bottom: 2px;
    padding: 0 2px 0 22px;
    background: url(<?php echo $this->Html->url('/');?>img/bubble.png) no-repeat scroll 3px 4px transparent;
}

.box_new{


    padding-left: 32px;
     background: url(<?php echo $this->Html->url('/');?>img/new.png) no-repeat scroll -2px 4px transparent;
}
ul.list_name{
    line-height: 16px;
    list-style: none outside none;
    margin: 0;
    padding: 0;
}
ul.list_name li{

    margin: 0;
    padding: 0;
}

ul.list_name li.l_n{
font-size: 12px;
}
ul.list_name li.l_a{
    color: #246E8A;
    font-size: 11px;
}

ul.list_name li span{
font-weight: bold;
}

.td_titulo{
      background-color: #37638B;
    border-top: 4px solid #FFFFFF;
    color: #FFFFFF;
    font-size: 13px;
    font-weight: bold;
    height: 24px !important;
    text-transform: uppercase;
    
}
.td_titulo_exe:hover{
     text-decoration: underline;
   
    /*background: url(<?php echo $this->Html->url('/');?>img/private/usuarios.png) no-repeat scroll 1px 1px #37638B;*/
}
#PopupandLeaveopen{
    background: url(<?php echo $this->Html->url('/');?>img/printer.png) no-repeat scroll 0px 0px transparent;
    border-right: 1px solid;
    cursor: pointer;
    display: block;
    float: right;
    font-size: 13px;
    margin-right: 10px;
    margin-top: -1px;
    padding-left: 24px;
    padding-right: 10px;
}
#PopupandLeaveopen:hover{
    text-decoration: underline;

}
.btn_compartir{
   float: right;
}

.check_class {
    float: right;
    margin-left: 10px;
}
 .check_cerrar {
    background: none repeat scroll 0 0 #999999;
    color: #FFFFFF;
    float: right;
    margin-left: 10px;
    padding: 0 16px;
}



ul.sel_class{
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #999999;
    color: #555555;
    font-size: 11px;
    font-weight: normal;
    list-style: none outside none;
    margin: 0;
    padding: 6px;
    position: absolute;
    right: -11px;
    top: 22px;
}

ul.sel_class li{
       border-top: 1px solid #999999;
    margin: 0;
    padding: 6px 0;
}
</style>
<script type="text/javascript">
//alert("rol: <?php echo $this->Session->read('rol');?>");
//alert("hola como es");
    var contador=<?php echo count($ready);?>;
    
    
    
    $(function(){
        
        $('.onof').checkbox({cls:'jquery-safari-checkbox'});
        
        $(".check_cerrar").click(function() {
            $(".sel_class").hide('fast');
            })
        
       $(".sel_class").hide();
       
       $(".btn_compartir").click(function() {
        //$(this).hide();
       var id_sel= $(this).attr('num_ref');
       $("#sele"+id_sel).show('fast');
       })
       
       $(".onof").click(function() {
           var id_sel= $(this).attr('sel');
           var id_user= $(this).attr('idx');
           var val=$(this).parent().children('span').hasClass('jquery-safari-checkbox-checked');//jquery-checkbox-checked
            if(val)
            {
            var num='0';
            $.ajax({
                url: '<?php echo $this->Html->url(array('controller' => 'streams', 'action' => 'delete')) ?>/'+id_user+'/'+id_sel
                });
            }
            else{
                var num='1';
                $.ajax({
                url: '<?php echo $this->Html->url(array('controller' => 'streams', 'action' => 'add')) ?>/'+id_user+'/'+id_sel
                });
            }
       //alert("val: "+num+"sel: "+id_sel+", id user: "+id_user);
       })

        $(".actualizar").click(function() {
          var id_c= $(this).attr('id_com')  ;
           alert("El comentario:\n" + $('#id_'+id_c).val() + ",\n\nActualizado correctamente");
                     $.ajax({
                        url: '<?php echo $this->Html->url(array('controller' => 'applicants', 'action' => 'add_comm')) ?>/'+id_c+'/'+$('#id_'+id_c).val()
                    });
            
            })
        
        
        $('#live_filter_wrapper').liveFilter('table');
        $(".filter").keyup(function() {
             $(".detalle").hide();
            })
        $("tr").click(function() {
            // $(this).next('tr').show();
            })
            
        $(".gusta").click(function() {
            var rol='<?php echo $this->Session->read('rol');?>';
          if(rol!='video')  
            {
             $(this).toggleClass('no_gusta');
             $(this).toggleClass('me_gusta');
             if( $(this).hasClass('me_gusta'))
                {
                    $(this).html('No me gusta');
                     $.ajax({
                        url: '<?php echo $this->Html->url(array('controller' => 'applicants', 'action' => 'fn_megusta')) ?>/'+$(this).attr('tg')+'/m'
                    });
               }
             else
                     {
                    $(this).html('Me gusta');
                     $.ajax({
                         url: '<?php echo $this->Html->url(array('controller' => 'applicants', 'action' => 'fn_megusta')) ?>/'+$(this).attr('tg')+'/f'
                        });
                     }
            }
            })

        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:520,
            width:735,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/')?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
        
        
        $("#PopupandLeaveopen").click(function() {
             printElem({ leaveOpen: true, printMode: 'popup' ,overrideElementCSS: false});
         });

    var nombre="<?php echo $nombre?>";
       if(nombre!="xxx") {
            $(".filter").val(nombre);
           $('.filter').keyup();
       }      
    });
 function printElem(options){
     $('#live_filter_wrapper').printElement(options);
 }
</script>


<div id="entrevistados" class="left-private">
    <h1 class="private-title"> <span id="logo-entrevistas">Listado de Video Selecciones</span> <form style="display: block; font-size: 12px; float: right;margin-right: 12px;" id="filter-form">Filtro: <input style="border: 1px solid #777777;color: #777777;padding-left: 2px;" class="filter" name="livefilter" type="text" value="" maxlength="30" size="20" type="text"></form><a id="PopupandLeaveopen"> imprimir</a></h1>
    <div id="live_filter_wrapper"> 
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
            
            if($j==1 ) {echo "<tr class='td_titulo'><td  class='td_titulo_exe' num_ref='".$entrevista['Selecction']['reference']."'>".$entrevista['Selecction']['reference'] . " - ".$entrevista['Selecction']['name']."</td><td >"; 
            //echo $id_us;
            echo "<div style='position:relative'>";
            echo "<ul class='sel_class' id='sele".$entrevista['Selecction']['id']."'>";
            //echo $this->Form->input('User.id', array('label'=>' ', 'div'=>false, 'options'=> $users, 'class'=>'selecto','id'=>$entrevista['Selecction']['id'], 'style'=>'width: 160px; color:#000; font-size:10px;'));
            foreach ($users as $value => $us) {
                $leer=$value."/".$entrevista['Selecction']['id'];
             if($id_us !=$value)   
            echo "<li>".$us."<span class='check_class'>".$this->Form->checkbox('ver', array('hiddenField' => false ,'class'=>'onof','idx'=>$value,'sel'=>$entrevista['Selecction']['id'],'checked'=>$this->requestAction('/streams/read/'.$leer)))."</span>"."</li>";
            
            }
            echo "<li><a class='check_cerrar'>Cerrar</a></li>";
            echo "</ul>";
             echo "<div>"; 
             if($this->Session->read('rol')=="administrador" || $this->Session->read('rol')=="cliente")
            echo "<a class='btn_compartir' num_ref='".$entrevista['Selecction']['id']."'>Compartir</a>";
             
            echo "</td></tr>";
            $j=0;
            $camb=$entrevista['Selecction']['reference'];
            }
            
            //if($g==1) echo "<tr><td>".$entrevista['Selecction']['reference'] . " - ".$entrevista['Selecction']['name']."</td><td></td></tr>";
            
            ?> 
           
            <tr <?php echo $class;?>>

                <td id="entrevista-<?php echo $entrevista['Applicant']['id'] ?>" style="width: 340px; position: relative;" class="nombre <?php if($entrevista['Applicant']['ready']=="0") echo 'box_new';?>">
                    <ul class="list_name">
                        <li class="l_n"><?php echo $entrevista['Applicant']['name']; ?></li>
                        <li class="l_a"><span>Referencia:</span> <?php echo $entrevista['Selecction']['reference']?>  <span> <?php echo "Selecci&oacute;n:</span> ".$entrevista['Selecction']['name'] ?></li>
                    </ul>
                </td>
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
                           <?php echo  "<span class='text_detalle'>Profesi&oacute;n:</span> ".$entrevista['Applicant']['profesion']."<br/>";?>
                            <?php echo  "<span class='text_detalle'>Email:</span> ".$entrevista['Applicant']['email']."<br/>";?>
                            <?php echo  "<span class='text_detalle'>Tel&eacute;fono:</span> ".$entrevista['Applicant']['phone']."<br/>";?>
                            <?php echo  "<span class='text_detalle'>Celular:</span> ".$entrevista['Applicant']['celular']."<br/>";?>
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
                                            start: <?php echo $entrevista['Applicant']['general']; ?>,
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
                       
                         var userid='<?php echo $id_us;?>';
                         var selid='<?php echo $entrevista['Selecction']['user_id'];?>';
                        // alert(userid);
                       //  alert(selid);
                       //  if(rol=='administrador' || rol=='cliente')
                          if(userid==selid)  
                         {
                        
                            if($('#entrevista-<?php echo $entrevista['Applicant']['id'] ?>').hasClass('box_new')){
                                contador=contador-1;
                                $("#pending-messages-id").html("<a>"+contador+"</a>");
                                $(".msg_sin_leer").html("Tiene "+contador+" selecciones sin ver");    
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
    </div>
</div>
<div style="display: block; float: right; position: relative; width: 300px;">
<div id="filtro" class="right-private">
    <h1 id="panel-filtro">Filtrar Busqueda</h1>
    <div class="clear_space_h"></div>
    <?php echo $this->Form->create('Interview', array('action' => 'index', 'id'=>'form-filtro')); ?>
    <div>
     <?php 
      

     if($rol=="admin"){
     ?>
    
        <div style="margin: 10px 0px;height: 32px;  border-bottom: 1px solid #E2E3E4">
            <?php echo $this->Form->input('Client.id', array('label'=>'Clientes Admin.', 'div'=>false, 'options'=>$client, 'class'=>'selecto','id'=>'select_cliete_admin', 'style'=>'width: 200px;'));?>
        </div>
      <?php    
    }
     
     if($rol=="admin" || $rol=="administrador"   ){ ?>
        <div id="select_cliente_div" style="margin: 10px 0px;height: 32px;  border-bottom: 1px solid #E2E3E4">
            <?php echo $this->Form->input('User.id', array('label'=>'Cliente Usuario', 'div'=>false, 'options'=> $users, 'class'=>'selecto','id'=>'select_cliete', 'style'=>'width: 200px;'));?>
        </div>
        
         <?php }
     ?>
        <div id="select_seleccion" style="margin: 10px 0px;height: 32px;  border-bottom: 1px solid #E2E3E4">
            <?php echo $this->Form->input('Applicant.selecction_id', array('label'=>'Seleccion', 'div'=>false, 'options'=>$selecctions,  'class'=>'selecto','id'=>'select_seleccion0','style'=>'width: 200px;'));?>
        </div>
        <!--
        <div style="margin: 10px 0px;height: 32px; border-bottom: 1px solid #E2E3E4">
            <label style="margin-right: 53px;">Genero</label>
            <input type="radio" value="m" name="data[Applicant][gender]"><span style="margin-left: 5px; margin-right: 20px;">Hombre</span>
            <input type="radio" value="f" name="data[Applicant][gender]" ><span style="margin-left: 5px;">Mujer</span>
        </div>
        -->
        <div style="margin: 6px 0px;height: 32px; border-bottom: 1px solid #E2E3E4">
            <label style="margin-right: 42px;">Me gusta</label>
            <input type="radio" value="f" name="data[Applicant][gender]" ><span style="margin-left: 5px;margin-right:12px;">Me gusta</span>
            <input type="radio" value="m"  name="data[Applicant][gender]"><span style="margin-left: 5px;">No me gusta</span>
        </div>
        <div style="margin: 10px 0px;height: 32px; border-bottom: 1px solid #E2E3E4">
            <label style="margin-right: 53px;">Estado</label>
            <input type="radio" value="1" name="data[Applicant][status]" ><span style="margin-left: 5px;margin-right: 36px;">Activo</span>
            <input type="radio" value="0"  name="data[Applicant][status]"><span style="margin-left: 5px;">Inactivo</span>
        </div>
        
        <div style="margin: 10px 0px; height: 32px; border-bottom: 1px solid #E2E3E4">
            <label  class="combo">Puntaje</label>
            <select name="data[Applicant][general]" title="" id="puntage" style="width: 200px;">
                <option value="x" selected="selected">Todos</option>
                <option value="5">5 Estrellas</option>
                <option value="4">4 Estrella</option>
                <option value="3">3 Estrella</option>
                <option value="2">2 Estrella</option>
                <option value="1">1 Estrella</option>

            </select>
        </div>
    </div>
    <input type="submit" value="Filtrar" class="button large button-gray">
    <?php echo $this->Form->end(); ?>
</div>

<div id="mi-estado" class="right-private" >
<div id="seleccion-activa">
                    <h1 id="panel-activo">Selecciones en proceso</h1>
        <?php
                    foreach ($sel as $seleccion) {

                        if ($seleccion['Selecction']['status'] == 1) {
        ?>
                            <div style="margin: 5px 0px;  ><?php echo $this->Html->link($seleccion['Selecction']['name'], array('controller' => 'selecctions', 'action' => 'view', $seleccion['Selecction']['id']), array('style' => 'color: #A3A3A3;text-decoration: none; margin-bottom: 5px; display: block;float: left; width: 170px;')); ?>
                            <span class="pending-messages"> <a><?php 
                           $cont=0;
                             foreach ($seleccion['Applicant'] as $ap) {
                                if($ap['ready']=='0') $cont++; 
                                }  
                                echo  $cont;                
                            ?></a> Selecciones nuevas</span><span style="clear: both;"></span></div>
<?php  }
                    } 
                   ?>
                </div>
                </div>
</div>
<div class="clear_space_h"></div>

<pre> <?php //print_r($sel); ?> </pre>
<!--
<pre> <?php print_r($interviews); ?> </pre>
<hr />
<pre> <?php print_r($sel); ?> </pre>
<hr />
<pre> <?php //print_r($users); ?> </pre>
-->

