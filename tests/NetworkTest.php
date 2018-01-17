<?php
use PHPUnit\Framework\TestCase;
use youkchan\OpenassetsPHP\Network;
use youkchan\OpenassetsPHP\Openassets;

class NetworkTest extends TestCase
{

    public function setUp(){
        $this->openassets = new Openassets(); 
        $this->network = new Network(); 
    }

    public function test_change_network() {
        //$previous_network_name_check = "MonacoinTestnet";
        $previous_network_name_check = "LitecoinTestnet";
        $current_network_name_check = "Monacoin";
        $previous_network_array = explode("\\", get_class($this->network->get_bclib_network()));
        $this->assertSame(end($previous_network_array),$previous_network_name_check);
        
        $this->network->change_network("monacoin");
        $current_network_array = explode("\\", get_class($this->network->get_bclib_network()));
        $this->assertSame(end($current_network_array),$current_network_name_check);
    }


    public function test_get_p2pkh_address_prefix() {
        $result = $this->network->get_p2pkh_address_prefix();
        $this->assertSame("6f", $result);
    }

}