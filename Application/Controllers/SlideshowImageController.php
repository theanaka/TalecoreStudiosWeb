<?php
class SlideshowImageController extends Controller
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            $this->Redirect('/User/Login/', array('ref' => $this->RequestUri));
        }

        $this->Layout = "ShelLCms";
    }

    public function Index()
    {
        $slideshowImages = $this->Models->SlideshowImage->All();
        foreach($slideshowImages as $key => $value){
            $slideshowImages[$key]->Image = $this->Models->Image->Find($value->ImageId);
        }

        $this->Set('SlideshowImages', $slideshowImages);
        $this->View();
    }

    public function Create()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $slideShowImage = $this->Data->Parse('SlideshowImage', $this->Models->SlideshowImage);

            $slideShowImage->Save();
            return $this->Redirect('/SlideshowImage');
        }else{

            $images = $this->Models->Image->All();
            $this->Set('Images', $images);
            $slideshowImage = $this->Models->SlideshowImage->Create();
            $this->Set('SlideshowImage', $slideshowImage);
            return $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        if(!$this->Models->SlideshowImage->Exists($id)){
            return $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $slideshowImage = $this->Data->DbParse('SlideshowImage', $this->Models->SlideshowImage);
            $slideshowImage->Save();
            return $this->Redirect('/SlideshowImage');
        }else{
            $images = $this->Models->Image->All();
            $this->Set('Images', $images);
            $slideshowImage = $this->Models->SlideshowImage->Find($id);
            $this->Set('SlideshowImage', $slideshowImage);
            return $this->View();
        }
    }

    public function Delete($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        $slideshowImage = $this->Models->SlideshowImage->Find($id);
        if($slideshowImage != null){
            $slideshowImage->Delete();
        }

        return $this->Redirect('/SlideshowImage/');
    }
}