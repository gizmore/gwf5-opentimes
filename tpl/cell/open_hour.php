<?php $field instanceof GDO_OpenHour; ?>
<?php
switch ($field->getGDOValue())
{
    case 'open': l('enum_open'); break;
    case 'closed': l('enum_open'); break;
    case 'unknown': l('enum_unknown'); break;
}
