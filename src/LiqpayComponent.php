<?php
/**
 * Created by PhpStorm.
 * User: Cherednyk Maxim
 * Email: maks757q@gmail.com
 * Phone: +380639960375
 * Date: 15.06.2017
 * Time: 0:39
 */

namespace maks757\yii2_liqpay;

use maks757\yii2_liqpay\sec\behaviors\PayBehavior;
use yii\base\Component;

/**
 * @method paySend(string $public_key, string $private_key, string $amount, string $currency = 'UAH', string $description = '')
*/

class LiqpayComponent extends Component
{
    public function behaviors()
    {
        return [
            'myBehavior2' => PayBehavior::className(),
        ];
    }
}