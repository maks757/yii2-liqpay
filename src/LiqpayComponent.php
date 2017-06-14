<?php
/**
 * Created by PhpStorm.
 * User: Cherednyk Maxim
 * Email: maks757q@gmail.com
 * Phone: +380639960375
 * Date: 15.06.2017
 * Time: 0:39
 */

namespace maks757\liqpay\sec;

use maks757\liqpay\sec\behaviors\PayBehavior;
use yii\base\Component;

/**
 * @method paySend()
*/

class LiqpayComponent extends Component
{
    public function behaviors()
    {
        //(new LiqpayComponent())->paySend();

        return array_merge(parent::behaviors(),
            [
                'myBehavior2' => PayBehavior::className(),
            ]);
    }
}