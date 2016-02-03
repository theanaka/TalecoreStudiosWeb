<?php
class StaticBlockController extends Controller
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/User/Login');
        }

        $this->Layout = "ShellCms";
    }

    public function Index()
    {
        $staticBlocks = $this->Models->StaticBlock->All();
        $this->Set('StaticBlocks', $staticBlocks);
        return $this->View();
    }

    public function Create()
    {
        if(!$this->Data->IsEmpty()){
            $staticBlock = $this->Data->Parse('StaticBlock', $this->Models->StaticBlock);

            if($staticBlock->Identifier == ""){
                $this->ModelValidation->AddError('StaticBlock', 'Identifier', 'This field can\'t be left empty');
            }

            if($this->Models->StaticBlock->Where(array('Identifier' => $staticBlock->Identifier))->First() != null){
                $this->ModelValidation->AddError('StaticBlock', 'Identifier', 'Identifier already in use');
            }

            if($this->ModelValidation->Valid()){
                $staticBlock->Save();
                return $this->Redirect('/StaticBlock/');
            }else{
                $this->Set('StaticBlock', $staticBlock);
                return $this->View();
            }

        }else{
            $staticBlock = $this->Models->StaticBlock->Create();
            $this->Set('StaticBlock', $staticBlock);
            return $this->View();
        }
    }

    public function Edit($id)
    {
        if($id == null){
            return $this->Redirect('/StaticBlock/');
        }

        if(!$this->Models->StaticBlock->Exists($id)){
            return $this->Redirect('/StaticBlock/');
        }

        if(!$this->Data->IsEmpty()){
            $staticBlock = $this->Data->DbParse('StaticBlock', $this->Models->StaticBlock);
            $staticBlock->Save();
            return $this->Redirect('/StaticBlock/');
        }

        $staticBlock = $this->Models->StaticBlock->Find($id);
        $this->Set('StaticBlock', $staticBlock);
        return $this->View();
    }
}
