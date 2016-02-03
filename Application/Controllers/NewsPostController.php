<?php
class NewsPostController extends Controller
{
    public function BeforeAction()
    {
        $allowedActions = array('Read', 'read');

        if(!in_array($this->Action, $allowedActions)) {
            $this->Layout = "ShellCms";
            if (!$this->IsLoggedIn()) {
                //return $this->Redirect('/cms/', array('ref' => $this->RequestUri));
            }
        }
    }

    public function Index()
    {
        $newsPosts = $this->Models->NewsPost->All();
        $this->Set('NewsPosts', $newsPosts);
        return $this->View();
    }

    public function Create()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $newsPost = $this->Data->Parse('NewsPost', $this->Models->NewsPost);
            $newsPost->AuthorId = $this->GetCurrentUser()->Id;
            $newsPost->PostTimeStamp = date('Y-m-d H:i');

            if($newsPost->Title == ""){
                $this->ModelValidation->AddError('NewsPost', 'Title', 'Field cannot be empty');
            }

            if($newsPost->Content == ""){
                $this->ModelValidation->AddError('NewsPost', 'Content','Field cannot be empty');
            }

            if($this->ModelValidation->Valid()){
                $newsPost->Save();
                $this->Redirect('/NewsPost/');
            }else {
                $images = $this->Models->Image->Where(array('IsDeleted' => 0));
                $this->Set('Images', $images);

                $this->Set('NewsPost', $newsPost);
                $this->View();
            }
        }else{
            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);

            $newsPost = $this->Models->NewsPost->Create();
            $this->Set('NewsPost', $newsPost);
            $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null){
            return $this->HttpNotFound();
        }

        if(!$this->Models->NewsPost->Exists($id)){
            return $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){

            $newsPost = $this->Data->DbParse('NewsPost', $this->Models->NewsPost);

            if($newsPost->Title == ""){
                $this->ModelValidation->AddError('NewsPost', 'Title', 'Field cannor be left empty');
            }

            if($newsPost->Content == ""){
                $this->ModelValidation->AddError('NewsPost', 'Content', 'Field cannor be left empty');
            }

            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);

            $newsPost->PostTimeStamp = date('y-m-d H:i');
            $newsPost->Save();
            return $this->Redirect('/NewsPost/');
        }else{
            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);

            $newsPost = $this->Models->NewsPost->Find($id);
            $this->Set('NewsPost', $newsPost);
            $this->View();
        }
    }

    public function Read($id)
    {
        if($id == null){
            return $this->Redirect('/NewsPost/');
        }

        $newsPost = $this->Models->NewsPost->Find($id);
        if($newsPost == null){
            return $this->Redirect('/NewsPost/');
        }

        if($newsPost->Image == null){
            $this->Set('MastheadImage', '');
        }else{
            $this->Set('MastheadImage', $newsPost->Image->ImageName);
        }

        $this->Title = $newsPost->Title;
        $this->Set('NewsPost', $newsPost);
        $this->Layout = "Default";
        $this->View();
    }

    public function Delete($id)
    {
        if($id == null){
            return $this->HttpNotFound();
        }

        $newsPost = $this->Models->NewsPost->Find($id);

        if($newsPost != null) {
            $newsPost->Delete();
        }

        return $this->Redirect('/NewsPost/');
    }
}