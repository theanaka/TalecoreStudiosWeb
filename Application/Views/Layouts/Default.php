<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <title><?php echo $title;?></title>
        <?php echo $this->Html->Css('seriously-interactive-main.css');?>
        <?php echo $this->Html->Favicon("Favicon.png");?>
    </head>
    <body>
        <div id="page">
            <div id="pageWrapper">
                <div id="headerWrapper">
                    <div class="logoWrapper">
                        <a href="<?php echo $this->Html->ApplicationPath('/');?>">
                            <img src="<?php echo $this->Html->ImageFilePath("ts-logo.png");?>" alt="" class="logo"/>
                        </a>
                    </div>
                    <div class="headerSpace">&nbsp</div>
                    <nav class="menu">
                        <ul>
                            <li class="entry">
                                <a href="<?php echo $this->Html->ApplicationPath('/');?>">
                                    <span>News</span>
                                </a>
                            </li>
                            <li class="entry">
                                <a href="<?php echo $this->Html->ApplicationPath('/About');?>">
                                    <span>About</span>
                                </a>
                            </li>
                            <li class="entry">
                                <a href="<?php echo $this->Html->ApplicationPath('/Games');?>">
                                    <span>Games</span>
                                </a>
                            </li>
                            <li class="entry">
                                <a href="<?php echo $this->Html->ApplicationPath('/Contact');?>">
                                    <span>Contact</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div id="mastheadWrapper">
                    <div class="container">
                        <?php if(isset($UseImageSlider) && $UseImageSlider):?>
                            <?php $this->PartialView('ImageSlider', $this->ViewData);?>
                        <?php else:?>
                            <?php $this->PartialView('Masthead', $this->ViewData);?>
                        <?php endif;?>
                    </div>
                </div>
                <div id="mainWrapper">
                    <?php echo $view;?>
                </div>
            </div>
            <div id="footerWrapper">
                <div class="links">
                    <?php
                    $facebookLink = $this->Models->StaticBlock->Where(array('Identifier' => 'link_facebook'))->First()->Content;
                    $twitterLink = $this->Models->StaticBlock->Where(array('Identifier' => 'link_twitter'))->First()->Content;
                    $youtubeLink = $this->Models->StaticBlock->Where(array('Identifier' => 'link_youtube'))->First()->Content;
                    $twitchLink = $this->Models->StaticBlock->Where(array('Identifier' => 'link_twitch'))->First()->Content;
                    ?>
                    <a class="socialLink" href="<?php echo $facebookLink;?>" target="_blank">
                        <?php echo $this->Html->Image('icon_fb.png');?>
                    </a>
                    <a class="socialLink" href="<?php echo $twitterLink;?>" target="_blank">
                        <?php echo $this->Html->Image('icon_twitter.png');?>
                    </a>
                    <a class="socialLink" href="<?php echo $youtubeLink;?>" target="_blank">
                        <?php echo $this->Html->Image('icon_yt.png');?>
                    </a>
                    <a class="socialLink" href="<?php echo $twitchLink;?>" target="_blank">
                        <?php echo $this->Html->Image('icon_twitch.png');?>
                    </a>
                </div>
                <div class="info">
                    <div class="copyright">
                        <?php echo $this->Models->StaticBlock->Where(array('Identifier' => 'footer_copyright_notice'))->First()->Content;?>
                    </div>
                    <div class="disclaimer">
                        <?php echo $this->Models->StaticBlock->Where(array('Identifier' => 'footer_copyright_text'))->First()->Content;?>
                    </div>
                </div>
            </div>
            <div id="overlay" class="hidden"></div>
            <div id="globalImageViewer" class="hidden">
                <div class="outerWrapper">
                    <div class="innerWrapper">
                        <div class="imageWrapper">
                            <img src="" class="display"/>
                            <iframe src="https://www.youtube.com/embed/" frameborder="0"></iframe>
                        </div>
                        <div class="close">
                            <?php echo $this->Html->Image('close.png');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <?php echo $this->Html->Js("seriously-interactive-main.js");?>
    </body>
</html>