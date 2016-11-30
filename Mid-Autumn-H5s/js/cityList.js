
function $F(fctId){
	return document.getElementById(fctId);
}

function F(objName)
{
    return document.getElementById(objName);
}

function c$(fctId,fctClassName){
	var varTempDivObj=$F(fctId);
	if(!varTempDivObj){
		//GetIframe("ifm"+fctId);
		varTempDivObj=document.createElement("div");
		varTempDivObj.id=fctId;
		if(fctClassName && fctClassName!="")varTempDivObj.className=fctClassName;
		document.body.appendChild(varTempDivObj);
	}
	return varTempDivObj;
}

function GetIframe(fctIfmId,fctVisibility,fctTop,fctLeft,fctWidth,fctHeight){
	var frmCity=$F(fctIfmId);
	if(!frmCity){
		frmCity=document.createElement("iframe");
		frmCity.id=fctIfmId;
		frmCity.style.position="absolute";
		frmCity.style.zIndex="1";
		frmCity.style.visibility="hidden";
		document.body.appendChild(frmCity);
	}
	if(fctTop)frmCity.style.top=fctTop+"px";
	if(fctLeft)frmCity.style.left=fctLeft+"px";
	if(fctWidth)frmCity.style.width=fctWidth+"px";
	if(fctHeight)frmCity.style.height=fctHeight+"px";
	if(fctVisibility)frmCity.style.visibility=(document.all?fctVisibility:"hidden	");
	return frmCity;
}

function getPosition(obj){
	var top=0;
	var left=0;
	var width=obj.offsetWidth;
	var height=obj.offsetHeight;
	while(obj.offsetParent){
		top+=obj.offsetTop;
		left+=obj.offsetLeft;
		obj=obj.offsetParent;
	}
	return{"top":top,"left":left,"width":width,"height":height};
}


function GetValueToInputObj(fctThisObj){
	if(!fctThisObj)return null;
	var varThisObjAutoInput=(fctThisObj.getAttributeNode("value_to_input")?fctThisObj.getAttributeNode("value_to_input").value:"");
	if(varThisObjAutoInput=="")return null;
	return $F(varThisObjAutoInput);
}


function AutoNextInputAct(fctThisObj,fctAct){
	var varNextInput=fctThisObj.getAttributeNode("nextinput");
	if(varNextInput && varNextInput!=""){
		if(document.all){
			eval("$F('"+varNextInput.value+"')."+fctAct+"()");
		}else{
			var evt = document.createEvent("MouseEvents");
			evt.initEvent(fctAct,true,true);
			$F(varNextInput.value).dispatchEvent(evt);
		}
		$F(varNextInput.value).focus();
	}
}

function AddFunToObj(fctObj,fctAct,fctFunction){
	if(fctObj.addEventListener){
		fctObj.addEventListener(fctAct.replace("on",""),function(e){
			e.cancelBubble=!eval(fctFunction);
		},false);
	}else if(fctObj.attachEvent){
		fctObj.attachEvent(fctAct,function(){
			return eval(fctFunction);
		});
	}
}
document.write('\
	<style type="text/css">\
		#divAddressMenu {line-height:20px;text-align:left;position:absolute;visibility:hidden;z-index:10000;;overflow:hidden;width:172px;background:#fff;border:solid #1bd9c3 1px;border-top:gray solid 1px;font-size:12px;}\
		#divAddressMenu h4{border-bottom:dotted #CCCCCC 1px;color:#999999;font-size:12px; font-weight:100; padding:2px 2px 0 2px; margin:0;}\
		#divAddressMenu div{padding:1px;}\
		#divAddressMenu a {display:block;width:162px !important;width:100%;padding:1px 2px 2px 2px;cursor:default;text-decoration:none;color:#008e91;background-color:none;}\
		#divAddressMenu a span{float:right;font-family:vernada }\
		#divAddressMenu a:hover {border:solid #1bd9c3 1px;background-color:#ecfafa;}\
	    .sel {border:solid 1px #1bd9c3;background-color:#ccf }\
	</style>\
');
var PageId=0,PageNum;

