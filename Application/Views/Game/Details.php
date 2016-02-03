<h1><?php echo $Game->Title;?></h1>
<div id="content">
    <?php echo $this->PartialView('Game', array('element' => $Game, 'link' => false));?>
</div>
<div class="clear"/>