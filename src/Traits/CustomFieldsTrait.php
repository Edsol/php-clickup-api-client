<?php

namespace ClickUpClient\Traits;

trait CustomFieldsTrait
{    
    /**
     * getCustomFields
     *
     * @return void
     */
    public function getCustomFields(){
        $this->checkId();
        return $this->client()->get($this->model . DS . $this->id . DS . "field");
    }
    
    /**
     * setCustomField
     *
     * @param  string $field_id
     * @param  mixed $value
     * @return void
     */
    public function setCustomField(string $field_id, $value){
        $this->checkId();
        return $this->client()->post($this->model . DS . $this->id . DS . "field".DS .$field_id,[
            "value" => $value
        ]);
    }
    
    /**
     * deleteCustomField
     *
     * @param  string $field_id
     * @return void
     */
    public function deleteCustomField(string $field_id){
        $this->checkId();
        return $this->client()->delete($this->model . DS . $this->id . DS . "field".DS .$field_id);
    }


}