function GetCityList(fctThisObj){
	var varMenuObj=c$("divAddressMenu");
	var varThisObj=fctThisObj;
	if(varThisObj.id=="menuPageS"||varThisObj.id=="menuPageE"){
		varThisObj=varMenuObj.obj;
	}else{
		PageId=0;
	}
    var varAddressList = "@anqing|安庆|AQ|664|0@bengbu|蚌埠|BB|910|0@baotou|包头|BT|741|0@baoding|保定|BD|2818|0@beihai|北海|BH|1068|0@beijing|北京|BJ|447|0@binzhou|滨州|BZ|882|0@bozhou|亳州|BZ|2119|0@cangzhou|沧州|CZ|1889|0@changjizizhizhou|昌吉自治州|CJZZZ|2611|0@changchun|长春|CC|2329|0@changsha|长沙|CS|651|0@changzhou|常州|CZ|237|0@chaoyang|朝阳|CY|1959|0@chengdu|成都|CD|279|0@chizhou|池州|CZ|2095|0@chuzhou|滁州|CZ|901|0@dalizizhizhou|大理自治州|DLZZZ|2480|0@dalian|大连|DL|1699|0@datong|大同|DT|2290|0@dezhou|德州|DZ|579|0@dongguan|东莞|DG|254|0@dongying|东营|DY|1748|0@ shan|佛山|FS|2176|0@fuzhou|福州|FZ|801|0@fuyang|阜阳|FY|2881|0@guangzhou|广州|GZ|1969|0@guiyang|贵阳|GY|709|0@guilin|桂林|GL|898|0@haerbin|哈尔滨|HEB|558|0@haikou|海口|HK|2104|0@handan|邯郸|HD|2233|0@hanzhong|汉中|HZ|2845|0@hangzhou|杭州|HZ|261|0@hefei|合肥|HF|639|0@hechi|河池|HC|1072|0@heze|菏泽|HZ|895|0@huhehaote|呼和浩特|HHHT|645|0@hulunbeier|呼伦贝尔|HLBE|2423|0@huzhou|湖州|HZ|2205|0@huaian|淮安|HA|594|0@huaibei|淮北|HB|699|0@huainan|淮南|HN|1953|0@huangshan|黄山|HS|2451|0@jilin|吉林|JL|771|0@jinan|济南|JN|470|0@jining|济宁|JN|996|0@jiamusi|佳木斯|JMS|2230|0@jiaxing|嘉兴|JX|1536|0@jiaozuo|焦作|JZ|2242|0@jinhua|金华|JH|654|0@jinzhou|锦州|JZ|2543|0@jincheng|晋城|JC|2759|0@jinzhong|晋中|JZ|2316|0@jingmen|荆门|JM|2076|0@jingdezhen|景德镇|JDZ|2070|0@jiujiang|九江|JJ|702|0@jiuquan|酒泉|JQ|1781|0@kaifeng|开封|KF|907|0@kunming|昆明|KM|1833|0@laiwu|莱芜|LW|618|0@lanzhou|兰州|LZ|1545|0@langfang|廊坊|LF|993|0@lijiang|丽江|LJ|2623|0@lishui|丽水|LS|3038|0@lianyungang|连云港|LYG|762|0@liaocheng|聊城|LC|1527|0@linyi|临沂|LY|1008|0@liuan|六安|LA|2721|0@liupanshui|六盘水|LPS|2961|0@loudi|娄底|LD|947|0@luoyang|洛阳|LY|267|0@maanshan|马鞍山|MAS|271|0@nanchang|南昌|NC|276|0@nanjing|南京|NJ|221|0@nanning|南宁|NN|723|0@nantong|南通|NT|238|0@ningbo|宁波|NB|678|0@ningde|宁德|ND|1135|0@puyang|濮阳|PY|750|0@qinhuangdao|秦皇岛|QHD|2211|0@qingdao|青岛|QD|612|0@quzhou|衢州|QZ|2599|0@rizhao|日照|RZ|934|0@sanming|三明|SM|1131|0@sanya|三亚|SY|3093|0@shantou|汕头|ST|1569|0@shangqiu|商丘|SQ|2280|0@shanghai|上海|SH|226|0@shaoxing|绍兴|SX|1866|0@shenzhen|深圳|SZ|253|0@shenyang|沈阳|SY|273|0@shijiazhuang|石家庄|SJZ|746|0@suzhou|苏州|SZ|220|0@suqian|宿迁|SQ|732|0@suzhou|宿州|SZ|1726|0@taizhou|台州|TZ|600|0@taiyuan|太原|TY|736|0@taizhou|泰州|TZ|606|0@tangshan|唐山|TS|684|0@tianjin|天津|TJ|476|0@tianshui|天水|TS|1778|0@tongling|铜陵|TL|885|0@weihai|威海|WH|1563|0@weifang|潍坊|WF|756|0@wenzhou|温州|WZ|768|0@wulumuqi|乌鲁木齐|WLMQ|630|0@wuxi|无锡|WX|222|0@wuhu|芜湖|WH|1046|0@wuhan|武汉|WH|421|0@wuwei|武威|WW|1779|0@xian|西安|XA|719|0@xining|西宁|XN|2137|0@xiamen|厦门|XM|802|0@xinxiang|新乡|XX|2506|0@xinyu|新余|XY|2189|0@xingtai|邢台|XT|2569|0@xuzhou|徐州|XZ|816|0@yantai|烟台|YT|753|0@yanan|延安|YA|2527|0@yancheng|盐城|YC|759|0@yangzhou|扬州|YZ|239|0@yangjiang|阳江|YJ|2521|0@yangquan|阳泉|YQ|2768|0@yichang|宜昌|YC|2341|0@yinchuan|银川|YC|1736|0@yingtan|鹰潭|YT|2577|0@yuncheng|运城|YC|1766|0@zaozhuang|枣庄|ZZ|1854|0@zhangjiakou|张家口|ZJK|953|0@zhenjiang|镇江|ZJ|585|0@zhengzhou|郑州|ZZ|490|0@zhongshan|中山|ZS|706|0@chongqing|重庆|CQ|621|0@zhoushan|舟山|ZS|2156|0@zhoukou|周口|ZK|2414|0@zhuhai|珠海|ZH|2058|0@zibo|淄博|ZB|826|0@xiapuxian|霞浦县|XPX|2390|1@jiangduqu|江都区|JDQ|2396|1@xinqu|新区|XQ|2350|1@taixing|泰兴|TX|2362|1@xilingqu|西陵区|XLQ|2344|1@zhapuzhen|乍浦镇|ZPZ|2393|1@haimen|海门|HM|2347|1@huanghua|黄骅|HH|2356|1@pizhou|邳州|PZ|2377|1@tengzhou|滕州|TZ|2785|1@pingyinxian|平阴县|PYX|2386|1@sihongxian|泗洪县|SHX|2353|1@fengyangxian|凤阳县|FYX|2399|1@miyunxian|密云县|MYX|2402|1@qingyangxian|青阳县|QYX|2408|1@kaifaqu|开发区|KFQ|2411|1@zhangbeixian|张北县|ZBX|2420|1@congtaiqu|丛台区|CTQ|2449|1@longzihuqu|龙子湖区|LZHQ|2459|1@binhaixinqutanggu|滨海新区塘沽|BHXQTG|2463|1@pingtanxian|平潭县|PTX|2477|1@nanmingqu|南明区|NMQ|2486|1@longhuaqu|龙华区|LHQ|2500|1@muyequ|牧野区|MYQ|2507|1@jiangchengqu|江城区|JCQ|2525|1@luochuanxian|洛川县|LCX|2531|1@yizheng|仪征|YZ|2553|1@xiangshuixian|响水县|XSX|2580|1@jurong|句容|JR|2584|1@lushanqu|庐山区|LSQ|2587|1@nanqu|南区|NQ|2833|1@zoucheng|邹城|ZC|2729|1@tianjiaanqu|田家庵区|TJAQ|2644|1@yongcheng|永城|YC|2647|1@junanxian|莒南县|JNX|2656|1@taicang|太仓|TC|2659|1@yiwu|义乌|YW|2662|1@luyixian|鹿邑县|LYX|2417|1@jingjikaifaqu|经济开发区|JJKFQ|2534|1@tunxiqu|屯溪区|TXQ|2452|1@zhuozhou|涿州|ZZ|2839|1@binhaixinqudagang|滨海新区大港|BHXQDG|2462|1@yutaixian|鱼台县|YTX|2471|1@gaoxinqu|高新区|GXQ|2512|1@sanyuanqu|三元区|SYQ|2515|1@ganyuxian|赣榆县|GYX|2518|1@chuanhuiqu|川汇区|CHQ|2537|1@gutaqu|古塔区|GTQ|2547|1@nanjiaoqu|南郊区|NJQ|2558|1@qiaodongqu|桥东区|QDQ|2570|1@shouguang|寿光|SG|2561|1@kechengqu|柯城区|KCQ|2600|1@dingyuanxian|定远县|DYX|2608|1@guchengqu|古城区|GCQ|2624|1@jiangyin|江阴|JY|2629|1@lujiangxian|庐江县|LJX|2637|1@xinyi|新沂|XY|2650|1@gusuqu|姑苏区|GSQ|2682|1@liyang|溧阳|LY|2694|1@lianshuixian|涟水县|LSX|2712|1@tiantaixian|天台县|TTX|2718|1@shouxian|寿县|SX|2722|1@hexian|和县|HX|2731|1@yinhaiqu|银海区|YHQ|2737|1@luohuqu|罗湖区|LHQ|256|1@yixiuqu|宜秀区|YXQ|2756|1@chengqu|城区|CQ|2769|1@chipingxian|茌平县|CPX|2779|1@zhuanghe|庄河|ZH|2777|1@gaomi|高密|GM|2734|1@nanlangzhen|南朗镇|NLZ|2800|1@dongyang|东阳|DY|2810|1@kunshan|昆山|KS|2824|1@yuehuqu|月湖区|YHQ|2827|1@zhangdianqu|张店区|ZDQ|2836|1@huoshanxian|霍山县|HSX|2878|1@wuxingqu|吴兴区|WXQ|2887|1@dongchangfuqu|东昌府区|DCFQ|2905|1@panxian|盘县|PX|2962|1@longhuaxinqu|龙华新区|LHXQ|3015|1@fujin|富锦|FJ|2262|1@wujiang|吴江|WJ|3033|1@huangshanqu|黄山区|HSQ|3047|1@dali|大理|DL|3063|1@qianan|迁安|QA|3069|1@putuoqu|普陀区|PTQ|2852|1@shayibakequ|沙依巴克区|SYBKQ|2875|1@dafeng|大丰|DF|1693|1@tongxiang|桐乡|TX|1696|1@gaoyou|高邮|GY|2746|1@sheyangxian|射阳县|SYX|2749|1@yanjiaozhen|燕郊镇|YJZ|2765|1@rushan|乳山|RS|2896|1@suichangxian|遂昌县|SCX|3039|1@wenshangxian|汶上县|WSX|1965|1@luqiaoqu|路桥区|LQQ|2842|1@yingzhouqu|颍州区|YZQ|2882|1@jiaonan|胶南|JN|3090|1@cixi|慈溪|CX|2620|1@nanzhengxian|南郑县|NZX|2846|1@qingzhou|青州|QZ|2861|1@chaohu|巢湖|CH|3066|1@hexiqu|河西区|HXQ|3096|1@dongchengqu|东城区|DCQ|1278|1@yangpuqu|杨浦区|YPQ|236|1@pingjiangqu|平江区|PJQ|242|1@wuzhongqu|吴中区|WZQ|243|1@beitangqu|北塘区|BTQ|244|1@chonganqu|崇安区|CAQ|245|1@gaoxinjishuchanyekaifaqu|高新技术产业开发区|GXJSCYKFQ|417|1@jiangganqu|江干区|JGQ|262|1@huaiyinqu|槐荫区|HYQ|471|1@liyuanjingjikaifaqu|蠡园经济开发区|LYJJKFQ|246|1@hepingqu|和平区|HPQ|477|1@xinbeiqu|新北区|XBQ|247|1@jinganqu|静安区|JAQ|227|1@baixiaqu|白下区|BXQ|224|1@gulouqu|鼓楼区|GLQ|225|1@zhabeiqu|闸北区|ZBQ|228|1@jianxiqu|涧西区|JXQ|268|1@hepingqu|和平区|HPQ|274|1@dechengqu|德城区|DCQ|582|1@nangangqu|南岗区|NGQ|574|1@minhangqu|闵行区|MXQ|676|1@daoliqu|道里区|DLQ|568|1@nanqu|南区|NQ|613|1@tianshanqu|天山区|TSQ|631|1@hebeiqu|河北区|HBQ|636|1@shushanqu|蜀山区|SSQ|640|1@xinchengqu|新城区|XCQ|646|1@jiadingqu|嘉定区|JDQ|661|1@xishanqu|锡山区|XSQ|779|1@jiangningqu|江宁区|JNQ|791|1@hanjiangqu|邗江区|HJQ|810|1@qingxiuqu|青秀区|QXQ|813|1@nankaiqu|南开区|NKQ|834|1@hongqiaoqu|红桥区|HQQ|835|1@xiqingqu|西青区|XQQ|840|1@beichenqu|北辰区|BCQ|842|1@wuqingqu|武清区|WQQ|843|1@baodiqu|宝坻区|BDQ|844|1@wujinqu|武进区|WJQ|879|1@nanchangqu|南长区|NCQ|892|1@tianchang|天长|TC|902|1@yuhuataiqu|雨花台区|YHTQ|960|1@donggangqu|东港区|DGQ|968|1@xinhuaqu|新华区|XHQ|978|1@jinghuqu|镜湖区|JHQ|1047|1@fanchangxian|繁昌县|FCX|1052|1@yunlongqu|云龙区|YLQ|1115|1@runzhouqu|润州区|RZQ|588|1@chengyangqu|城阳区|CYQ|690|1@lianyunqu|连云区|LYQ|820|1@tianqiaoqu|天桥区|TQQ|874|1@furongqu|芙蓉区|FRQ|1187|1@futianqu|福田区|FTQ|1220|1@longgangqu|龙岗区|LGQ|1221|1@yantianqu|盐田区|YTQ|1223|1@yubeiqu|渝北区|YBQ|1232|1@xichengqu|西城区|XCQ|1279|1@mentougouqu|门头沟区|MTGQ|1280|1@fangshanqu|房山区|FSQ|1281|1@tongzhouqu|通州区|TZQ|1282|1@shunyiqu|顺义区|SYQ|1283|1@changpingqu|昌平区|CPQ|1284|1@huairouqu|怀柔区|HRQ|1286|1@pingguqu|平谷区|PGQ|1287|1@jiangdongqu|江东区|JDQ|1331|1@jiangbeiqu|江北区|JBQ|1332|1@huishanqu|惠山区|HSQ|1348|1@binhuqu|滨湖区|BHQ|1349|1@yingzequ|迎泽区|YZQ|1355|1@jiancaopingqu|尖草坪区|JCPQ|1357|1@jianganqu|江岸区|JAQ|1373|1@pukouqu|浦口区|PKQ|1421|1@liuhequ|六合区|LHQ|1427|1@wuchengqu|婺城区|WCQ|1444|1@qingyangqu|青羊区|QYQ|465|1@jinshanqu|金山区|JSQ|720|1@tianningqu|天宁区|TNQ|987|1@zhonglouqu|钟楼区|ZLQ|988|1@shangjiequ|上街区|SJQ|1406|1@yaohaiqu|瑶海区|YHQ|1459|1@luyangqu|庐阳区|LYQ|1460|1@baohequ|包河区|BHQ|1461|1@lixiaqu|历下区|LXQ|1468|1@langyaqu|琅琊区|LYQ|1530|1@nanhuqu|南湖区|NHQ|1537|1@huancuiqu|环翠区|HCQ|1564|1@longhuqu|龙湖区|LHQ|1570|1@jinpingqu|金平区|JPQ|1571|1@chaonanqu|潮南区|CNQ|1574|1@binchengqu|滨城区|BCQ|1608|1@gulouqu|鼓楼区|GLQ|1631|1@suyuqu|宿豫区|SYQ|1669|1@hailingqu|海陵区|HLQ|1672|1@gaogangqu|高港区|GGQ|1673|1@chuzhouqu|楚州区|CZQ|597|1@rudongxian|如东县|RDX|873|1@chongchuanqu|崇川区|CCQ|943|1@louxingqu|娄星区|LXQ|951|1@zhongqu|中区|CQ|999|1@yuzhongqu|渝中区|YZQ|1225|1@xiaodianqu|小店区|XDQ|1354|1@jianyequ|建邺区|JYQ|1424|1@xiaguanqu|下关区|XGQ|1425|1@xinpuqu|新浦区|XPQ|1680|1@jingkouqu|京口区|JKQ|1687|1@ganjingziqu|甘井子区|GJZQ|1706|1@jinzhouqu|金州区|JZQ|1707|1@xuyixian|盱眙县|XYX|1720|1@yongqiaoqu|埇桥区|YQQ|1727|1@xingqingqu|兴庆区|XQQ|1739|1@xuanhuaqu|宣化区|XHQ|1758|1@haianxian|海安县|HAX|1774|1@qinzhouqu|秦州区|QZQ|1795|1@xihuqu|西湖区|XHQ|1814|1@qingyunpuqu|青云谱区|QYPQ|1815|1@nanchangxian|南昌县|NCX|1826|1@shengzezhen|盛泽镇|SZZ|1829|1@haiyang|海阳|HY|1840|1@zhongqu|中区|CQ|1855|1@yuechengqu|越城区|YCQ|1867|1@xinchangxian|新昌县|XCX|1869|1@xinghua|兴化|XH|1926|1@xinqu|新区|XQ|1939|1@shuangtaqu|双塔区|STQ|1960|1@gangzhaqu|港闸区|GZQ|248|1@hongkouqu|虹口区|HKQ|229|1@putuoqu|普陀区|PTQ|231|1@xuhuiqu|徐汇区|XHQ|232|1@changningqu|长宁区|CNQ|233|1@songjiangqu|松江区|SJQ|234|1@fengxianqu|奉贤区|FXQ|235|1@guanglingqu|广陵区|GLQ|249|1@houjiezhen|厚街镇|HJZ|257|1@donghuqu|东湖区|DHQ|277|1@huangpuqu|黄浦区|HPQ|913|1@lanshanqu|兰山区|LSQ|1009|1@lianhuqu|莲湖区|LHQ|1020|1@yantaqu|雁塔区|YTQ|1021|1@beilinqu|碑林区|BLQ|1022|1@weiyangqu|未央区|WYQ|1024|1@penglai|蓬莱|PL|1839|1@yuhuaqu|裕华区|YHQ|1919|1@jiangyan|姜堰|JY|1956|1@baiyunqu|白云区|BYQ|1975|1@fanyuqu|番禺区|FYQ|1978|1@xunyangqu|浔阳区|XYQ|2007|1@xiangshanqu|相山区|XSQ|2010|1@changyiqu|昌邑区|CYQ|2019|1@tongguanshanqu|铜官山区|TGSQ|2055|1@hujizhen|胡集镇|HJZ|2077|1@pudongxinqu|浦东新区|PDXQ|414|1@wuchangqu|武昌区|WCQ|441|1@chaoyangqu|朝阳区|CYQ|450|1@haidianqu|海淀区|HDQ|452|1@fengtaiqu|丰台区|FTQ|453|1@daxingqu|大兴区|DXQ|454|1@shijingshanqu|石景山区|SJSQ|681|1@boshanqu|博山区|BSQ|827|1@xiaoshanqu|萧山区|XSQ|1311|1@haishuqu|海曙区|HSQ|1330|1@hualongqu|华龙区|HLQ|1659|1@tinghuqu|亭湖区|THQ|1662|1@yanduqu|盐都区|YDQ|1663|1@suchengqu|宿城区|SCQ|1668|1@yanhuqu|盐湖区|YHQ|1767|1@xinhuaqu|新华区|XHQ|1892|1@chuanyingqu|船营区|CYQ|2022|1@yunyanqu|云岩区|YYQ|2025|1@lunanqu|路南区|LNQ|2028|1@lubeiqu|路北区|LBQ|2029|1@jinchangqu|金阊区|JCQ|875|1@tongzhouqu|通州区|TZQ|940|1@huangdaoqu|黄岛区|HDQ|1479|1@dongyingqu|东营区|DYQ|1749|1@guichiqu|贵池区|GCQ|2098|1@laochengjingjikaifaqu|老城经济开发区|LCJJKFQ|2105|1@qiaochengqu|谯城区|QCQ|2122|1@guannanxian|灌南县|GNX|2129|1@wuhuaqu|五华区|WHQ|2265|1@yushuiqu|渝水区|YSQ|2192|1@pingshanxinqu|坪山新区|PSXQ|2195|1@haigangqu|海港区|HGQ|2214|1@qianjinqu|前进区|QJQ|2239|1@jiulongpoqu|九龙坡区|JLPQ|657|1@lichengqu|历城区|LCQ|712|1@hedongqu|河东区|HDQ|832|1@hexiqu|河西区|HXQ|833|1@dongliqu|东丽区|DLQ|839|1@xiachengqu|下城区|XCQ|1306|1@gongshuqu|拱墅区|GSQ|1307|1@xigongqu|西工区|XGQ|1645|1@xiangchengqu|相城区|XCQ|1943|1@xingzixian|星子县|XZX|2173|1@xiangshanqu|象山区|XSQ|2218|1@siyangxian|泗阳县|SYX|2221|1@nanxunqu|南浔区|NXQ|2268|1@caoxian|曹县|CX|2275|1@suiyangqu|睢阳区|SYQ|2283|1@donghaixian|东海县|DHX|2286|1@chengqu|城区|CQ|2293|1@yuciqu|榆次区|YCQ|2320|1@qiaoxiqu|桥西区|QXQ|2338|1@xinghualingqu|杏花岭区|XHLQ|1356|1@wanbailinqu|万柏林区|WBLQ|1358|1@jinyuanqu|晋源区|JYQ|1359|1@luchengqu|鹿城区|LCQ|1453|1@yizhou|宜州|YZ|1863|1@xiangzhouqu|香洲区|XZQ|2059|1@chengbeiqu|城北区|CBQ|2138|1@jinxiangxian|金乡县|JXX|2163|1@binhaixian|滨海县|BHX|2202|1@hanshanqu|邯山区|HSQ|2236|1@zhifuqu|芝罘区|ZFQ|1493|1@chengguanqu|城关区|CGQ|1546|1@xinjiapogongyeyuanqu|新加坡工业园区|XJPGYYQ|1936|1@gaotangxian|高唐县|GTX|2002|1@qufu|曲阜|QF|3056|1@zhushanqu|珠山区|ZSQ|2071|1@zhongshanqu|中山区|ZSQ|1702|1@xigangqu|西岗区|XGQ|1703|1@guanduqu|官渡区|GDQ|1834|1@jingqu|经区|JQ|1950|1@juyexian|巨野县|JYX|2110|1@gaomingqu|高明区|GMQ|2177|1@liangzhouqu|凉州区|LZQ|1801|1@suzhouqu|肃州区|SZQ|1807|1@qidong|启东|QD|2296|1@donghequ|东河区|DHQ|2013|1@yingjiangqu|迎江区|YJQ|2016|1@weichengqu|潍城区|WCQ|2034|1@kuiwenqu|奎文区|KWQ|2035|1@gangchengqu|钢城区|GCQ|2040|1@bengshanqu|蚌山区|BSQ|2049|1@mudanqu|牡丹区|MDQ|2052|1@rugao|如皋|RG|2147|1@deqingxian|德清县|DQX|2208|1@suixixian|濉溪县|SXX|2335|1@qinghequ|清河区|QHQ|783|1@qingpuqu|清浦区|QPQ|784|1@baoshanqu|宝山区|BSQ|794|1@shangchengqu|上城区|SCQ|917|1@chongmingxian|崇明县|CMX|920|1@muduzhen|木渎镇|MDZ|923|1@jingjijishukaifaqu|经济技术开发区|JJJSKFQ|957|1@qiaoxiqu|桥西区|QXQ|963|1@nanshanqu|南山区|NSQ|971|1@jiangnanqu|江南区|JNQ|1077|1@xixiangtangqu|西乡塘区|XXTQ|1078|1@canglangqu|沧浪区|CLQ|1109|1@huqiuqu|虎丘区|HQQ|1110|1@quanshanqu|泉山区|QSQ|1117|1@gulouqu|鼓楼区|GLQ|1118|1@jiawangqu|贾汪区|JWQ|1119|1@gulouqu|鼓楼区|GLQ|1150|1@cangshanqu|仓山区|CSQ|1152|1@simingqu|思明区|SMQ|1169|1@huliqu|湖里区|HLQ|1171|1@jingjiang|靖江|JJ|2496|1@qitaixian|奇台县|QTX|2612|1@jingkaiqu|经开区|JKQ|2864|1@jiefangqu|解放区|JFQ|2249|1@gaochunxian|高淳县|GCX|2255|1@lvyuanqu|绿园区|LYQ|2332|1@yulongxian|玉龙县|YLX|3087|1@gujiao|古交|GJ|3060|1@qiongshanqu|琼山区|QSQ|2679|1@pingyaoxian|平遥县|PYX|2685|1@shuyangxian|沭阳县|SYX|2697|1@changshu|常熟|CS|2709|1@guanyunxian|灌云县|GYX|2752|1@chengqu|城区|CQ|2760|1@xinqu|新区|XQ|2797|1@yixing|宜兴|YX|2869|1@manzhouli|满洲里 |MZL|3012|1@jingzhou|荆州|JZ|6666|1@"

   // varAddressList =varAddressList +'xuanhuaqu|宣化|XH|1758|1@hengdianzhen|横店|XH|2593|1@';

    if(document.getElementById("CityList") != null && document.getElementById("CityList").value != "")
        varAddressList=document.getElementById("CityList").value; 
	var varThisObjAutoInput=GetValueToInputObj(varThisObj); 
	if(varThisObjAutoInput)varThisObjAutoInput.value="";
	
	var varObjValue=varThisObj.value;
	var varThisObjAdd=(varThisObj.getAttributeNode("mod_address_suggest")?varThisObj.getAttributeNode("mod_address_suggest").value:"");
	var varData=(varObjValue==""?(varThisObjAdd==""?varAddressList:varThisObjAdd):varAddressList);
	var varHtmlStr="",varCityDataSplit=varData.split("@"),varCityDataSplitI,varCityDataSplitIu,varNextPageStr="";
	
	varMenuObj.obj=varThisObj;
	var varPageRCount=(varThisObj.getAttributeNode("pagecount")?parseInt(varThisObj.getAttributeNode("pagecount").value,10):8);
	
	var varThisPageI=0
	for(var i=1;i<varCityDataSplit.length-1;i++){
		varCityDataSplitI=varCityDataSplit[i];
		
		varCityDataSplitISplit=varCityDataSplitI.split("|");
		
		if(varCityDataSplitI.toUpperCase().indexOf(varObjValue.toUpperCase())==0|| varCityDataSplitISplit[2].toUpperCase().indexOf(varObjValue.toUpperCase())==0|| varCityDataSplitISplit[1].toUpperCase().indexOf(varObjValue.toUpperCase())>=0 || varObjValue=="" || i==varObjValue){ // || varCityDataSplitI.toLowerCase().indexOf(varObjValue.toLowerCase())>=0
		    
			varThisPageI+=1;
			if(varThisPageI>PageId*varPageRCount && varThisPageI<=(PageId+1)*varPageRCount){
				//varCityDataSplitISplit=varCityDataSplitI.split("|");
				varHtmlStr+="<a href='javascript:;' onclick='GetCity("+varThisPageI+")' id='menuA"+varThisPageI+"' title='"+varCityDataSplitI+"'><span>"+varCityDataSplitISplit[0]+"&nbsp;&nbsp;</span>"+varCityDataSplitISplit[1]+"</a>";//("+varCityDataSplitISplit[2]+")
			}			
		}
	}
	
	PageNum=parseInt(varThisPageI/varPageRCount)+1;
	
	if(varThisPageI>varPageRCount){
		varNextPageStr="&nbsp;<span id=menuPageS style="+(PageId>0?"cursor:pointer;":"color:#ccc;")+"font-family:Verdana>&lt;&lt;&nbsp;上一页</span><span style='margin:0 8px 0 8px'>"+(PageId+1)+"/"+PageNum+"</span>"
		varNextPageStr+="<span id=menuPageE style="+(varThisPageI>(PageId+1)*varPageRCount?"cursor:pointer;":"color:#ccc;")+"font-family:Verdana>下一页&nbsp;&gt;&gt;</span>";
	}
	var varThisObjPosition=getPosition(varThisObj);
	with(varMenuObj){
		style.top=varThisObjPosition.top+varThisObjPosition.height+"px";
		style.left=varThisObjPosition.left+"px";
		style.visibility="visible";
		innerHTML="<div><h4 style='font-family:vernada'>输入中文/拼音或→←↑↓选择</h4>"+(varHtmlStr==""?"<nobr>‘"+varObjValue+"’没有相应城市信息。</nobr>":varHtmlStr+varNextPageStr)+"</div>";
	}
	
	return false;
}

