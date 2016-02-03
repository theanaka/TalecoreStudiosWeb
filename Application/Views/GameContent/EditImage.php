<h1>Game Image - Edit</h1>
<?php echo $this->Form->Start('GameImage');?>
<?php echo $this->Form->Hidden('Id');?>
<div>
    <div class="label">Game</div>
    <?php echo $this->Form->Select('GameId', $Games, array('key' => 'Id', 'value' => 'Title'));?>
    <?php echo $this->Form->ValidationErrorFor('GameId');?>
</div>
<div>
    <div class="label">Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>
<div>
    <?php echo $this->Form->Submit('Save');?>
</div>
<?php echo $this->Form->End();?>
