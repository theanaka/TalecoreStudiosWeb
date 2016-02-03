<?php
class ImageController extends Controller
{
    public function BeforeAction()
    {
        if($this->Action == "Display"){
            return;
        }

        if(!$this->IsLoggedIn()){
            $this->Redirect('/User/Login', array('ref' => $this->RequestUri));
        }
        $this->Layout = "ShellCms";
    }

    public function Index()
    {
        $this->Title = "Images";

        $images = $this->Models->Image->Where(array('IsDeleted' => 0));
        $this->Set('images', $images);
        $this->View();
    }

    public function Details($id)
    {
        $this->Title = "Image details";
        $image = $this->Models->Image->Where(array('id' => intval($id, 10), 'IsDeleted' => 0))->First();
        $this->Set('image', $image);
        $this->View();
    }

    public function Upload()
    {
        if(!$this->Data->IsEmpty()){
            $file = $this->Files['ImageFile'];
            $image = $this->Data->Parse('Image', $this->Models->Image);

            $imageName = uniqid();
            $imagePath = $this->Config['ImageUploads'] . $imageName;
            $file->Save($imagePath);

            $image->Path = $imagePath;
            $image->Timestamp = date('Y-m-d', time());
            $image->FileName = $file->Name;
            $image->MimeType = $file->Type;
            $image->IsDeleted = 0;
            $image->Save();

            $this->Redirect('/Image/');
            return;
        }

        $this->View();
    }

    public function Edit($id)
    {
        if($id == null){
            return $this->HttpNotFound();
        }

        $image = $this->Models->Image->Find($id);

        // Make sure the image id is a valid one
        if(empty($image)){
            return $this->HttpNotFound();
        }else{
            if($image->IsDeleted == 1){
                return $this->HttpNotFound();
            }
        }

        if($this->Data->IsEmpty()){
            $this->Set('Image', $image);
            $this->View();
        }else{
            $image = $this->Data->DbParse('Image', $this->Models->Image);
            $image->Save();
            return $this->Redirect('/Image');
        }
    }

    public function Delete($id)
    {
        if(empty($id)){
            return $this->HttpNotFound();
        }

        $image = $this->Models->Image->Find($id);
        if(empty($image)){
            return $this->HttpNotFound();
        }

        $image->IsDeleted = 1;
        $image->Save();

        $this->Redirect('/Image');
    }

    // Takes the name of the image when it was uploaded and views the content of that file as an image
    public function Display($name)
    {
        $image = $this->Models->Image->Where(array('Name' => $name))->First();
        if(empty($image)){
            return $this->HttpNotFound();
        }else{
            $this->SetType($image->MimeType);
            $filePath = APPLICATION_ROOT . $image->Path;
            $fileContent = file_get_contents($filePath);
            echo $fileContent;
        }
    }
}