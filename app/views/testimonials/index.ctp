<?php
$e = $this->requestAction("/languages/reader/etiqueta");
?>
<ul class="testimonios">
    <li class="title_preguntas">
        <h2><?php echo $e['testimonios'];?></h2>
    </li>
    <?php
        foreach ($testimonials as $testimonial) {
    ?>
    <li>
        <div class="avatar_testimonio">
            <?php echo $this->Html->image("applicants/".$testimonial['Testimonial']['photo'], array('class' => 'thumbail', 'alt' => $testimonial['Testimonial']['name'], 'width'=>58, 'height'=>57)); ?>        
        </div>
        <div class="text_testimonio">
            <span><?php echo $testimonial['Testimonial']['testimonial']; ?></span>
            <p><b><?php echo $testimonial['Testimonial']['name']; ?></b><?php if($testimonial['Testimonial']['address'] != null ){?>- <?php }echo $testimonial['Testimonial']['address']; ?></p>
        </div>
    </li>
    <?php } ?>
</ul>
