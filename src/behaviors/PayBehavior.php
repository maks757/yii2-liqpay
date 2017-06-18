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
     * @param $amount integer
     * @param $currency string
     * @param $description string
     * @param $result_url string
     * @return string
     */
    public function paySend($amount, $currency = 'UAH', $description = '', $result_url = '')
    {
        $liqpay = new LiqPay($this->owner->public_key, $this->owner->private_key);
        $html = $liqpay->cnb_form([
            'action'      => 'paydonate',
            'amount'      => $amount,
            'currency'    => $currency,
            'description' => $description,
            'order_id'    => \Yii::$app->security->generateRandomString(),
            'version'     => '3',
            'sandbox'     => 1,
            'result_url'  => $result_url
        ]);
        return $html;
    }

    /**
     * @param $date_start string
     * @param $type string
     * @param $amount integer
     * @param $currency string
     * @param $description string
     * @param $result_url string
     * @return string
     */
    public function payRegularSend($date_start, $type, $amount, $currency = 'UAH', $description = '', $result_url = '')
    {
        $liqpay = new LiqPay($this->owner->public_key, $this->owner->private_key);
        $html = $liqpay->cnb_form([
            'action'                => 'paydonate',
            'amount'                => $amount,
            'currency'              => $currency,
            'description'           => $description,
            'order_id'              => \Yii::$app->security->generateRandomString(),
            'version'               => '3',
            'sandbox'               => 1,
            'result_url'            => $result_url,
            'subscribe'             => true,
            'subscribe_date_start'  => $date_start,
            'subscribe_periodicity' => $type,
        ]);
        return $html;
    }
}