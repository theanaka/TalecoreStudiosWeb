<?php
class Model
{
    protected $ModelCollection;
    protected $IsSaved;                 // Is this object inserted into the database
    protected $IsDirty;                 // Has this object been changed in any way since its last save to the database
    protected $Properties;              // Properties matched in db
    protected $References;              // Model proxy objects for references
    protected $ReferenceCollections;    // List of other objects referring to this one
    protected $CustomProperties;        // Custom properties added from without the db. Wont be saved back
    protected $Models;                  // Reference to the models object so other models can be searched for with references

    function __construct($modelCollection)
    {
        $this->Models = Core::$Instance->GetModels();

        // When called the model data is being cached from db, no model collection will be sent in as it only needs the table name
        if($modelCollection == null){
            return;
        }

        $this->ModelCollection = $modelCollection;

        // Setup properties
        $this->Properties = array();
        foreach($modelCollection->ModelCache['Columns'] as $key => $column){
            $this->Properties[$column['Field']] = $column['Default'];
        }

        // Setup references
        $this->References = array();
        foreach($modelCollection->ModelCache['References'] as $key => $column){
            $fieldName = $this->CreateReferenceName($column['Field']);
            $modelName = $this->Models->GetModelNameForTable($column['TableName']);
            $model = $this->Models->GetModelForName($modelName);
            $this->References[$fieldName] = new ModelProxy($column['Field'], $model);
        }

        // Setup reverse properties
        $this->ReferenceCollections = array();
        foreach($modelCollection->ModelCache['ReversedReferences'] as $key => $column){
            $modelName = $this->Models->GetModelNameForTable($column['ModelName']);
            $model = $this->Models->GetModelForName($modelName);
            $this->ReferenceCollections[$key] = new ModelProxyCollection($column['Field'], $model, $column['TableColumn']);
        }

        // Create a way to handle custom properties
        $this->CustomProperties = array();

        $this->IsSaved = false;
        $this->IsDirty = false;
    }

    public function OnLoad()
    {
        foreach($this->References as $reference) {
            $reference->PrimaryKey = $this->Properties[$reference->FieldName];
        }

        foreach($this->ReferenceCollections as $reference){
            $localModelId = $this->Properties[$reference->LocalModelField];
            $reference->LocalModelId = $localModelId;
        }
    }

    public function Validate()
    {
        return array();
    }

    public function HasProperty($name)
    {
        return isset($this->Properties[$name]);
    }

    function FlagAsSaved()
    {
        $this->IsSaved = true;
    }

    function FlagAsClean()
    {
        $this->IsDirty = false;
    }

    function __get($propertyName)
    {
        if(array_key_exists($propertyName, $this->Properties)) {
            return $this->Properties[$propertyName];
        }else if(array_key_exists($propertyName, $this->References)) {
            if($this->References[$propertyName]->Object == null){
                $this->References[$propertyName]->Load();
            }
            return $this->References[$propertyName]->Object;
        } else if(array_key_exists($propertyName, $this->ReferenceCollections)){
            if($this->ReferenceCollections[$propertyName]->Collection == null){
                $this->ReferenceCollections[$propertyName]->Load();
            }
            return $this->ReferenceCollections[$propertyName]->Collection;
        } else if(array_key_exists($propertyName, $this->CustomProperties)){
            return $this->CustomProperties[$propertyName];
        }else{
            return null;
        }
    }

    function __set($propertyName, $value)
    {
        if(array_key_exists($propertyName, $this->Properties)){
            $this->Properties[$propertyName] = $value;
            $this->IsDirty = true;
        }else{
            $this->CustomProperties[$propertyName] = $value;
        }
    }

    public function IsSaved()
    {
        return $this->IsSaved;
    }

    public function IsDirty()
    {
        return $this->IsDirty;
    }

    public function Save()
    {
        $this->ModelCollection->Save($this);
        $this->FlagAsSaved();
        $this->FlagAsClean();
    }

    public function Delete()
    {
        $this->ModelCollection->Delete($this);
    }

    protected function CreateReferenceName($columnName)
    {
        if(endsWith($columnName, 'Id')){
            return replaceLastOccurence($columnName, 'Id', '');
        } else if(endsWith($columnName, '_id')){
            return replaceLastOccurence($columnName, '_id', '');
        }else{
            return $columnName + 'Object';
        }
    }
}