function GetCity(fctI){
	var varMenuObj=c$("divAddressMenu");
	var varThisObj=varMenuObj.obj;
	var varMenuValue=$F("menuA"+fctI).title;
	varMenuValue=varMenuValue.split("|"); 
	varThisObj.value=varMenuValue[1]; 
	var hidObj = $F('hotelcity');
	hidObj.value=varMenuValue[3]; hidObj.select();
	$F("hfCityLevel").value = varMenuValue[4];
	try{ CityChanged(e); } catch(e){ CityChanged(e); }      //外部接口
}

function _Hidden(e){
	e=e?e:event;
	var varMenuObj=c$("divAddressMenu");
	var varThisObj=varMenuObj.obj;
	if(varMenuObj.style.visibility!="hidden"){
		if(e){
			var EventOBJ=(e.srcElement?e.srcElement:e.target);
			if(EventOBJ.id=="menuPageS" && EventOBJ.style.color==""){
				PageId=PageId-1;
				GetCityList(EventOBJ);$F('city').focus(); index = -1;
			}
			if(EventOBJ.id=="menuPageE" && EventOBJ.style.color==""){
				PageId=PageId+1;
				GetCityList(EventOBJ);$F('city').focus(); index = -1;
			}
			if(varThisObj==EventOBJ || EventOBJ.id.indexOf("menuPage")==0 || EventOBJ.id.indexOf("divAddressMenu")==0) return false;
		}
		
		var varThisObjAutoInput=GetValueToInputObj(varThisObj);
		if($F("menuA1")){
			if(!varThisObjAutoInput)varThisObjAutoInput=varThisObj;
			if(varThisObjAutoInput.value=="" || varThisObjAutoInput==varThisObj){
				
			}
		}else if(EventOBJ.id.indexOf("menuA")<0){
			if(varThisObj)varThisObj.value="";
		}
		varMenuObj.style.visibility="hidden";
		//GetIframe("ifm"+varMenuObj.id,"hidden");
	}
}

