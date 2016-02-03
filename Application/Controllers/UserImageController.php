<?php
class UserImageController extends Controller
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
        $userImages = $this->Models->UserImage->All();

        foreach($userImages->Keys() as $i){
            $userImages[$i]->Image = $this->Models->Image->Find($userImages[$i]->ImageId);
            $userImages[$i]->User = $this->Models->User->Find($userImages[$i]->UserId);
        }

        $this->Set('UserImages', $userImages);
        $this->View();
    }

    public function Create()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $userImage = $this->Data->Parse('UserImage', $this->Models->UserImage);

            $userImage->Save();
            return $this->Redirect('/UserImage/');
        }else{
            $this->CreateDropDowns();
            $userImage = $this->Models->UserImage->Create();
            $this->Set('UserImage', $userImage);
            $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        $userImage = $this->Models->UserImage->Find($id);
        if($userImage == null){
            return $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $userImage = $this->Data->DbParse('UserImage', $this->Models->UserImage);
            $userImage->Save();
            return $this->Redirect('/UserImage/');
        }else{
            $this->CreateDropDowns();
            $this->Set('UserImage', $userImage);
            $this->View();
        }
    }

    public function Delete($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        $userImage = $this->Models->UserImage->Find($id);
        if($userImage == null){
            return $this->HttpNotFound();
        }

        $userImage->Delete();
        return $this->Redirect('/UserImage');
    }

    public function CreateDropDowns()
    {
        $images = $this->Models->Image->Where(array('IsDeleted' => 0));
        $users = $this->Models->User->Where(array('IsDeleted' => 0));

        $this->Set(array(
            'Images' => $images,
            'Users' => $users
        ));
    }
}