<?php
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set('xdebug.var_display_max_depth', -1);

require_once "../vendor/autoload.php";
use youkchan\OpenassetsPHP\Openassets;

//$B%/%$%C%/%5%s%W%k$G$9!#%U%k%N!<%I$,5/F0$7$F$$$l$P!"$3$N%5%s%W%k$r;H$C$F(Basset$B$NH/9T$,$G$-$^$9(B

//$B8=:_$O(Bmonacoin,litecoin$B$N(Btestnet$B$N$_BP1~$7$F$$$^$9(B
//$B<+?H$N(Bmonacoind,litecoind$B$N(Brpc$B$K4X$9$k>pJs$rF~NO$7$F$/$@$5$$!#(B
$setting = array(
    "rpc_user" => "mona",
    "rpc_password" => "mona",
    "rpc_port" => 19402
);

$openassets = new Openassets($setting);

//utxo$B$,B8:_$9$k%"%I%l%9$G$"$l$P!"(Bget_balance$B$G;D9b$,<hF@$G$-(B
//Openassets$BMQ$N(Baddress(oa_address)$B$,<hF@$G$-$^$9!#(B
//asset$B$N$d$j<h$j$O(Boa_address$B$r;H$C$F<B;\$7$^$9(B
//asset$B$,H/9T:Q$_$G$"$l$P!"$=$N(Basset$B$N(Basset_id$B$b<hF@$G$-$^$9!#$3$l$O(Basset$B$N(Bsend$B$N;~$KI,MW$K$J$j$^$9!#(B
var_dump($openassets->get_balance());

$from_oa_address = "bWuEUSQbcx5gKTXkr6mnzBWN37WSyLEaXQf";

//$BH/9T$9$k%"%;%C%H$NNL$G$9(B
$quantity = 600;
//metadata$B$N@bL@$O8eF|5-:\(B
$metadata = "u=http://google.com";

//mainchain$B$N<j?tNA$G$9(B
$fee = 50000;

//var_dump($openassets->issue_asset($from_oa_address,$quantity, $metadata,null ,$fee));


$to_oa_address = "bXA27xniKb4TXGadndUUhV1vVCFpqPLQHZN";
$asset_id = "oWDNLde2LweGTgsVgtx6XcNNDZvm8kWnj1";

//var_dump($openassets->send_asset($from_oa_address,$asset_id , $quantity, $to_oa_address, $fee));

