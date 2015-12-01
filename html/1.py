import commands

map = {"486":{"x":"15210125158","y":"2015_10_28"},"857":{"x":"13601064514","y":"2015_10_29"},"1086":{"x":"18640375645","y":"2015_10_29"},"1268":{"x":"15810380612","y":"2015_10_29"},"1439":{"x":"18701648168","y":"2015_10_29"},"1796":{"x":"18190740292","y":"2015_10_29"},"1910":{"x":"15311431907","y":"2015_10_29"},"1930":{"x":"13371109605","y":"2015_10_29"},"2249":{"x":"18602809809","y":"2015_10_29"},"2292":{"x":"13548088404","y":"2015_10_29"},"2631":{"x":"13570954775","y":"2015_10_29"},"2787":{"x":"18578332420","y":"2015_10_30"},"2920":{"x":"15010694686","y":"2015_10_30"},"3299":{"x":"18616775578","y":"2015_10_30"},"3570":{"x":"17090086867","y":"2015_10_30"},"3943":{"x":"13661269288","y":"2015_10_30"},"4029":{"x":"15175990517","y":"2015_10_30"},"4060":{"x":"13661318857","y":"2015_10_30"},"4345":{"x":"15616304060","y":"2015_10_30"},"4529":{"x":"13604558294","y":"2015_10_30"},"4737":{"x":"13901002795","y":"2015_10_30"},"4966":{"x":"13786185519","y":"2015_10_30"},"5284":{"x":"13833638669","y":"2015_10_30"},"5478":{"x":"13853236281","y":"2015_10_30"},"6182":{"x":"13693277839","y":"2015_10_30"},"6218":{"x":"13671143091","y":"2015_10_30"},"6322":{"x":"13851935540","y":"2015_10_30"},"6904":{"x":"15265215560","y":"2015_10_30"},"6927":{"x":"15611025855","y":"2015_10_30"},"8946":{"x":"18642839839","y":"2015_10_31"},"9250":{"x":"15004100157","y":"2015_10_31"},"9659":{"x":"15940801049","y":"2015_10_31"},"9875":{"x":"13831537227","y":"2015_11_01"},"10380":{"x":"13601278346","y":"2015_11_01"},"10602":{"x":"13701189969","y":"2015_11_01"},"10631":{"x":"13508482396","y":"2015_11_01"},"10699":{"x":"13811290853","y":"2015_11_01"},"10974":{"x":"13294130975","y":"2015_11_01"},"11917":{"x":"13811155572","y":"2015_11_02"},"11921":{"x":"15501087710","y":"2015_11_02"},"12261":{"x":"15840469940","y":"2015_11_02"},"12382":{"x":"18612015245","y":"2015_11_02"},"12926":{"x":"13466357674","y":"2015_11_02"},"13015":{"x":"15003858615","y":"2015_11_02"},"13153":{"x":"13673386521","y":"2015_11_02"},"13553":{"x":"13844106436","y":"2015_11_02"},"13785":{"x":"13260117879","y":"2015_11_02"},"13800":{"x":"13911573163","y":"2015_11_02"},"14223":{"x":"13822211177","y":"2015_11_02"},"14486":{"x":"18210204023","y":"2015_11_03"},"14569":{"x":"15659868392","y":"2015_11_03"},"14881":{"x":"15396623053","y":"2015_11_03"},"15407":{"x":"18802231981","y":"2015_11_03"},"15519":{"x":"15810588541","y":"2015_11_04"},"16426":{"x":"15804092363","y":"2015_11_04"},"16699":{"x":"13834100909","y":"2015_11_04"},"16974":{"x":"18553212459","y":"2015_11_04"},"17212":{"x":"15551539991","y":"2015_11_04"},"17549":{"x":"13752518276","y":"2015_11_04"},"18549":{"x":"18628180443","y":"2015_11_05"},"18758":{"x":"15664335304","y":"2015_11_05"},"18759":{"x":"18423719683","y":"2015_11_05"},"18778":{"x":"15664334844","y":"2015_11_05"},"18779":{"x":"15664334946","y":"2015_11_05"},"18780":{"x":"18423719679","y":"2015_11_05"},"18781":{"x":"15664334654","y":"2015_11_05"},"18782":{"x":"15664334954","y":"2015_11_05"},"18783":{"x":"18423719681","y":"2015_11_05"},"18784":{"x":"18423719680","y":"2015_11_05"},"18785":{"x":"15892667831","y":"2015_11_05"},"18786":{"x":"18423719682","y":"2015_11_05"},"18787":{"x":"15664335144","y":"2015_11_05"},"18788":{"x":"15664334964","y":"2015_11_05"},"19262":{"x":"13934516801","y":"2015_11_05"},"20886":{"x":"18865969869","y":"2015_11_06"},"20998":{"x":"13280316663","y":"2015_11_06"},"21000":{"x":"15065469095","y":"2015_11_06"},"21314":{"x":"15350568010","y":"2015_11_06"},"21449":{"x":"15053858166","y":"2015_11_06"},"22146":{"x":"13070589570","y":"2015_11_06"},"22202":{"x":"13668916533","y":"2015_11_06"},"22484":{"x":"18759038110","y":"2015_11_07"},"22950":{"x":"13646864468","y":"2015_11_07"},"23012":{"x":"15710251194","y":"2015_11_07"},"23891":{"x":"15554261236","y":"2015_11_09"},"23894":{"x":"15666699811","y":"2015_11_09"},"25299":{"x":"18634656664","y":"2015_11_11"},"25358":{"x":"15273413794","y":"2015_11_11"},"25806":{"x":"13654379471","y":"2015_11_12"},"26343":{"x":"15948000411","y":"2015_11_12"},"26478":{"x":"15948005506","y":"2015_11_12"},"26876":{"x":"18946523870","y":"2015_11_12"},"27683":{"x":"18910968632","y":"2015_11_12"},"28237":{"x":"13902300066","y":"2015_11_12"},"28344":{"x":"13998842013","y":"2015_11_12"},"29213":{"x":"13904309579","y":"2015_11_12"},"30075":{"x":"15802193303","y":"2015_11_12"},"30276":{"x":"13949397314","y":"2015_11_13"},"30670":{"x":"18686669471","y":"2015_11_13"},"31542":{"x":"13844900292","y":"2015_11_13"},"33285":{"x":"13672556547","y":"2015_11_14"},"34773":{"x":"13844035300","y":"2015_11_16"},"35712":{"x":"13026301221","y":"2015_11_16"},"36116":{"x":"13796768078","y":"2015_11_16"},"36363":{"x":"13694514941","y":"2015_11_16"},"36470":{"x":"13026365668","y":"2015_11_17"},"36932":{"x":"13691058050","y":"2015_11_17"},"37537":{"x":"15611121741","y":"2015_11_17"},"38099":{"x":"15643217320","y":"2015_11_17"},"38277":{"x":"15266197135","y":"2015_11_17"},"38491":{"x":"15620516195","y":"2015_11_17"},"40633":{"x":"13241525614","y":"2015_11_18"},"40649":{"x":"15611676089","y":"2015_11_18"},"40747":{"x":"18561245095","y":"2015_11_18"},"41005":{"x":"15804664760","y":"2015_11_18"},"42043":{"x":"15510309980","y":"2015_11_19"},"42477":{"x":"13641359284","y":"2015_11_19"},"42727":{"x":"15246059432","y":"2015_11_19"},"42839":{"x":"13904302209","y":"2015_11_19"},"43096":{"x":"13214417472","y":"2015_11_19"},"43211":{"x":"13944852347","y":"2015_11_19"},"44099":{"x":"18310995696","y":"2015_11_20"},"44238":{"x":"15104664427","y":"2015_11_20"},"44875":{"x":"15140359001","y":"2015_11_20"},"44907":{"x":"18591950298","y":"2015_11_20"},"45291":{"x":"15721491817","y":"2015_11_20"},"45342":{"x":"17791246879","y":"2015_11_20"},"45633":{"x":"13709252033","y":"2015_11_20"},"46280":{"x":"15204035408","y":"2015_11_20"},"46373":{"x":"15530905900","y":"2015_11_20"},"47611":{"x":"18662468018","y":"2015_11_21"},"49145":{"x":"18640732405","y":"2015_11_22"},"49868":{"x":"13601075969","y":"2015_11_23"},"51793":{"x":"15905463586","y":"2015_11_24"},"52037":{"x":"15232938307","y":"2015_11_24"},"52396":{"x":"13504330056","y":"2015_11_24"},"52568":{"x":"18992026280","y":"2015_11_24"},"52604":{"x":"15078368900","y":"2015_11_24"}}

for m in map:
    _cmd = "cat /data/log/dj.caissa.com.cn.log-"+map[m]['y']+" | grep 'windex.php' | grep "+map[m]['x']+" | grep -oE 'name=(.*?)&mail' |cut -d '=' -f 2|cut -d '&' -f 1"
    (status,output) = commands.getstatusoutput(_cmd)
    if('' != output):
        print map[m]['x']+'   '+output
#import os
#name=os.popen(_cmd).readlines()
#name = output
#name=output
#print name
#_str = name.strip('\n')
#print _str.decode('gbk')
#print 1111111111
#_str = '\xC0\xEE\xE7\xE4\xC1\xAB'
#print _str.decode('gbk')