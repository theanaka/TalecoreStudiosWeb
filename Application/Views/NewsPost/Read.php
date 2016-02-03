<h1>News</h1>

<div id="contentNews">
    <?php $this->PartialView('NewsPost', array('element' => $NewsPost, 'link' => false));?>
</div>
<div id="twitterWrapper">
    <?php echo $this->Models->StaticBlock->Where(array('Identifier' => 'twitter_widget'))->First()->Content;?>
</div>
<div class="clear"></div>