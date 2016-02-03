<h1>Games</h1>
<div id="content">
    <?php foreach($Games as $game):?>
        <?php echo $this->PartialView('Game', array('element' => $game, 'link' => true));?>
    <?php endforeach;?>
</div>
<div class="clear"/>