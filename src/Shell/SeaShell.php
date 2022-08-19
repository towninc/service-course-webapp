<?php

namespace App\Shell;

use Cake\Console\Shell;

class SeaShell extends Shell
{
    // Found in src/Shell/Task/SoundTask.php
    public $tasks = ['Sound'];

    public function main()
    {
        $this->Sound->main();
    }
}

?>