<?php
class UserInformationController extends Controller
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            $this->Redirect('/User/Login/', array('ref' => $this->RequestUri));
        }

        $this->Layout = "ShellCms";
    }

    public function Index()
    {
        $userInformation = $this->Models->UserInformation->All();
        foreach($userInformation as $key => $value){
            $userInformation[$key]->User = $this->Models->User->Find($value->UserId);
        }

        $this->Set('UserInformation', $userInformation);
        $this->View();
    }

    public function Create()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $userInformation = $this->Data->Parse('UserInformation', $this->Models->UserInformation);

            $userInformation->Save();
            $this->Redirect('/UserInformation/');
        }else {
            $users = $this->Models->User->Where(array('IsDeleted' => 0));
            $this->Set('Users', $users);
            $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        $userInformation = $this->Models->UserInformation->Find($id);
        if($userInformation == null){
            return $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $userInformation = $this->Data->DbParse('UserInformation', $this->Models->UserInformation);
            $userInformation->Save();
            return $this->Redirect(('/UserInformation/'));
        }else {
            $this->Set('UserInformation', $userInformation);
            $users = $this->Models->User->Where(array('IsDeleted' => 0));
            $this->Set('Users', $users);
            return $this->View();
        }
    }

    public function Delete($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        $userInformation = $this->Models->UserInformation->Find($id);
        if($userInformation == null){
            return $this->HttpNotFound();
        }

        $userInformation->Delete();
        $this->Redirect(('/UserInformation'));
    }
}