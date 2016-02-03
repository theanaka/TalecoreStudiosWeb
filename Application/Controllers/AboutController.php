<?php
class AboutController extends Controller
{
    public function BeforeAction()
    {
        $this->Layout = "Default";
    }

    public function Index()
    {
        $this->Title = "About";
        $this->Set('MastheadImage', $this->Html->ImageFilePath('bannerabout.png'));

        $users = $this->Models->User->All();
        foreach($users as $key => $value){
            $users[$key]->UserInformation = $this->Models->UserInformation->Where(array('UserId' => $value->Id))->First();
            $userImage = $this->Models->UserImage->Where(array('UserId' => $value->Id))->First();

            if($userImage != null){
                $users[$key]->Image = $this->Models->Image->Find($userImage->ImageId);
            }else{
                $users[$key]->Image = null;
            }
        }

        $this->Set('Users', $users);
        $this->View();
    }
}