function HiddenDateBox(){
	if($F("divDateBox")){
		if($F("divDateBox").style.visibility!="hidden" && $F("divDateBox").bodyclick=="1"){
			$F("divDateBox").style.visibility="hidden";
			$F("divDateBox").bodyclick="";
			GetIframe("ifmdivDateBox","hidden");
		}else{
			$F("divDateBox").bodyclick="1";
		}
	}
}
AddFunToObj(window,"onload","AddFunToObj(document,'onclick','_Hidden("+(document.all?"":"e")+");HiddenDateBox();');");

/*键盘选择的处理*/
var index = -1; var lstCity;
function selCity(e){    
    var event = e||window.event;    
    var keyCode = event.charCode||event.keyCode;     
    if(keyCode!=13&&(keyCode<37||keyCode>40)) { GetCityList($F('city')); stopBubble(e); return;}
    lstCity = $F("divAddressMenu"); 

    var lks = lstCity.getElementsByTagName('a');   //选中的城市在列表中序号   
    if(keyCode==13) { if(index<0) index=0; lks[index].onclick(); 
        if( lstCity.style.visibility!="hidden") stopBubble(e);     //选择城市
        lstCity.style.visibility="hidden"; //GetIframe("ifm"+c$("divAddressMenu").id,"hidden"); 
    }
    else if(keyCode==38) {        //向上 ||keyCode==37
        index--; if(index<0) index = lks.length-1; 
   } 
    else if(keyCode==40) {     //向下keyCode==39||
        index++; if(index>=lks.length) index = 0 ;
    }
    else if(keyCode==37){
        PageId--; if(PageId<0) PageId = PageNum-1; GetCityList($F('menuPageS')); index = -1; return;
    }  
    else if(keyCode==39){
        PageId++; if(PageId>=PageNum) PageId = 0; GetCityList($F('menuPageS')); index = -1; return;
    }   
    setCityListStyle(index,lks); 
}

