<h1>News</h1>
<div id="contentNews">
    <?php foreach($NewsPosts as $newsPost):?>
        <?php $this->PartialView('NewsPost', array('element' => $newsPost, 'link' => true));?>
    <?php endforeach;?>
</div>
<div id="twitterWrapper">
    <?php echo $this->Models->StaticBlock->Where(array('Identifier' => 'twitter_widget'))->First()->Content;?>
</div>
<div class="clear"></div>