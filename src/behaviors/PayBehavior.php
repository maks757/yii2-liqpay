<?php
/**
 * Created by PhpStorm.
 * User: Cherednyk Maxim
 * Email: maks757q@gmail.com
 * Phone: +380639960375
 * Date: 15.06.2017
 * Time: 1:13
 */

namespace maks757\liqpay\sec\behaviors;


use maks757\liqpay\LiqPay;
use yii\base\Behavior;
use yii\base\Security;

class PayBehavior extends Behavior
{
    /**
     * @param $public_key string
     * @param $private_key string
     * @return string
     */
    public function paySend($public_key, $private_key, $amount, $currency = 'UAH', $description = '')
    {
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'action'         => 'paydonate',
            'amount'         => $amount,
            'currency'       => $currency,
            'description'    => $description,
            'order_id'       => uniqid(\Yii::$app->security->generateRandomKey()),
            'version'        => '3',
            'test'           => 'sandbox'
        ));
        return $html;
    }
}