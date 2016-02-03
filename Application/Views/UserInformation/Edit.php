<h1>User Information - Edit</h1>
<?php echo $this->Form->Start('UserInformation');?>
<?php echo $this->Form->Hidden('Id');?>
<div>
    <div class="label">User</div>
    <?php echo $this->Form->Select('UserId', $Users, array('key' => 'Id', 'value' => 'Username'));?>
</div>
<div>
    <div class="label">Title</div>
    <?php echo $this->Form->Input('Title');?>
</div>
<div>
    <div class="label">Content</div>
    <?php echo $this->Form->Area('Content');?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>
<div>
    <div class="label">Sort order</div>
    <?php echo $this->Form->Input('SortOrder');?>
    <?php echo $this->Form->ValidationErrorFor('SortOrder');?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Save');?>
</div>
<?php echo $this->Form->End();?>
