<?php

use Workerman\Worker;
use PHPSocketIO\SocketIO;

class Welcome extends CI_Controller
{

	public function index()
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


}
