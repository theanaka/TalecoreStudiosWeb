<h1>Games - Create</h1>
<?php echo $this->Form->Start('Game');?>
<?php echo $this->Form->Hidden('IsDeleted');?>
<div>
    <div class="label">Title</div>
    <?php echo $this->Form->Input('Title');?>
    <?php echo $this->Form->ValidationErrorFor('Title');?>
</div>
<div>
    <div class="label">NavigationTitle</div>
    <?php echo $this->Form->Input('NavigationTitle');?>
    <?php echo $this->Form->ValidationErrorFor('NavigationTitle');?>
</div>
<div>
    <div class="label">Content</div>
    <?php echo $this->Form->Area('Content');?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>
<div>
    <div class="label">Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
    <?php echo $this->Form->ValidationErrorFor('ImageId');?>
</div>
<div>
    <div class="label">IsActive</div>
    <?php echo $this->Form->Bool('IsActive');?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Create');?>
</div>
<?php echo $this->Form->End();?>
