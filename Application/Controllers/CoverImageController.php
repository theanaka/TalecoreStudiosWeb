<?php
class CoverImageController extends Controller
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/User/Login', array('ref' => $this->RequestUri));
        }

        $this->Layout = "ShellCms";
    }

    public function Index()
    {
        $coverImages = $this->Models->CoverImage->All();
        $this->Set('CoverImages', $coverImages);
        return $this->View();
    }

    public function Create()
    {
        if($this->IsPost() && !$this->Data->IsEmpty()){
            $coverImage = $this->Data->Parse('CoverImage', $this->Models->CoverImage);

            if($this->Models->CoverImage->Any(array('Identifier' => $coverImage->Identifier))){
                $this->ModelValidation->AddError('CoverImage', 'Identifier', 'Identifier already exists');
            }

            if($this->ModelValidation->Valid()) {
                $coverImage->Save();
                return $this->Redirect('/CoverImage/');
            }else{
                $images = $this->Models->Image->Where(array('IsDeleted' => 0));
                $this->Set('Images', $images);
                $this->Set('CoverImage',$coverImage);
                return $this->View();
            }

        }else{
            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);
            $coverImage = $this->Models->CoverImage->Create();
            $this->Set('CoverImage', $coverImage);
            return $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null){
            return $this->HttpNotFound();
        }

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $coverImage = $this->Data->DbParse('CoverImage', $this->Models->CoverImage);

            if($this->ModelValidation->Valid()) {
                $coverImage->Save();
                return $this->Redirect('/CoverImage/');
            }

            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);

            $this->Set('CoverImage', $coverImage);
            return $this->View();
        }else {

            $coverImage = $this->Models->CoverImage->Find($id);
            if ($coverImage == null) {
                return $this->HttpNotFound();
            }

            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);

            $this->Set('CoverImage', $coverImage);
            return $this->View();
        }
    }
}