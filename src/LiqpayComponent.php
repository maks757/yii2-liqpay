<?php
/**
 * Created by PhpStorm.
 * User: Cherednyk Maxim
 * Email: maks757q@gmail.com
 * Phone: +380639960375
 * Date: 15.06.2017
 * Time: 0:39
 */

namespace maks757\yii2_liqpay\src;

use maks757\yii2_liqpay\src\behaviors\PayBehavior;
use yii\base\Component;

/**
 * @method paySend(string $public_key, string $private_key, string $amount, string $currency = 'UAH', string $description = '', string $result_url = '')
 * @method payRegularSend(string $date_start, string $type, string $amount, string $currency = 'UAH', string $description = '', string $result_url = '')
*/

class LiqpayComponent extends Component
{
    const USD = 'USD';
    const EUR = 'EUR';
    const RUB = 'RUB';
    const UAH = 'UAH';
    const BYN = 'BYN';
    const KZT = 'KZT';

    const EVERY_MONTH = 'month';
    const EVERY_YEAR = 'year';

    public $public_key = null;
    public $private_key = null;

    public function behaviors()
    {
        return [
            'myBehavior2' => PayBehavior::className(),
        ];
    }

    public function init()
    {
        if(empty($this->private_key) || empty($this->public_key))
            throw new \Exception('Invalid params ( public or private key )');
        parent::init(); // TODO: Change the autogenerated stub
    }


}