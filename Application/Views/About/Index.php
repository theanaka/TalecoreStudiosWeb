<h1>About</h1>
<div id="content">
    <div id="about">
        <div>
            <span>
                <?php echo $this->Models->StaticBlock->Where(array('identifier' => 'about_copy'))->First()->Content;?>
            </span>
        </div>
        <div id="team">
            <h2>The team</h2>
            <?php foreach($Users as $user):?>
                <div class="memberWrapper">
                    <div class="member">
                        <?php if($user->Image != null):?>
                            <img src="<?php echo '/Image/Display/' . $user->Image->Name;?>">
                        <?php else:?>
                            <div class="filler">&nbsp;</div>
                        <?php endif;?>
                        <div class="name">
                            <?php echo $user->DisplayName;?>
                        </div>
                        <div class="roles">
                            <div class="role">
                                <?php if($user->UserInformation != null):?>
                                    <?php echo $user->UserInformation->Title;?>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="copy">
                            <?php if($user->UserInformation != null):?>
                                <?php echo $user->UserInformation->Content;?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="clear"></div>
    </div>
</div>