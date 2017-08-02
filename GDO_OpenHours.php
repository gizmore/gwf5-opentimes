<?php
class GDO_OpenHours extends GDO_String
{
    public function defaultLabel() { return $this->label('open_times'); }
    
    public $editable = true;
    public $writable = true;

    public function render()
    {
        return GWF_Template::modulePHP('OpenTimes', 'form/open_hours.php', ['field' => $this]);
    }
    
    public function isOpen(int $time=null)
    {
        $time = $time === null ? time() : $time;
        $oh = $this->getGDOValue();
        $oh->isOpen($time);
    }
    
    public function initJSON()
    {
        return $this->getValue();
    }
    
    public function getGDOValue()
    {
        return new GWF_OpenHours($this->getValue());
    }
    
    public function validate($value)
    {
        if (!parent::validate($value))
        {
            return false;
        }
        if ($value === null)
        {
            return true;
        }
        $ot = new GWF_OpenHours($value);
        return $ot->isOpen() !== null;
    }
}
