<?php
/**
 * @authors alihanniba          alihanniba@gmail.com
 * @date    2016-06-15 16:16:27
 * @version \www.alihanniba.com\
 */

/**
 * Laravel框架
 */
class PutCityJsonToDatabase extends AnotherClass {
    
    function __construct(){
        
    }
    /**
     * 城市选择json写入数据库中间表
     * 台湾是手动输入
     * [putCityJsonToDatabase description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function putCityJsonToDatabase()
    {
        $filename = "zone.json";

        $json = file_get_contents($filename);

        $json = json_decode($json,true);

        $content = $json['children'];

        // return $content;

        foreach ($content as $key => $value) {
            $Ptext = $value['text'];

            if (count($value) < 3) {
                $last_insert_Pid = DB::table('sdk_message_put_province')->insertGetId(['text'=>$Ptext]);
            } else {
                $Pchildren = $value['children'] ? $value['children'] : '';

                $last_insert_Pid = DB::table('sdk_message_put_province')->insertGetId(['text'=>$Ptext]);

                foreach ($Pchildren as $Pk => $Pv) {
                    $Ctext = $Pv['text'];

                    if (count($Pv) < 3) {

                        $last_insert_Cid = DB::table('sdk_message_put_city')->insertGetId(['text'=>$Ctext,'pid'=>$last_insert_Pid]);

                    } else {
                        $Cchildren = $Pv['children'] ? $Pv['children'] : '';

                        $last_insert_Cid = DB::table('sdk_message_put_city')->insertGetId(['text'=>$Ctext,'pid'=>$last_insert_Pid]);
                    
                        foreach ($Cchildren as $Ck => $Cv) {
                            $Atext = $Cv['text'];
                            DB::table('sdk_message_put_area')->insert(['text'=>$Atext,'cid'=>$last_insert_Cid]);
                        }
                    }
                }
            }
        }

        return 'ok';
    }
}
