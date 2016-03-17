<h1>Cover Image - Edit</h1>
<?php echo $this->Form->Start('CoverImage');?>
<?php echo $this->Form->Hidden('Id');?>
<?php echo $this->Form->Hidden('Identifier');?>

<div>
    Identifier: <?php echo $CoverImage->Identifier;?>
</div>
<div>
    <div class="label">Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Save');?>
</div>
<?php echo $this->Form->End();?>
