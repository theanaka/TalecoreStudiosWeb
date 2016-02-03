<h1>User Image - Create</h1>
<?php echo $this->Form->Start('UserImage');?>

<div>
    <div class="label">User</div>
    <?php echo $this->Form->Select('UserId', $Users, array('key' => 'Id', 'value' => 'Username'));?>
</div>
<div>
    <div class="label">Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Create');?>
</div>
<?php echo $this->Form->End();?>
