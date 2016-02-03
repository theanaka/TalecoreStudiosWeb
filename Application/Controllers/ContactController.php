<?php
class ContactController extends Controller
{
    public function Index()
    {
        $this->Title = "Contact";
        $this->Set('MastheadImage', $this->Html->ImageFilePath('bannercontact.png'));
        if(!$this->Data->IsEmpty() && $this->IsPost()){

        }else{
            return $this->View();
        }
    }
}