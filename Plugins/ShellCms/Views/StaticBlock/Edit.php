<h1>Static Block - Edit</h1>
<?php echo $this->Form->Start('StaticBlock');?>
<?php echo $this->Form->Hidden('Id');?>
<?php echo $this->Form->Hidden('Identifier');?>

<div>
    Identifier: <?php echo $StaticBlock->Identifier;?>
</div>
<div>
    <div class="label">Content</div>
    <?php echo $this->Form->Area('Content');?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Save');?>
</div>
<?php echo $this->Form->End();?>
