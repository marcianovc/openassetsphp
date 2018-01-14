<?php
use PHPUnit\Framework\TestCase;
use youkchan\OpenassetsPHP\Openassets;

class OpenassetsTest extends TestCase
{

    private $openassets;

    public function setUp(){
        $this->openassets = new Openassets(); 
    }
 
/*    public function testGetApi(){
        $openassets = new Openassets();
        $api = $openassets->getApi();
        $this->assertSame($api->get("network"),'mainnet');
        $this->assertSame($api->get("provider"),'monacoin');
        $this->assertSame($api->get("cache"),'cache.db');
        $this->assertSame($api->get("dust_limit"),600);
        $this->assertSame($api->get("default_fee"),10000);
        $this->assertSame($api->get("min_confirmation"),1);
        $this->assertSame($api->get("max_confirmation"),9999999);
        $this->assertSame($api->get("rpc_host"),'localhost');
        $this->assertSame($api->get("rpc_user"),'');
        $this->assertSame($api->get("rpc_password"),'');
        $this->assertSame($api->get("rpc_wallet"),'');
        $this->assertSame($api->get("rpc_schema"),'https');
        $this->assertSame($api->get("rpc_timeout"),60);
        $this->assertSame($api->get("rpc_open_timeout"),60);
    }
*/
    public function test_list_unspent(){
    //    $result = $this->openassets->list_unspent();
        //var_dump($result);
    }

    public function test_get_unspent_outputs(){
        $address = ['mzi2Dbx1Q9gdFHhJga2rEhyMaUT5QuMrk3'];
        $result = $this->openassets->get_unspent_outputs($address);
        //$address_list = ['MCfN6CUST7TtoDhGNhocfMstStjUr8SFNT'];
    //    $address_list = ['mzi2Dbx1Q9gdFHhJga2rEhyMaUT5QuMrk3'];
        //$address_list = ['3EktnHQD7RiAE6uzMj2ZifT9YgRrkSgzQX'];
    //    $result = $this->openassets->get_unspent_outputs($address_list);
    //    $this->assertSame($result,'OK');
    }

    public function test_load_transaction(){
        $transaction_id = "18a9aadd4c6d2c8eb05eaec8c71ec09b3dd202bd863017227ad6a1a2d2bc41b5";
        
        
    }

    public function test_get_output() {
        $transaction_id = "da3851496a0cdf5447d53d1a735085532be59b45aadc8961ed464853c283b61c";
        $this->openassets->get_output($transaction_id,0);
    }

    
}
