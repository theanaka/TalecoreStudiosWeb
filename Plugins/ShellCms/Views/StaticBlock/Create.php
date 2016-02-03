<h1>Static Block - Create</h1>
<?php echo $this->Form->Start('StaticBlock');?>

<div>
    <div class="label">Identifier</div>
    <?php echo $this->Form->Input('Identifier');?>
    <?php echo $this->Form->ValidationErrorFor('Identifier');?>
</div>

<div>
    <div class="label">Content</div>
    <?php echo $this->Form->Area('Content');?>
    <?php echo $this->Form->ValidationErrorFor('Content');?>
</div>

<div>
    <div class="label">&nbsp;</div>
    <?php echo $this->Form->Submit('Create');?>
</div>

<?php echo $this->Form->End();?>

