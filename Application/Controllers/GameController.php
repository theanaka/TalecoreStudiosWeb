<?php
class GameController extends Controller
{
    public function BeforeAction()
    {
        if($this->Action == "GameList" || $this->Action == "Details"){
            $this->Layout = "Default";
        }else{
            if(!$this->IsLoggedIn()){
                return $this->Redirect('/User/Login', array('ref' => $this->RequestUri));
            }else {
                $this->Layout = "ShellCms";
            }
        }
    }

    public function Index()
    {
        $games = $this->Models->Game->Where(array('IsDeleted' => 0));

        $this->Set('Games', $games);
        $this->View();
    }


    public function Create()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $game = $this->Data->Parse('Game', $this->Models->Game);

            if($this->ModelValidation->Valid()){
                $game->Save();

                return $this->Redirect('/Game/');
            }else{
                $images = $this->Models->Image->Where(array('IsDeleted' => 0));
                $this->Set('Images', $images);
                $this->Set('Game', $game);
                $this->View();
            }
        }else{
            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);
            $game = $this->Models->Game->Create();
            $game->IsActive = 1;
            $game->IsDeleted = 0;
            $this->Set('Game', $game);
            $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $game = $this->Data->DbParse('Game', $this->Models->Game);

            if($this->ModelValidation->Valid()) {
                $game->Save();
                return $this->Redirect('/Game');
            }else {
                $images = $this->Models->Image->Where(array('IsDeleted' => 0));
                $this->Set('Images', $images);
                $this->Set('Game', $game);
                return $this->View();
            }
        }else{
            $images = $this->Models->Image->Where(array('IsDeleted' => 0));
            $this->Set('Images', $images);
            $game = $this->Models->Game->Find($id);
            $this->Set('Game', $game);
            return $this->View();
        }
    }

    public function Delete($id)
    {
        if($id == null){
            return $this->HttpNotFound();
        }

        $game = $this->Models->Game->Find($id);
        if($game == null){
            return $this->HttpNotFound();
        }else{
            $game->IsDeleted = 1;
            $game->Save();
            return $this->Redirect('/Game/');
        }
    }

    public function GameList()
        {
        $this->Title = "Games";

        $mastHeadImage = $this->Models->CoverImage->Where(array('Identifier' => 'gamelist'))->First();
        $this->Set('MastheadImage', '/Image/Display/' . $mastHeadImage->Image->Name);

        $games = $this->Models->Game->Where(array('IsDeleted' => '0'));

        $this->Set('Games', $games);
        $this->View();
    }

    public function Details($title)
    {
        if($title == null || $title == ""){
            return $this->HttpNotFound();
        }

        $game = $this->Models->Game->Where(array('NavigationTitle' => $title))->First();
        if($game == null){
            return $this->HttpNotFound();
        }

        $mastheadImage = $this->Models->Image->Find($game->ImageId);

        $this->Title = $game->Title;
        $this->Set('Game', $game);
        $this->Set('MastheadImage', '/Image/Display/' . $mastheadImage->Name);

        return $this->View();
    }
}