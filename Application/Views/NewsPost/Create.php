<h1>Newspost - Create</h1>
<?php echo $this->Form->Start('NewsPost');?>
<div>
    <div class="label">Title</div>
    <?php echo $this->Form->Input('Title');?>
    <?php echo $this->Form->ValidationErrorFor('Title');?>
</div>
<div>
    <div class="label">Content</div>
    <?php echo $this->Form->Area('Content');?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>
<div>
    <div class="label">Header Image</div>
    <?php echo $this->Form->Select('ImageId', $Images, array('key' => 'Id', 'value' => 'Name'));?>
    <?php echo $this->Form->ValidationErrorFor('ImageId');?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Create');?>
</div>
<?php echo $this->Form->End();?>
