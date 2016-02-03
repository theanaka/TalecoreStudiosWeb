<h1>Game Youtube Link - Create</h1>
<?php echo $this->Form->Start('GameYoutubeLink');?>
<div>
    <div class="label">Game</div>
    <?php echo $this->Form->Select('GameId', $Games, array('key' => 'Id', 'value' => 'Title'));?>
    <?php echo $this->Form->ValidationErrorFor('GameId');?>
</div>
<div>
    <div class="label">Link</div>
    <?php echo $this->Form->Input('YoutubeLink');?>
    <?php echo $this->Form->ValidationErrorFor('YoutubeLink');?>
</div>
<div>
    <div class="label">Thumbnail</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>
<div>
    <?php echo $this->Form->Submit('Create');?>
</div>
<?php echo $this->Form->End();?>
