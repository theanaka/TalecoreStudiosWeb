<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <title><?php echo $title;?></title>
        <?php echo $this->Html->Css('talecore-studios-cms.css');?>
        <?php echo $this->Html->Favicon("Favicon.png");?>
    </head>
    <body>
        <div id="page">
            <div id="header">
                <div class="entry">
                    <?php echo $this->Html->Link('/NewsPost/', 'News Posts');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/StaticBlock/', 'Static Blocks');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/Image/', 'Image');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/User/', 'Users');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/SlideshowImage/', 'Slideshow Images');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/UserImage/', 'User Images');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/UserInformation/', 'User Information');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/Game/', 'Games');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/GameContent/', 'Game Content');?>
                </div>
                <div class="entry">
                    <?php echo $this->Html->Link('/User/Logout/', 'Logout');?>
                </div>
                <div class="clear"/>
            </div>
            <div id="content">
                <?php echo $view;?>
            </div>
        </div>
    </body>
</html>