function setCityListStyle(index,lks){
    for(var i=0;i<lks.length;i++) {lks[i].className = '';lks[i].style.color = '#008e91'; }
    lks[index].className = 'sel'; lks[index].style.color = 'red';
}

//输入关键字onblur事件默认选择第一个
function DefaultselCity(){  
    
    var hidObj = $F('hotelcity');   
    lstCity = $F("divAddressMenu");     
	if(hidObj.value=="" && index!=0 && PageNum>1)  return;  //不输入关键字则不执行默认选择
	
    var lks = lstCity.getElementsByTagName('a');   //选中的城市在列表中序号   
   
	if(lks.length==0)  return;     //输入没有匹配的关键字则返回
	
    if(index<0) index=0; lks[index].onclick(); 
    if( lstCity.style.visibility!="hidden") stopBubble(e);     //选择城市
    lstCity.style.visibility="hidden"; //GetIframe("ifm"+c$("divAddressMenu").id,"hidden"); 
    
    setCityListStyle(index,lks); 
}


function stopBubble(e)  //取消事件上冒
{
    if(!document.all)/* 非IE */
    {
        e.stopPropagation();/* 标准W3C的取消冒泡 */
        e.preventDefault(); /* 取消默认行为 */
    }
    else
    {
        event.cancelBubble = true;   /* IE的取消冒泡方式 */
        event.returnValue = false; /* IE的取消默认行为，如<a>的转向地址，类似于return false */
    }
}
