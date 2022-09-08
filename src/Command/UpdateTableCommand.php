<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class UpdateTableCommand extends Command
{
    protected function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser->setDescription('My cool console app');

        return $parser;
    }
}
?>