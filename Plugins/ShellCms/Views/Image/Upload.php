<h1>Image - Upload</h1>
<?php echo $this->Form->Start(
    'Image',
    array(
        'attributes' => array(
            'enctype' => 'multipart/form-data'
)));?>

<div>
    <div class="label">Name</div>
    <?php echo $this->Form->Input('Name');?>
</div>
<div>
    <div class="label">Alt</div>
    <?php echo $this->Form->Input('Alt');?>
</div>
<div>
    <div class="label">ImageFile</div>
    <?php echo $this->Form->File('ImageFile');?>
</div>
<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Upload');?>
</div>
<?php echo $this->Form->End();?>
