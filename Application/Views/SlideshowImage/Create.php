<h1>Slideshow Image - Create</h1>
<?php echo $this->Form->Start('SlideshowImage');?>

<div>
    <div class="label">Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
</div>
<div>
    <div class="label"> Sort Order</div>
    <?php echo $this->Form->Input('SortOrder');?>
</div>
<div>
    <?php echo $this->Form->Submit('Create');?>
</div>
<?php echo $this->Form->End();?>
