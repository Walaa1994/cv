<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL); ini_set('display_errors', 'On');
class Curl extends CI_Controller {
    public function __construct() {
    parent::__construct();
    }
    public function index(){
        $ch2 = curl_init("https://gateway.watsonplatform.net/personality-insights/api/v3/profile?version=2017-10-13&consumption_preferences=true&raw_scores=true");
        $request_headers = array();
        $request_headers[] = 'Content-Type: text/plain;charset=utf-8';
        $request_headers[] = 'Accept: application/json';
        $request_headers[] = 'Content-Language: ar';
        $request_headers[] = 'Accept-Language: ar';

        $simple_data = 'حبيب القلب و رفيق الدرب و السند ♥️
        ذكرياتنا كلها سوا ما بقدر اتذكر شي من دون ما يكون الك وجود بهالذكرى 👫
        فصلاتنا، جنانا ، مخططاتنا يلي ما كانت تتحقق و رغم ذلك نرد نخطط من دون ما نشك بحالنا ، سهراتنا،مغامرتنا، أسرارنا،غلاظتك علي، مين بدو ياكلي أكلاتي، مين بدو يدللني و يجيبلي أطيب الأكلات🍦🍰🍭🍬🍫🍪.
        مو مصدقة انك بعدت عني 😓، انت الوحيد يلي كنت مأمنة انو ما رح تبعد عني و فجأة بعدت و صرنا كل واحد بجهة من هالعالم 👧🌍👦
        بدي ياك تضل حمودة القوي يلي قد حالو و ما بينخاف عليه و تنجح بحياتك و تتحقق أحلامك و أحلامي، حمودة الأكبر من عمرو 😀💪
        اشتئتلك كتير يا حالوش ♥️
        اشتئتلك كتير أيها الوحش الكاسر ♥️
        تكدسوا عندي الأكلات الطيبة من دونك 🙈🙉🙊
        غياث Ghiath Al Koiry انت التاني غليظ تركتني😏 ما عاد في سهرات حلوة من دونكم ☹ ديروا بالكون على بعض و انبسطوا عني كأني معكون 😌 
        عنجد اشتئتلكون كتير';
        curl_setopt_array( $ch2, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $simple_data,
            CURLOPT_HTTPHEADER => $request_headers,
            CURLOPT_USERPWD => "711b221a-9f3e-46b9-9da0-57833e1435fe:lYSGyfpJPCRp",
            CURLOPT_SSL_VERIFYHOST,0,
            CURLOPT_SSL_VERIFYPEER,1,
        )
        );
        $response2 = curl_exec( $ch2 );
        //var_dump(curl_error($ch2));
        $decoded = json_decode($response2, true);
        print_r($decoded);
    }
}
?>
