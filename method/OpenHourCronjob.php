<?php
/**
 * Precompute shop open times.
 * @author gizmore
 */
final class OpenTimes_OpenHourCronjob extends GWF_MethodCronjob
{
    public function run()
    {
        foreach (get_declared_classes() as $className)
        {
            if (is_subclass_of($className, 'GDO'))
            {
                $class = new ReflectionClass($className);
                if (!$class->isAbstract())
                {
                    $table = GDO::tableFor($className);
                    if (!$table->gdoAbstract())
                    {
                        $this->runForGDO($table);
                    }
                }
            }
        }
    }
    
    private function runForGDO(GDO $table)
    {
        foreach ($table->gdoColumnsCache() as $gdoType)
        {
            if ($gdoType instanceof GDO_OpenHour)
            {
                $this->runForColumn($table, $gdoType);
            }
        }
    }
    
    private function runForColumn(GDO $table, GDO_OpenHour $column)
    {
        $result = $table->select()->exec();
        while ($gdo = $table->fetch($result))
        {
            $hoursText = $gdo->getVar($column->hoursColumn);
            $hours = new GWF_OpenHours($hoursText);
            $openClose = $hours->isOpen();
            if ($openClose === true)
            {
                $openClose = 'open';
            }
            elseif ($openClose === false)
            {
                $openClose = 'closed';
            }
            else
            {
                $openClose = 'unknown';
            }
            $gdo->saveVar($column->name, $openClose);
        }
    }

    
}


