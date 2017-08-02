<?php
final class GDO_OpenHour extends GDO_Enum
{
    public $editable = false;
    
    public function __construct()
    {
        $this->enumValues('open', 'closed', 'unknown');
    }
    
    public $hoursColumn;
    public function hoursColumn(string $columnName)
    {
        $this->hoursColumn = $columnName;
        return $this;
    }
}
