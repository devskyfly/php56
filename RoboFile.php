<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * Needed packages:
 * composer require friendsofphp/php-cs-fixer --dev
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    use Robo\Task\Base\loadShortcuts;

    // define public methods as commands
    public function testsRun()
    {
        $tsk = $this->_exec("./vendor/codeception/codeception/codecept run unit");
    }

    public function codeFix()
    {
        $tsk = $this->_exec("./vendor/friendsofphp/php-cs-fixer/php-cs-fixer fix ./src"); 
    }
}