<?php
class ContactController extends Controller
{
    public function Index()
    {
        $this->Title = "Contact";

        $mastHeadImage = $this->Models->CoverImage->Where(array('Identifier' => 'contact'))->First();
        $this->Set('MastheadImage', '/Image/Display/' . $mastHeadImage->Image->Name);
        if(!$this->Data->IsEmpty() && $this->IsPost()){

        }else{
            return $this->View();
        }
    }
}