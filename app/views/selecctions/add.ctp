<?php
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->css('forms.css');
echo $this->Html->script('initialize-forms.js');
echo $this->Html->script('qtip/jquery.qtip-1.0.0-rc3.min.js');
echo $this->Html->script('validate/jquery.validate.js');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'seleccion');
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<style type="text/css" >

    .right form fieldset p label, .right form fieldset p, .right form fieldset p input {
        width: 250px;
    }

    #containerasignar{
        margin-left: 15px; height: 24px; width: 190px;
    }
    #nueva-pregunta{
        width: 600px;
    }
    #nueva-pregunta, #nueva-pregunta-favorita{
        background: #E1E1E1 url(../img/private/bg-text.png) scroll repeat-x !important;
        height: 80px;
        padding: 5px;
        color: #717171;
        border: 1px #C0C0C0 solid;
    }

    #nueva-pregunta-favorita{
        height: 100px;
    }
    #nueva-pregunta-favorita h3{
        margin: 0px;
        padding: 5px 0px 0px 20px;
        background: transparent url(../img/private/favorito.png) left 7px no-repeat;
        font-size: 12px;
    }
    #nueva-pregunta-favorita{
        padding: 0px 5px !important;
    }
    #nueva-pregunta-favorita textarea{
        width: 285px;

    }
    #nueva-pregunta textarea{
        float: right;
        width: 440px;
        color: #717171;
    }
    #nueva-pregunta-favorita a{
        margin: 0px !important;
    }
    #nueva-pregunta a, #nueva-pregunta-favorita a{
        display: inline-block;
        float: right;
        margin-top: -5px;
        color: #717171;
        font-size: 14px;
    }
    td{
        border: none;
        border-right: 2px #FFFFFF solid;
    }

    th{
        background: none;
        text-align: center;
        color: #717171;
        font-weight: bold;
    }
    tr.row-a a{
        color: #FFFFFF;
    }
    tr.row-b a{
        color: #efefef;
    }
    #lista-preguntas-favoritas div{
        background: #DAE9F6 url(../img/private/hand.png) 15px center no-repeat;
        margin: 10px 0;
        padding: 5px 5px 5px 40px;
    }
    #lista-preguntas-favoritas div p{
        border-left: 1px #83a4c1 solid;
        padding: 5px;
    }
    
    #lista-preguntas-favoritas div span{
    background: url("../img/private/eliminar.png") no-repeat scroll 3px center #DAE9F6;
    display: block;
    height: 16px;
    padding: 5px;
    position: absolute;
    right: 0;
    top: 0;
    width: 16px;
    }
    
    #lista-preguntas li{
        list-style: none outside none;
        margin: 0 0 4px;
        padding: 0px;
    }
    #lista-preguntas ul{
        margin: 0px;
        padding: 0px;
    }
    #lista-preguntas ul li{
        margin-right: 20px;
    }
    #lista-preguntas ul li div{
        display: inline-table;
    }

    #lista-preguntas ul li div{
        display: inline-table;
    }
    #header-lista-preguntas div{
        display: inline-table;
        text-align: center;
        color: #747474;
        font-weight: bold;
        text-transform: uppercase;
    }
    img{
        border: none;
    }
    #lista-preguntas li.row-b {
        background: #EFEFEF;
    }

    #label-nueva-seleccion{
        text-align: justify;
        width: 300px;
        font-size: 12px;

    }
    .preguntas{
        font-size: 12px;
    }
    #form-nueva-seleccion{
        width: 280px;
        margin-right: 10px;
    }
    #form-nueva-seleccion fieldset p input,#form-nueva-seleccion fieldset p label{
        width: 95%;
    }
    .panel-favoritos{
        margin-top: 0px;
        background: transparent url(../img/private/favorito.png) left 7px no-repeat;
    }
    .error-message {
        margin-left: 10px;
        width: 225px;
    }
    h2.panel-title{
    background: none repeat scroll 0 0 #3B709D;
    border-top: 2px solid #ffffff;
    color: #FFFFFF;
    font-size: 13px;
    font-weight: normal;
    margin: 0;
    cursor: pointer;
    padding: 2px 4px;
    }
    span.panel_t {
        display: none;
    }

