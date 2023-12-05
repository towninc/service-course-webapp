<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

/**
 * DeleteAllData shell command.
 */
class DeleteAllDataShell extends Shell
{
    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out('Deleting all data...');

        $tableName = 'hotels'; // テーブルの名前に置き換えてください
        $this->loadModel($tableName);

        // テーブルの全データを削除
        $this->{$tableName}->deleteAll([]);

        $this->out('All data has been deleted.');
    }
}
