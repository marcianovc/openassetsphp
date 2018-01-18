<?php
namespace youkchan\OpenassetsPHP\Transaction;
use BitWasp\Bitcoin\Transaction\TransactionFactory;
use youkchan\OpenassetsPHP\Transaction\TransferParameters;
use youkchan\OpenassetsPHP\Util;

class TransactionBuilder
{

    public $amount;
    public $estimated_fee_rate;

    public function __construct($amount = 600, $estimated_fee_rate = 10000)
    {
        $this->amount = $amount;
        $this->estimated_fee_rate = $estimated_fee_rate;
    }

    public function issue_asset(TransferParameters $issue_spec, $metadata, $fee = null) {
        if (is_null($fee)) {
            // Calculate fees (assume that one vin and four vouts are wrote)
            $fee = self::calc_fee(1, 4);
        }
        $transaction = TransactionFactory::build();
        $uncolored_outputs = self::collect_uncolored_outputs($issue_spec->unspent_outputs, $this->amount * 2 + $fee);
        $inputs = $uncolored_outputs[0];
        $total_amount = $uncolored_outputs[1];
        foreach ($inputs as $input) {
            $transaction = $transaction->spendOutPoint($input->out_point(), $input->output()->get_script());
        }
var_dump($issue_spec);
var_dump($issue_spec->change_script);
/*
        $issue_address  = Util::convert_oa_address_to_address($issue_spec->to_script);
        $from_address  = Util::convert_oa_address_to_address($issue_spec->change_script);
        if (Util::is_valid_address($issue_address) == false || Util::is_valid_address($from_address) == false) {
            return false;
        }
        $asset_quantities = [];
        foreach ($issue_spec->split_output_amount() as $amount) {
            $asset_quantities[] = $amount;
            $address_creator = new AddressCreator();
            $transaction = $transaction->payToAddress($this->amount, $address_creator->fromString($issue_address)); //getcoloredoutput
        }

        $tx = $tx->outputs([self::getMarkerOutput($assetQuantities, $metadata)]); //getcoloredoutput
        $tx = $tx->payToAddress($totalAmount - $this->amount - $fees, AddressFactory::fromString($fromAddress)); //getuncoloredoutput
        $tx = $tx->get();
        return $tx;*/
    }

    public function collect_uncolored_outputs($unspent_outputs, $amount)
    {
        $total_amount = 0;
        $results = [];
        foreach($unspent_outputs as $unspent_output) {
            if (is_null($unspent_output->output()->get_asset_id())) {
                $results[] = $unspent_output;
                $total_amount += $unspent_output->output()->get_value();
            }
            if ($total_amount >= $amount) {
                return [$results, $total_amount];
            } 
        }
        throw new Exception('Collect Uncolored Outputs went to Wrong');
    }  
    
    public function calc_fee($inputs_num, $outputs_num) 
    {
        $tx_size = 148 * $inputs_num + 34 * $outputs_num + 10;
        return (1 + $tx_size / 1000) * $this->estimated_fee_rate;
    }


}
