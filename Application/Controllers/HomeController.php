<?php

class HomeController extends Controller
{
    public function Index()
    {
        // Find the newspost
        $newsPosts = $this->Models->NewsPost->All()->Take(5);
        foreach($newsPosts as $newsPost){
            $newsPost->User = $this->Models->User->Find($newsPost->AuthorId);
            $newsPost->UserImage = $this->Models->UserImage->Where(array('UserId' => $newsPost->User->Id))->First();
            if($newsPost->UserImage != null){
                $newsPost->Image = $this->Models->Image->Find($newsPost->UserImage->ImageId);
            }else{
                $newsPost->Image = null;
            }
        }

        // Find the slide
        $slideShowImages = $this->Models->SlideshowImage->All();
        $staticImage = $slideShowImages->First();

        $this->Set('SlideShowImages', $slideShowImages);

        if($staticImage != null) {
            $this->Set('MastheadImage', $staticImage->Image->Name);
        }

        $this->Set('NewsPosts', $newsPosts);

        $this->Set('UseImageSlider', true);
        $this->Title = "News";
        $this->View();
    }

    public function Cms()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/User/Login/', array('ref' => $this->RequestUri));
        }

        $this->Layout = "ShellCms";
        $this->View();
    }
}