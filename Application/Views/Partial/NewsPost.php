<div class="entry">
    <div class="profile">
        <img src="<?php echo '/Image/Display/' . $element->Author->UserImages->First()->Image->Name;?>"/>
    </div>
    <div class="text">
        <?php if($link):?>
            <a href="<?php echo $this->Html->ApplicationPath('NewsPost/Read/' . $element->Id);?>">
                <p class="header"><?php echo $element->Title;?></p>
            </a>
        <?php else:?>
            <p class="header"><?php echo $element->Title;?></p>
        <?php endif;?>
        <p class="meta">Posted by <?php echo $element->Author->DisplayName;?> <?php echo date('Y-m-d', strtotime($element->PostTimeStamp));?> </p>
        <?php echo $element->Content;?>
    </div>
</div>