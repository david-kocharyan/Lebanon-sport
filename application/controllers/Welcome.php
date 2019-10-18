<?php
require_once FCPATH . '/vendor/autoload.php';
use Workerman\Worker;
use PHPSocketIO\SocketIO;

class Welcome extends CI_Controller
{
	public function run_socket($argv=array())
	{
		$_this = $this;
		$io = new SocketIO(2022);
		$io->on('connection', function ($socket) use ($io, $_this) {
			echo "new connection coming\n";
			$socket->on('msg', function ($msg) use ($io, $_this) {
				$io->emit('typing', $msg);
			});
		});
		Worker::runAll();
	}

	public function start($mode = '')
	{
		global $argv;
		$argv[1] = 'start';
		$argv[2] = $mode;
		$this->run_socket($argv);
	}
	public function stop($mode = '')
	{
		global $argv;
		$argv[1] = 'stop';
		$argv[2] = $mode;
		$this->run_socket($argv);
	}
	public function restart($mode = '')
	{
		global $argv;
		$argv[1] = 'restart';
		$argv[2] = $mode;
		$this->run_socket($argv);
	}
	public function reload($mode = '')
	{
		global $argv;
		$argv[1] = 'reload';
		$argv[2] = $mode;
		$this->run_socket($argv);
	}
	public function status($mode = '')
	{
		global $argv;
		$argv[1] = 'status';
		$argv[2] = $mode;
		$this->run_socket($argv);
	}
	public function connections($mode = '')
	{
		global $argv;
		$argv[1] = 'connections';
		$argv[2] = $mode;
		$this->run_socket($argv);
	}
}



