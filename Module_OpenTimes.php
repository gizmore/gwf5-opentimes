<?php
final class Module_OpenTimes extends GWF_Module
{
    public $module_priority = 20;
    public function getClasses() { return ['GWF_OpenHours', 'GDO_OpenHours', 'GDO_OpenHour']; }
    public function onLoadLanguage() { $this->loadLanguage('lang/open_times'); }
    
    public function onIncludeScripts()
    {
        $this->addJavascript('bower_components/opening_hours/opening_hours.js');
        $this->addJavascript('js/gwf-open-hours-ctrl.js');
    }
}
