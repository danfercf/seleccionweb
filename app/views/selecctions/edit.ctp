<?php
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->css('forms.css');
echo $this->Html->script('initialize-forms.js');
echo $this->Html->script('qtip/jquery.qtip-1.0.0-rc3.min.js');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'seleccion');
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<?php
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->css('forms.css');
echo $this->Html->script('initialize-forms.js');
echo $this->Html->script('qtip/jquery.qtip-1.0.0-rc3.min.js');
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

    #form-nueva-seleccion{
        width: 280px;
        margin-right: 10px;
    }
    #form-nueva-seleccion fieldset p input,#form-nueva-seleccion fieldset p label{
        width: 95%;
    }


</style>
<script type="text/javascript">
    function del(id){
        $('#lista-preguntas-'+id).remove();
    }
    $(document).ready(function(){
        $(function() {
            $('select').msDropDown().data("dd");
            $('#add-question').click(function(){
                if($('#question').val()!=''){
                    $.post("<?php echo $this->Html->url('/') ?>questions/add", {question: $('#question').val()}, function(response){
                        if(response != 'error'){
                            $('#lista-preguntas tbody').append(response);
                            $('#question').val('');
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

            $( "#lista-preguntas-favoritas div" ).draggable({
                opacity: 0.6,
                //connectToSortable: '#lista-preguntas tbody',
                //revert: true,
                scope:'#lista-preguntas tbody',
                containment: '#lista-preguntas tbody',
                stop: function( event, ui){
                    var t =$(ui.helper[0].innerHTML);
                    var r = '<tr style="width: 425px;" class="row-b" id="lista-preguntas-3"><input type="hidden" value="'+t.attr('id')+'" name="data[Question][Question][]"><td>'+t.text()+'</td><td>30 seg.</td><td><a href="<?php echo $this->Html->url('/') ?>questions/favorite/3"><img alt="Favorito" src="<?php echo $this->Html->url('/') ?>img/private/favorito.png"></a></td><td><a href="javascript:del(3)"><img alt="Favorito" src="<?php echo $this->Html->url('/') ?>img/private/eliminar.png"></a></td></tr>'
                    //*var r ='<tr><input id="'+10+'"><td>'+t.text()+'</td><td>30 seg.</td><td><a href="/selweb/questions/favorite/3"><img alt="Favorito" src="/selweb/img/private/favorito.png"></a></td></tr>';
                    $("#lista-preguntas tbody").append(r);
                    ui.helper.fadeOut();

                }
            });
            $('#enviar').click(function() {
            $('#nueva-seleccion').append('<input type="hidden" value="true" name="enviar">');
                $('#nueva-seleccion').submit();
            });
            $(".favorito").qtip({
                content: 'Favorito',
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
                    }
                }

            });
            $(".eliminar").qtip({
                content: 'Eliminar',
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
                    }
                }

            });
        });

    });
</script>
<div class="left-private">

    <?php
    echo $this->Form->create('Selecction', array('action' => 'edit', 'id'=>'nueva-seleccion'));
    echo $this->Form->input('id');
    echo $this->Form->input('user_id', array('type'=>'hidden'));
    echo $this->Form->input('status', array('type'=>'hidden'));
    echo $this->Form->input('start', array('type'=>'hidden'));
    echo $this->Form->input('end', array('type'=>'hidden'));
    echo $this->Form->input('sent', array('type'=>'hidden'));
    echo $this->Form->input('answered', array('type'=>'hidden'));
    ?>
    <div>
        <h1 class="private-title"> <span id="panel-paso1">Crear nueva  Seleccion</span> </h1>
        <div class="clear_space_h"></div>
        <p class="left" id="label-nueva-seleccion">
            Asigne un nombre a la seleccion que se creara. Indique una referencia
            que le indique de que se trata y por ultimo asigne a la persona indicada para que realice la seleccion a los postulantes
        </p>
        <div class="right" id="form-nueva-seleccion">
            <fieldset>
                <p>
                    <?php echo $this->Form->input('name', array('label' => 'Nombre seleccion', 'div' => false, 'id' => 'name-selection')) ?>
                </p>
                <p>
                    <?php echo $this->Form->input('reference', array('label' => 'Referencia', 'div' => false, 'id' => 'name-selection')) ?>
                </p>
            </fieldset>
        </div>
        <div class="clear_space_h"></div>
    </div>
    <div class="preguntas">
        <h1 class="private-title">
            <span id="panel-paso2">Crear Preguntas</span>
        </h1>
        <p>
            El orden de las preguntas aparecera tal como se muestra en este listado.
            si desea cambiar el orden solo tiene que arrastar las pregunas y ordenarlas como quierea que aparezcan.
        </p>
        <table id="lista-preguntas" class="listado_sortable">
            <input type="hidden" id="QuestionQuestion" value="" name="data[Question][Question]">
            <thead>
                <tr>
                    <th style="width: 425px;"> Pregunta</th>
                    <th>Tiempo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($this->data['Question'])) {
                    $i = 0;
                    foreach ($this->data['Question'] as $pregunta) {
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="row-b"';
                        }
                ?>
                        <tr id="lista-preguntas-<?php echo $pregunta['id']; ?>" <?php echo $class; ?> style="width: 425px !important;">
                            <?php echo $this->Form->input('Question.id', array('value'=>$pregunta['id'], 'name'=>'data[Question][Question][]'))?>
                    
                        <td><?php echo $pregunta['question']; ?></td>
                        <td><?php echo $pregunta['duration']; ?> seg.</td>
                        <td >
                        <?php
                        echo $this->Html->link(
                                $this->Html->image(
                                        "private/favorito.png",
                                        array("alt" => "Favorito")
                                ),
                                "/questions/favorite/" . $pregunta['id'],
                                array('escape' => false, 'class'=>'favorito')
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link(
                                $this->Html->image(
                                        "private/eliminar.png",
                                        array("alt" => "Favorito")
                                ),
                                'javascript:del(' . $pregunta['id'] . ');',
                                array('escape' => false, 'class'=>'eliminar')
                        );
                        ?>
                    </td>
                </tr>
                <?php
                    }
                } else {
                ?>
                    <tr class="row-b">
                        <td colspan='99' >No hay preguntas para esta seleccion</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div id="nueva-pregunta">
            Crear nueva Pregunta
            <textarea cols="100" rows="2"  id="question"></textarea>
            <div class="clear_space_h"></div>
            <a href="javascript:void();" id="add-question">Agregar</a>
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
        <h1 id="panel-favoritos">Preguntas Favoritas</h1>
        <p style="text-align: justify;">
            Elija una de la preguntas del listado de abajo y arrastrela hasta
            la lista de preguntas de su seleccion.
        </p>
        <?php
            $favoritos = $this->requestAction('/questions/favorites');
            if (!empty($favoritos)) {
                foreach ($favoritos as $pregunta) {
        ?>
            <div><p id="<?php echo $pregunta['Question']['id'] ?>"><?php echo $pregunta['Question']['question'] ?></p></div>
        <?php
            }
        }
        ?>
        <div id="nueva-pregunta-favorita">
            <?php echo $this->Form->create('Question', array('action' => 'add')) ?>
            <h3>Agregar preguntas a favoritos</h3>
            <textarea cols="" rows=""  name="data[Question][question]" ></textarea>
            <a href="javascript:void();" id="add-question-favorite">Agregar</a>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
<div class="clear_space_h"></div>
        
            