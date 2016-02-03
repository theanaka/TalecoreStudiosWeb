<div id="imageViewWrapper">
    <?php if(isset($SlideShowImages)):?>
        <?php foreach($SlideShowImages as $image):?>
        <div class="imageWrapper hide">
            <img src="<?php echo '/Image/Display/' . $image->Image->Name;?>">
        </div>
        <?php endforeach;?>
    <?php endif;?>
    <div class="navigateLeft navigate">
        <?php echo $this->Html->Image('arrow_b_left.png');?>
    </div>
    <div class="navigateRight navigate">
        <?php echo $this->Html->Image('arrow_b_right.png');?>
    </div>
</div>
<div id="mastHeadAlt">
    <img src="<?php echo '/Image/Display/' . $MastheadImage;?>"/>
</div>