<?php
class ContactController extends Controller
{
    public function Index()
    {
        $this->Title = "Contact";

        $mastHeadImage = $this->Models->CoverImage->Where(array('Identifier' => 'contact'))->First();

        if($mastHeadImage != null) {
            $this->Set('MastheadImage', '/Image/Display/' . $mastHeadImage->Image->Name);
        }

        return $this->View();
    }
}