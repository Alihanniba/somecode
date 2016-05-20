/**
 * @authors \alihanniba\
 * @email   \alihanniba@gmail.com\
 * @date    2016-04-01 16:43:43
 * @version \www.alihanniba.com\
 */


//WebViewFunc是类名
//getMaterCode是方法名
//chip_code是参数
/**
 * 点击时必须写在一个函数内,否则不会生效
 */
window.WebViewFunc.getMasterCode(chip_code);

//第二种


var Terminal = {
    // 辨别移动终端类型
    platform : function(){
        var u = navigator.userAgent, app = navigator.appVersion;
        return {
            windows: u.indexOf('Windows NT') > -1 ,// windows
            android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
            iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //iPhone或者QQHD浏览器
            iPad: u.indexOf('iPad') > -1, //iPad
            mac: u.indexOf('Mac')// mac
        };
    }(),
    language : (navigator.browserLanguage || navigator.language).toLowerCase()
}

if(Terminal.platform.android){

    window.ADBannerJavaInterface.onAdBannerClick($(this).attr("data-url"));

} else if(Terminal.platform.iPhone){

    window.location.href = "objc://pushToAdPage::/" + $(this).attr("data-url");

}
