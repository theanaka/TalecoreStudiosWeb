<h1>Cover Image - Create</h1>
<?php echo $this->Form->Start('CoverImage');?>

<div>
    <div class="label">Identifier</div>
    <?php echo $this->Form->Input('Identifier');?>
    <?php echo $this->Form->ValidationErrorFor('Identifier');?>
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

