<?php
/**
 * Created by PhpStorm.
 * User: Cherednyk Maxim
 * Email: maks757q@gmail.com
 * Phone: +380639960375
 * Date: 15.06.2017
 * Time: 1:13
 */

namespace maks757\yii2_liqpay\src\behaviors;


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
    public function paySend($public_key, $private_key, $amount, $currency = 'UAH', $description = 'none')
    {
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form([
            'action'         => 'paydonate',
            'amount'         => $amount,
            'currency'       => $currency,
            'description'    => $description,
            'order_id'       => \Yii::$app->security->generateRandomString(),
            'version'        => '3',
            'sandbox'           => 1
        ]);
        return $html;
    }
}