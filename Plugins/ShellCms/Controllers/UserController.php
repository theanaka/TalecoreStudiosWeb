<?php
class UserController extends Controller
{
    public function BeforeAction()
    {
        if($this->Action != "Login"){
            if(!$this->IsLoggedIn()){
                $this->Redirect('/User/Login/', array('ref' => $this->RequestUri));
            }
        }
        $this->Layout = "ShellCms";
    }

    public function Index()
    {
        $users = $this->Models->User->Where(array('IsDeleted'));
        $this->Set('Users', $users);
        $this->View();
    }

    public function Create()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $user = $this->Data->Parse('User', $this->Models->User);

            // Make som non-model validation on the post data
            $userRaw = $this->Data->RawParse('User');

            if(empty($userRaw["Username"])){
                $this->ModelValidation->AddError('User', 'Username', ' Field cannot be left empty');
            }

            if(empty($userRaw["DisplayName"])){
                $this->ModelValidation->AddError('User', 'DisplayName', ' Field cannot be left empty');
            }

            if(empty($userRaw['Password'])){
                $this->ModelValidation->AddError('User', 'Password', ' Field cannot be left empty');
            }

            if(empty($userRaw['RepeatPassword'])){
                $this->ModelValidation->AddError('User', 'RepeatPassword', ' Field cannot be left empty');
            }

            if($userRaw['Password'] !== $userRaw['RepeatPassword']){
                $this->ModelValidation->AddError('User', 'Password', 'Passwords don\'t match');
                $this->ModelValidation->AddError('User', 'RepeatPassword', 'Passwords don\'t match');
            }

            if($this->ModelValidation->Valid()){

                $user->PasswordSalt = uniqid('', true);
                $user->PasswordHash = hash('sha256', $userRaw['Password'] . $user->PasswordSalt);
                $user->IsInActive = 0;
                $user->IsDeleted = 0;
                $user->UserLevel = 0;

                $user->Save();
                return $this->Redirect('/User');
            }

            $this->Set('User', $user);
        }else{
            $user = $this->Models->User->Create();
            $this->Set('User', $user);
        }

        $this->View();
    }

    public function Edit($id)
    {
        if(empty($id)){
            return $this->HttpNotFound();
        }

        if(!$this->Models->User->Exists($id)){
            return $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty()){
            $user = $this->Data->DbParse('User', $this->Models->User);

            // Make som non-model validation on the post data
            $userRaw = $this->Data->RawParse('User');

            if(empty($userRaw["DisplayName"])){
                $this->ModelValidation->AddError('User', 'DisplayName', ' Field cannot be left empty');
            }

            if(empty($userRaw['Password'])){
                $this->ModelValidation->AddError('User', 'Password', ' Field cannot be left empty');
            }

            if(empty($userRaw['RepeatPassword'])){
                $this->ModelValidation->AddError('User', 'RepeatPassword', ' Field cannot be left empty');
            }

            if($userRaw['Password'] !== $userRaw['RepeatPassword']){
                $this->ModelValidation->AddError('User', 'Password', 'Passwords don\'t match');
                $this->ModelValidation->AddError('User', 'RepeatPassword', 'Passwords don\'t match');
            }

            if($this->ModelValidation->Valid()){
                $user->Save();
                return $this->Redirect('/User');
            }

            $this->Set('User', $user);
        }else{
            $user = $this->Models->User->Find($id);
            $this->Set('User', $user);
        }

        $this->View();
    }

    public function Delete($id)
    {
        if(empty($id)){
            return $this->HttpNotFound();
        }

        $user = $this->Models->User->Find($id);

        if(empty($user)){
            return $this->HttpNotFound();
        }

        $user->IsDeleted = 1;
        $user->Save();

        return $this->Redirect("/User");
    }

    public function Login()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()) {
            $username = $this->Data['Login']['Username'];
            $password = $this->Data['Login']['Password'];

            $user = $this->Models->User->Where(array('Username' => $username))->First();
            if($user == null){
                $this->Set('errorMessage', 'Invalid username and password combination');
                return $this->View();
            }

            $localPasswordHash = hash('sha256', $password . $user->PasswordSalt);
            if($user->PasswordHash != $localPasswordHash){
                $this->Set('errorMessage', 'Invalid username and password combination');
                return $this->View();
            }else{
                $this->SetLoggedInUser($user);

                if(isset($this->Get['ref'])){
                    return $this->Redirect($this->Get['ref']);
                }else {
                    return $this->Redirect('/');
                }
            }
       }else{
            return $this->View();
        }
    }

    public function Logout()
    {
        $this->LogoutCurrentUser();
        return $this->Redirect('/');
    }
}