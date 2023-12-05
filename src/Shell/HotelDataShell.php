<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;
/**
 * HotelData shell command.
 */
class HotelDataShell extends Shell
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
        $table = TableRegistry::getTableLocator()->get('hotels');
        $count = $table->find('all')->count();
        print_r($count);
        $last = $table->find('all')->last();
        print_r($last->toArray());
    }

}
