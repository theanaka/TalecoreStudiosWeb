<div class="gameEntry">
    <div class="text">
        <p class="header">
            <?php if($link):?>
            <a href="<?php echo $this->Html->ApplicationPath('/Game/Details/' . $element->NavigationTitle);?>">
                <?php echo $element->Title;?>
            </a>
            <?php else:?>
                <?php echo $element->Title;?>
            <?php endif;?>
        </p>
        <?php echo $element->Content;?>
    </div>
    <div class="imageAlbum">
        <?php foreach($element->GameYoutubeLinks as $youtubeLink):?>
            <div class="videoWrapper">
                <img src="<?php echo '/Image/Display/' . $youtubeLink->Image->Name;?>" data="<?php echo '//' . $youtubeLink->YoutubeLink;?>"/>
                <img src="<?php echo $this->Html->ImageFilePath('youtube_overlay.png');?>" class="overlay" data="<?php echo '//' . $youtubeLink->YoutubeLink;?>"/>
            </div>
        <?php endforeach;?>
        <?php foreach($element->GameImages as $image):?>
            <div class="imageWrapper">
                <img src="<?php echo '/Image/Display/' . $image->Image->Name;?>" data="<?php echo '/Image/Display/' . $image->Image->Name;?>"/>
            </div>
        <?php endforeach;?>
    </div>
</div>