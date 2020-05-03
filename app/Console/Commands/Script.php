<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// see: https://willvincent.com/2016/04/12/easily-running-custom-scripts-in-a-bootstrapped-laravel-environment/

class Script extends Command {

	protected $signature = 'script
                            {filename : path/filename.php of script to run relative to project root}
                            {args?* : Optional args to pass to script}';

	protected $description = 'Runs a script inside a bootstrapped laravel environment.';

	public function __construct() {
		parent::__construct();
	}

	public function handle() {
		// Make $args (if any) available to the file being included
		$args = $this->argument('args');
		// include the script file to run
		$filename = $this->argument('filename');
		if ($filename && !starts_with($filename, '/')) {
			$filename = base_path($filename);
		}
		if ($filename && !ends_with($filename, '.php') && !file_exists($filename)) {
			$filename .= '.php';
		}
		require($filename);
	}

}
