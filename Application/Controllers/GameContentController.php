<?php
class GameContentController extends Controller
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
        $gameImages = $this->Models->GameImage->All();
        foreach($gameImages as $key => $value){
            $gameImages[$key]->Game = $this->Models->Game->Find($value->GameId);
            $gameImages[$key]->Image = $this->Models->Image->Find($value->ImageId);
        }

        $gameYoutubeLinks = $this->Models->GameYoutubeLink->All();
        foreach($gameYoutubeLinks as $key => $value){
            $gameYoutubeLinks[$key]->Game = $this->Models->Game->Find($value->GameId);
            $gameYoutubeLinks[$key]->Image = $this->Models->Image->Find($value->ImageId);
        }

        $this->Set('GameImages', $gameImages);
        $this->Set('GameYoutubeLinks',  $gameYoutubeLinks);
        $this->View();
    }

    public function CreateImage()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $gameImage = $this->Data->Parse('GameImage', $this->Models->GameImage);
            $gameImage->Save();
            $this->Redirect('/GameContent/');
        }else{
            $images = $this->Models->Image->All();
            $this->Set('Images', $images);

            $games = $this->Models->Game->All();
            $this->Set('Games', $games);

            $gameImage = $this->Models->GameImage->Create();
            $this->Set('GameImage', $gameImage);
            $this->View();
        }
    }

    public function CreateYoutubeLink()
    {
        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $gameYoutubeLink = $this->Data->Parse('GameYoutubeLink', $this->Models->GameYoutubeLink);
            $gameYoutubeLink->Save();
            $this->Redirect('/GameContent/');
        }else{
            $images = $this->Models->Image->All();
            $this->Set('Images', $images);

            $games = $this->Models->Game->All();
            $this->Set('Games', $games);

            $gameYoutubeLink = $this->Models->GameYoutubeLink->Create();
            $this->Set('GameYoutubeLink', $gameYoutubeLink);
            $this->View();
        }
    }

    public function EditImage($id)
    {
        if($id == null || $id == ""){
            $this->HttpNotFound();
        }

        if(!$this->Models->GameImage->Exists($id)){
            $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $gameImage = $this->Data->DbParse('GameImage', $this->Models->GameImage);
            $gameImage->Save();
            $this->Redirect('/GameContent/');
        }else{
            $images = $this->Models->Image->All();
            $this->Set('Images', $images);

            $games = $this->Models->Game->All();
            $this->Set('Games', $games);

            $gameImage = $this->Models->GameImage->Find($id);
            $this->Set('GameImage', $gameImage);
            $this->View();
        }
    }

    public function EditYoutubeLink($id)
    {
        if($id == null || $id == ""){
            $this->HttpNotFound();
        }

        if(!$this->Models->GameYoutubeLink->Exists($id)){
            $this->HttpNotFound();
        }

        if(!$this->Data->IsEmpty() && $this->IsPost()){
            $gameYoutubeLink = $this->Data->DbParse('GameYoutubeLink', $this->Models->GameYoutubeLink);
            $gameYoutubeLink->Save();
            $this->Redirect('/GameContent/');
        }else{
            $images = $this->Models->Image->All();
            $this->Set('Images', $images);

            $games = $this->Models->Game->All();
            $this->Set('Games', $games);

            $gameYoutubeLink = $this->Models->GameYoutubeLink->Find($id);
            $this->Set('GameYoutubeLink', $gameYoutubeLink);
            $this->View();
        }
    }

    public function DeleteImage($id)
    {
        if($id == null || $id == ""){
            return $this->HttpNotFound();
        }

        $gameImage = $this->Models->GameImage->Find($id);
        if($gameImage == null){
            return $this->HttpNotFound();
        }

        $gameImage->Delete();
        return $this->Redirect('/GameImage/');
    }
}