</style>
<script type="text/javascript">
    function del(id){
        $('#lista-preguntas-'+id).remove();
        //$.post("<?php echo $this->Html->url('/') ?>questions/delete/"+id, function(response){
            
        //    })
       // alert($(this).parent().html());
    }
    function favorito(id){
 
        $.post("<?php echo $this->Html->url('/') ?>questions/favorite/"+id, function(response){

            $('#lista-preguntas-favoritas').append('<div><p id="'+id+'" >'+$('#question-text-'+id).text()+'</p><span class="del_fav" id_fav="'+id+'"></span></div>');
          $('#favorito-'+id).remove(); 
          
           
           $( "#lista-preguntas-favoritas div" ).draggable({
            opacity: 0.6,
            //connectToSortable: '#lista-preguntas tbody',
            //revert: true,
            scope:'#lista-preguntas tbody',
            containment: '#lista-preguntas tbody',
            stop: function(event, ui){
                 var t =$(ui.helper[0].innerHTML);
                         var tt='<select class="sele" id="tiempo-pregunta-'+t.attr('id')+'" title="'+t.attr('id')+'"> <option value="30">30 seg</option><option value="45">45 seg</option><option value="60">60 seg</option></select>';
                         var r = '<tr style="width: 425px;" class="row-b" id="lista-preguntas-'+t.attr('id')+'"><input type="hidden" value="'+t.attr('id')+'" name="data[Question][Question][]"><td>'+t.text()+'</td><td></td><td>'+tt+'</td><td></td><td><a class="eliminar" href="javascript:del('+t.attr('id')+')"><img alt="Eliminar" src="<?php echo $this->Html->url('/') ?>img/private/eliminar.png"></a></td></tr>'
                         //*var r ='<tr><input id="'+10+'"><td>'+t.text()+'</td><td>30 seg.</td><td><a href="/selweb/questions/favorite/3"><img alt="Favorito" src="/selweb/img/private/favorito.png"></a></td></tr>';
                         $("#lista-preguntas tbody").append(r);
                        ui.helper.fadeOut();
                        $('select').msDropDown().data("dd");
                         $('.sele').change(function(){
                                    $.post("<?php echo $this->Html->url('/') ?>questions/duration/"+ $(this).attr('title')+ "/"+$(this).val(), function(response){
                                        if(response=='ok'){       
                                        }else{
                                            alert('Huvo un error al cambier la duracion intentelo de nuevo porfavor');
                                        }
                                    });
                                });        
            }
        });
           
           
        });
        
        
    }
 

    $(function() {
        $('select').msDropDown().data("dd");
        
        $('#add-question').click(function(){
          
            if($('#question').val()!=''){
                $('#loading').toggle();
                $.post("<?php echo $this->Html->url('/') ?>questions/add", {question: $('#question').val()}, function(response){
                    if(response != 'error'){
                        $('#lista-preguntas tbody').append(response);
                        $('#question').val('');
                        $('.ddChild').css('display','none');    
                    }else{
                        alert('Huvo un error al guardar, consulte con su adminsitrador');
                    }
                    $('#loading').toggle();
                    
                });
                    
                    
            }else{
                alert('Escriba la pregunta por favor.')
            }
        });
        
        
        $('#add-question-favorite').click(function(){
                if($('#question-favorite').val()!=''){
                    $.post("<?php echo $this->Html->url('/') ?>questions/add", {question: $('#question-favorite').val(), favorite:true}, function(response){
                        if(response != 'error'){
                            $('#lista-preguntas-favoritas').append(response);
                           // alert(response);
                            
                            $('select').msDropDown().data("dd");
                            $('#question-favorite').val('');
                            
                             $( "#lista-preguntas-favoritas div" ).draggable({
                                opacity: 0.6,
                                //connectToSortable: '#lista-preguntas tbody',
                                //revert: true,
                                scope:'#lista-preguntas tbody',
                                containment: '#lista-preguntas tbody',
                                stop: function(event, ui){
                                     var t =$(ui.helper[0].innerHTML);
                         var tt='<select class="sele" id="tiempo-pregunta-'+t.attr('id')+'" title="'+t.attr('id')+'"> <option value="30">30 seg</option><option value="45">45 seg</option><option value="60">60 seg</option></select>';
                         var r = '<tr style="width: 425px;" class="row-b" id="lista-preguntas-'+t.attr('id')+'"><input type="hidden" value="'+t.attr('id')+'" name="data[Question][Question][]"><td>'+t.text()+'</td><td></td><td>'+tt+'</td><td></td><td><a class="eliminar" href="javascript:del('+t.attr('id')+')"><img alt="Eliminar" src="<?php echo $this->Html->url('/') ?>img/private/eliminar.png"></a></td></tr>'
                         //*var r ='<tr><input id="'+10+'"><td>'+t.text()+'</td><td>30 seg.</td><td><a href="/selweb/questions/favorite/3"><img alt="Favorito" src="/selweb/img/private/favorito.png"></a></td></tr>';
                         $("#lista-preguntas tbody").append(r);
                        ui.helper.fadeOut();
                        $('select').msDropDown().data("dd");
                         $('.sele').change(function(){
                                    $.post("<?php echo $this->Html->url('/') ?>questions/duration/"+ $(this).attr('title')+ "/"+$(this).val(), function(response){
                                        if(response=='ok'){       
                                        }else{
                                            alert('Huvo un error al cambier la duracion intentelo de nuevo porfavor');
                                        }
                                    });
                                });    
                                }
                            });
                            
                            
                            
                        }else{
                            alert('Huvo un error al guardar, consulte con su adminsitrador');
                        }
                    });


                }else{
                    alert('Escriba la pregunta por favor.')
                }
            });
            
            
            
            
            
        $("#lista-preguntas tbody").sortable({ opacity: 0.6, cursor: 'move', update: function() {
                var order = $(this).sortable("serialize");
                $.post("<?php echo $this->Html->url('/') ?>questions/order", order);
            }
        });
        //$("").droppable();
        
        function draw(){
            
        $( "#lista-preguntas-favoritas div" ).draggable({
            opacity: 0.6,
            //connectToSortable: '#lista-preguntas tbody',
            //revert: true,
            scope:'#lista-preguntas tbody',
            containment: '#lista-preguntas tbody',
            stop: function(event, ui){
                 var t =$(ui.helper[0].innerHTML);
                         var tt='<select class="sele" id="tiempo-pregunta-'+t.attr('id')+'" title="'+t.attr('id')+'"> <option value="30">30 seg</option><option value="45">45 seg</option><option value="60">60 seg</option></select>';
                         var r = '<tr style="width: 425px;" class="row-b" id="lista-preguntas-'+t.attr('id')+'"><input type="hidden" value="'+t.attr('id')+'" name="data[Question][Question][]"><td>'+t.text()+'</td><td></td><td>'+tt+'</td><td></td><td><a class="eliminar" href="javascript:del('+t.attr('id')+')"><img alt="Eliminar" src="<?php echo $this->Html->url('/') ?>img/private/eliminar.png"></a></td></tr>'
                         //*var r ='<tr><input id="'+10+'"><td>'+t.text()+'</td><td>30 seg.</td><td><a href="/selweb/questions/favorite/3"><img alt="Favorito" src="/selweb/img/private/favorito.png"></a></td></tr>';
                         $("#lista-preguntas tbody").append(r);
                        ui.helper.fadeOut();
                        $('select').msDropDown().data("dd");
                         $('.sele').change(function(){
                                    $.post("<?php echo $this->Html->url('/') ?>questions/duration/"+ $(this).attr('title')+ "/"+$(this).val(), function(response){
                                        if(response=='ok'){       
                                        }else{
                                            alert('Huvo un error al cambier la duracion intentelo de nuevo porfavor');
                                        }
                                    });
                                });         
            }
        });
        
        }
        draw();
        
        $('#enviar').click(function() {
            $('#nueva-seleccion').append('<input type="hidden" value="true" name="enviar">');
            $('#nueva-seleccion').submit();
            
        });
        
        $('.del_fav').click(function() {
         
         var id=$(this).attr('id_fav');
         $.post("<?php echo $this->Html->url('/') ?>questions/delete/"+id, function(response){
            
            })
         $(this).parent().remove();
        });
         $('.panel-title').click(function() {
            $(this).next('span').toggle("slow");
            })
        
        
        
            $(".panel-favoritos-user").qtip({
            content: 'Preguntas Favoritas</br>creadas por el cliente',
            corner: {
                target: 'leftTop',
                tooltip: 'bottomLeft'
            },
            style: {
                width: 140,
                height: 40,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 3,
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
        
        //$('#form-nueva-seleccion').validate();
    });

</script>
<div class="left-private">
    <?php echo $this->Form->create('Selecction', array('action' => 'add', 'id' => 'nueva-seleccion')) ?>
    <div>
        <h1 class="private-title"> <span id="panel-paso1">Crear nueva  Seleccion</span> </h1>
        <div class="clear_space_h"></div>
        <p class="left" id="label-nueva-seleccion">
            Asigna un nombre a la Selecci&oacute;n que se creara. Indica una referencia para un mejor ordenamiento y por ultimo si lo deseas, asigne a la persona indicada para que realice la Selecci&oacute;n a los postulantes.
        </p>
        <div class="right" id="form-nueva-seleccion">
            <fieldset>
                <p>
                    <?php echo $this->Form->input('name', array('label' => 'Nombre seleccion', 'div' => false, 'id' => 'name-selection')) ?>
                </p>
                <p>
                    <?php echo $this->Form->input('reference', array('label' => 'Referencia', 'div' => false, 'id' => 'reference-selection')) ?>
                </p>
                <p>
                    <?php echo $this->Form->input('user_id', array('label' => false, 'default' => 0, 'div' => false, 'id' => 'user-selection', 'style' => 'width:260px;')) ?>
                </p>
            </fieldset>
        </div>
        <div class="clear_space_h" style="height: 30px;"></div>
    </div>
    <div class="preguntas">
        <h1 class="private-title">
            <span id="panel-paso2">Crear Lista de Preguntas para Selecci&oacute;n</span>
        </h1>
        <p>Crea la lista de preguntas para la selecci&oacute;n, el orden de las preguntas apareceran tal como se muestra en este listado. Si deseas cambiar el orden solo tienes que arrastrar las preguntas y ordenarlas como quieras que se muestren.
        </p>
        <?php
                    if (isset($error_preguntas)) {
        ?>
                        <div class="error">
            <?php echo $error_preguntas; ?>
                    </div>
        <?php } ?>
                    <table id="lista-preguntas" class="listado_sortable">
                        <input type="hidden" id="QuestionQuestion" value="" name="data[Question][Question]">
                        <thead>
                            <tr>
                                <th style="width: 425px;"> Pregunta</th>
                                <td></td>
                                <th>Tiempo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div id="loading">Guardando su pregunta</div>
                    <div id="nueva-pregunta">
                        Crear nueva Pregunta
                        <textarea cols="100" rows="2"  id="question"></textarea>
                        <div class="clear_space_h"></div>
                        <a href="javascript: void(0)" id="add-question">Agregar</a>
                    </div>
                </div>
                <div class="clear_space_h"></div>
                <div style="width: 600px;">
                    <input id="save-selection" type="submit"  value ="Guardar Seleccion" class="button submit"/>

                    <input id="enviar" type="button"  value ="Enviar ahora" class="button submit"/>
                </div>
            </div>
<?php echo $this->Form->end(); ?>
                    <div id="favoritos" class="right-private">
                        <div id="lista-preguntas-favoritas">
                        <h1 class="panel-favoritos" style="margin-top: 0;">Preguntas Predeterminadas</h1>
                            
                        <h2 class="panel-title" >Personales</h2> 
                        <span class="panel_t"> 
                        <?php
                $favoritos = $this->requestAction('/questions/predetermin/-1');
                if (!empty($favoritos)) {
                    foreach ($favoritos as $pregunta) {
                ?>
                <div style=" width: 254px;"><p id="<?php echo $pregunta['Question']['id'] ?>"><?php echo $pregunta['Question']['question'] ?></p></div>
                <?php  } } ?>
                </span>  
                        <h2 class="panel-title">Educaci&oacute;n</h2>   
                         <span class="panel_t"> 
                                <?php
                $favoritos = $this->requestAction('/questions/predetermin/-2');
                if (!empty($favoritos)) {
                            foreach ($favoritos as $pregunta) {
                        ?>
                        <div style=" width: 254px;"><p id="<?php echo $pregunta['Question']['id'] ?>"><?php echo $pregunta['Question']['question'] ?></p></div>
                        <?php  } } ?>
                        </span> 
                        <h2 class="panel-title">Experiencia</h2>   
                         <span class="panel_t"> 
                        <?php
                $favoritos = $this->requestAction('/questions/predetermin/-3');
                if (!empty($favoritos)) {
                    foreach ($favoritos as $pregunta) {
                ?>
                <div style=" width: 254px;"><p id="<?php echo $pregunta['Question']['id'] ?>"><?php echo $pregunta['Question']['question'] ?></p></div>
                <?php  } } ?>
                            </span> 
                            <h1 class="panel-favoritos panel-favoritos-user">Preguntas Favoritas</h1>
                            <p style="text-align: justify;">
                                Elije una de la preguntas del listado de abajo y arrastrala hasta la lista de preguntas de su selecci&oacute;n.
                            </p>
        <?php
                    $favoritos = $this->requestAction('/questions/favorites');
                    if (!empty($favoritos)) {
                        foreach ($favoritos as $pregunta) {
        ?>
                            <div style=" width: 254px;"><p id="<?php echo $pregunta['Question']['id'] ?>"><?php echo $pregunta['Question']['question'] ?></p><span class="del_fav"  id_fav="<?php echo $pregunta['Question']['id'] ?>"></span></div>
        <?php  } }  ?>



    </div>
    
    
    <div id="nueva-pregunta-favorita">

        <h3>Agregar preguntas a favoritos</h3>
        <textarea cols="" rows=""  name="data[Question][question]" id="question-favorite"></textarea>
        <a href="javascript:void(0)" id="add-question-favorite">Agregar</a>

    </div>
</div>
<div class="clear_space_h"></div>