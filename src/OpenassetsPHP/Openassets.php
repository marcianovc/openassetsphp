<?php
namespace youkchan\OpenassetsPHP;
use youkchan\OpenassetsPHP\Api;
use youkchan\OpenassetsPHP\Util;
use BitWasp\Bitcoin\Address\AddressFactory;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Network\NetworkFactory;
use Exception;

class Openassets
{
    private $api;
    private $network;

    public function __construct(){
        $this->api = new Api();
        Bitcoin::setNetwork(NetworkFactory::bitcoinTestnet());
        $this->network = Bitcoin::getNetwork();
    }

    public function set($key,$value){
        $this->api->set($key,$value);
    }

    public function get($key){
        return $this->api->get($key);
    }

    public function getApi(){
        return $this->api;
    }

    public function list_unspent($oa_address_list = []) {
        $mona_address_list = array();
        foreach ($oa_address_list as $oa_address) {
            $mona_address_list[] = Util::convert_oa_address_to_address($oa_address);
        }
        return $mona_address_list;
        //$outputs = get_unspent_outputs($mona_address_list);
        //$result = convert_to_hash($outputs);
        //return $result;
    }

    public function get_unspent_outputs($address_list = []) {
        //TODO bitcoin-ruby$B$N(Bvalid_address$B$KBP1~$7$F$$$k$H;W$o$l$k$,MW8!>Z(B
        //TODO $B:G?7%P!<%8%g%s$@$HBgI}$KJQ99$5$l$F$$$k(B.$B8=>u%G%U%)%k%H$G%$%s%9%H!<%k$5$l$k0BDj%P!<%8%g%s$rMxMQ(B
        $address_factory = new AddressFactory();
        foreach ($address_list as $address) {
            if (!$address_factory->isValidAddress($address,$this->network)) {
                throw new Exception($address . "is invalid bitcoin address");
            }
        }
        return "OK";

    }
}
