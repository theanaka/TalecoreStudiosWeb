<h1>Users - Create</h1>
<?php echo $this->Form->Start('User');?>

<div>
    <div class="label">Username</div>
    <?php echo $this->Form->Input('Username');?>
    <?php echo $this->Form->ValidationErrorFor('Username');?>
</div>
<div>
    <div class="label">Dispay name</div>
    <?php echo $this->Form->Input('DisplayName');?>
    <?php echo $this->Form->ValidationErrorFor('Username');?>
</div>
<div>
    <div class="label">Email</div>
    <?php echo $this->Form->Input('Email');?>
</div>
<div>

    <div class="label">Password</div>
    <?php echo $this->Form->Password('Password');?>
    <?php echo $this->Form->ValidationErrorFor('Password');?>
</div>
<div>

    <div class="label">Repeat password</div>
    <?php echo $this->Form->Password('RepeatPassword');?>
</div>
<?php echo $this->Form->Submit('Create');?>
<?php echo $this->Form->End();?>
