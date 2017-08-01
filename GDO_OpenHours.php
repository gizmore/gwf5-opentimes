<?php
class GDO_OpenHours extends GDO_String
{
    public function defaultLabel() { return $this->label('open_times'); }
    
    public $editable = true;
    public $writable = true;

    public function render()
    {
        return GWF_Template::mainPHP('form/open_hours.php', ['field' => $this]);
    }
    
    public function isOpen(string $date=null)
    {
        $date = $date === null ? GWF_Time::getDate() : $date;
        
    }
    
    public function initJSON()
    {
        return $this->getGDOValue();
    }
    
}
