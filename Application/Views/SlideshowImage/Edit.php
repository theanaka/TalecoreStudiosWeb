<h1>Slideshow Image - Edit</h1>
<?php echo $this->Form->Start('SlideshowImage');?>
<?php echo $this->Form->Hidden('Id');?>

<div>
    <div class="label">Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
</div>
<div>
    <div class="label">Sort Order</div>
    <?php echo $this->Form->Input('SortOrder');?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Save');?>
</div>
<?php echo $this->Form->End();?>
