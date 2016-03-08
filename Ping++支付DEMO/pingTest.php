<?php
/**
 *
 * @authors alihanniba          alihanniba@gmail.com
 * @date    2016-03-08 10:36:33
 * @version \www.alihanniba.com\
 */

// require_once('vendor/autoload.php');

require dirname(__FILE__) . '/init.php';

//设置api-key
// \Pingpp\Pingpp::setApiKey('sk_test_ibbTe5jLGCi5rzfH4OqPW9KC');

$api_key = 'sk_test_ibbTe5jLGCi5rzfH4OqPW9KC';
$app_id = 'app_1Gqj58ynP0mHeX1q';

\Pingpp\Pingpp::setApiKey($api_key);

//配置私匙
// \Pingpp\Pingpp::setPrivateKeyPath('../rsa_private_key.pem');

//发起支付请求获取支付凭据
try {
    $ch = \Pingpp\Charge::create(
        array(
            'order_no'  => '123456232389',          //商户订单号，适配每个渠道对此参数的要求，必须在商户系统内唯一。(alipay: 1-64 位， wx: 1-32 位，bfb: 1-20 位，upacp: 8-40 位，yeepay_wap:1-50 位，jdpay_wap:1-30 位，cnp_u:8-20 位，cnp_f:8-20 位，推荐使用 8-20 位，要求数字或字母，不允许特殊字符
            'app'       => array('id' => $app_id),  //支付使用的 app 对象的 id，请登陆管理平台查看
            'channel'   => 'alipay_pc_direct',             //支付使用的第三方支付渠道
            'amount'    => 100,                     //订单总金额, 单位为对应币种的最小货币单位，例如：人民币为分（如订单总金额为 1 元，此处请填 100）
            'client_ip' => '127.0.0.1',             //发起支付请求终端的 IP 地址
            'currency'  => 'cny',                   //三位 ISO 货币代码，目前仅支持人民币 cny
            'subject'   => '电饭煲',                 //商品的标题，该参数最长为 32 个 Unicode 字符，银联全渠道（upacp/upacp_wap）限制在 32 个字节。
            'body'      => '煮饭用的',               //商品的描述信息，该参数最长为 128 个 Unicode 字符，yeepay_wap 对于该参数长度限制为 100 个 Unicode 字符。
            'extra'     => array(
                'success_url' => 'https://www.alihanniba.com/',
            ),
            'description' => 'sadfasff',            //订单附加说明，最多 255 个 Unicode 字符                                   //特定渠道发起交易时需要的额外参数以及部分渠道支付成功返回的额外参数。
        )
    );
    echo $ch;
} catch (\Pingpp\Error\Base $e) {
    header('Status: ' . $e->getHttpStatus());
    echo($e->getHttpBody());
}


