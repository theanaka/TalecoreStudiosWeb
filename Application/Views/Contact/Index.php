<h1>Contact</h1>
<div id="contact">
    <span>
        <?php echo $this->Models->StaticBlock->Where(array('Identifier' => 'contact_copy'))->First()->Content;?>
    </span>
    <?php echo $this->Form->Start('Contact');?>
        <div class="inputfield">
            <label for="Name">Your name (required)</label>
            <?php echo $this->Form->Input('Name', array('attributes' => array('class' => 'text', 'placeholder' => 'John Doe')));?>
        </div>
        <div class="inputfield">
            <label for="Email">Your email address (required)</label>
            <?php echo $this->Form->Input('Email', array('attributes' => array('class' => 'text', 'placeholder' => 'john@doe.com')));?>
        </div>
        <div class="inputfield">
            <label for="Subject">Subject</label>
            <?php echo $this->Form->Input('Subject', array('attributes' => array('class' => 'text', 'placeholder' => 'Placeholder')));?>
        </div>
        <div class="inputfield">
            <label for="Content">Your message</label>
            <?php echo $this->Form->Area('Content', array('attributes' => array('class' => 'text')));?>
        </div>
        <div class="inputfield">
            <input type="submit" value="Send" class="submit"/>
        </div>
    <?php echo $this->Form->End();?>
</div>