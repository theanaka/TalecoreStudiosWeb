<h1>Image - Edit</h1>
<a href="/Image/">Return</a>

<?php echo $this->Form->Start('Image');?>

<?php echo $this->Form->Hidden('Id');?>

<div>
    <div class="label">Name</div>
    <?php echo $this->Form->Input('Name');?>
</div>
<div>
    <div class="label">Alt</div>
    <?php echo $this->Form->Input('Alt');?>
</div>
<div>
    <div class="label">FileName</div>
    <?php echo $this->Form->Input('FileName');?>
</div>
<div>
    <div class="label">MimeType</div>
    <?php echo $this->Form->Input('MimeType', array('attributes' => array('disabled' => true)));?>
</div>
<div>
    <div class="label">Path</div>
    <?php echo $this->Form->Input('Path', array('attributes' => array('disabled' => true)));?>
</div>

<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Save');?>
</div>
<?php echo $this->Form->End();?>
