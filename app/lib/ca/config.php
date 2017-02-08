<?php

define('DEFAULT_MYSQL_HOST', '192.168.10.101');
define('DEFAULT_MYSQL_PORT', '3306');
define('DEFAULT_MYSQL_USER', 'public');
define('DEFAULT_MYSQL_PASS', 'tesv#67F');


$environments = array(
	// gpa配置
	'cernet.114.edu.cn' => array('*cernet.114.edu.cn'),
	'cernet.gpa.edu.cn' => array('*cernet.gpa.edu.cn'),
	'cernet.gp.test' => array('*cernet.gp.test'),
	'njnu.gp.test' => array('*njnu.gp.test'),
	'jzhj.gp.test' => array('*jzhj.gp.test'),
	'jzhj.gpa.edu.cn' => array('*jzhj.gpa.edu.cn'),
	'njnu.gpa.edu.cn' => array('*njnu.gpa.edu.cn'),
	'xznu.gpa.edu.cn' => array('*xznu.gpa.edu.cn'),
	'jsnu.gpa.edu.cn' => array('*jsnu.gpa.edu.cn'),
	'cczu.gpa.edu.cn' => array('*cczu.gpa.edu.cn'),
	'njue.gpa.edu.cn' => array('*njue.gpa.edu.cn'),
	'njutcm.gpa.edu.cn' => array('*njutcm.gpa.edu.cn'),
	'njcit.gpa.edu.cn' => array('*njcit.gpa.edu.cn'),
	'wjtvu.gpa.edu.cn' => array('*wjtvu.gpa.edu.cn'),
	'whxy.gpa.edu.cn' => array('*whxy.gpa.edu.cn'),
	'tczz.gpa.edu.cn' => array('*tczz.gpa.edu.cn'),
	'wxic.gpa.edu.cn' => array('*wxic.gpa.edu.cn'),
	'njcc.gpa.edu.cn' => array('*njcc.gpa.edu.cn'),
	'ouc.gpa.edu.cn' => array('*ouc.gpa.edu.cn'),
	'wxgyxy.gpa.edu.cn' => array('*wxgyxy.gpa.edu.cn'),
	'ntu.gpa.edu.cn' => array('*ntu.gpa.edu.cn'),
	'cug.gpa.edu.cn' => array('*cug.gpa.edu.cn'),
	'dlmu.gpa.edu.cn' => array('*dlmu.gpa.edu.cn'),
	'jsit.gpa.edu.cn' => array('*jsit.gpa.edu.cn'),
	'hbut.gpa.edu.cn' => array('*hbut.gpa.edu.cn'),
	'nfpc.gpa.edu.cn' => array('*nfpc.gpa.edu.cn'),
	'rdedu.gpa.edu.cn' => array('*rdedu.gpa.edu.cn'),
	'uestc.gpa.edu.cn' => array('*uestc.gpa.edu.cn'),
	'sgtc.gpa.edu.cn' => array('*sgtc.gpa.edu.cn'),
	'yzu.gpa.edu.cn' => array('*yzu.gpa.edu.cn'),
	'chzu.gpa.edu.cn' => array('*chzu.gpa.edu.cn'),
	'xzcit.gpa.edu.cn' => array('*xzcit.gpa.edu.cn'),
	'wxit.gpa.edu.cn' => array('*wxit.gpa.edu.cn'),
	'czie.gpa.edu.cn' => array('*czie.gpa.edu.cn'),
	'cdsu.gpa.edu.cn' => array('*cdsu.gpa.edu.cn'),
	'scfai.gpa.edu.cn' => array('*scfai.gpa.edu.cn'),
	'jssvc.gpa.edu.cn' => array('*jssvc.gpa.edu.cn'),
	'szai.gpa.edu.cn' => array('*szai.gpa.edu.cn'),
	'hue.gpa.edu.cn' => array('*hue.gpa.edu.cn'),
	'hhit.gpa.edu.cn' => array('*hhit.gpa.edu.cn'),
	'lygtc.gpa.edu.cn' => array('*lygtc.gpa.edu.cn'),
	'jsafc.gpa.edu.cn' => array('*jsafc.gpa.edu.cn'),
	'suda.gpa.edu.cn' => array('*suda.gpa.edu.cn'),
	'njfu.gpa.edu.cn' => array('*njfu.gpa.edu.cn'),
	'ccit.gpa.edu.cn' => array('*ccit.gpa.edu.cn'),
	'seu.gpa.edu.cn' => array('*seu.gpa.edu.cn'),
	'hcit.gpa.edu.cn' => array('*hcit.gpa.edu.cn'),
	'jsfsc.gpa.edu.cn' => array('*jsfsc.gpa.edu.cn'),
	'ntsc.gpa.edu.cn' => array('*ntsc.gpa.edu.cn'),
	'nju.gpa.edu.cn' => array('*nju.gpa.edu.cn'),
	'ccnu.gpa.edu.cn' => array('*ccnu.gpa.edu.cn'),
	'ntac.gpa.edu.cn' => array('*ntac.gpa.edu.cn'),
		
	'dlut.gpa.edu.cn' => array('*dlut.gpa.edu.cn'),
	'hyit.gpa.edu.cn' => array('*hyit.gpa.edu.cn'),
	'wxcsxy.gpa.edu.cn' => array('*wxcsxy.gpa.edu.cn'),
	'dgut.gpa.edu.cn' => array('*dgut.gpa.edu.cn'),
	'ougd.gpa.edu.cn' => array('*ougd.gpa.edu.cn'),
	'gtcfla.gpa.edu.cn' => array('*gtcfla.gpa.edu.cn'),
	'swust.gpa.edu.cn' => array('*swust.gpa.edu.cn'),
	'tjjw.gp.test' => array('*tjjw.gp.test'),

	// 天津教委配置
	'tust.tjjw.edu.cn'=> array('*tust.tjjw.edu.cn'),
	'tust.gp.tust.edu.cn'=> array('*tust.gp.tust.edu.cn'),

	// 云南中医学院
	'ms.ynutcm.edu.cn' => array('*ms.ynutcm.edu.cn'),
	// 福州大学
	'fzu.gpa.edu.cn' => array('*fzu.gpa.edu.cn'),
	//西安欧亚学院
	'ms.eurasia.edu' => array('*ms.eurasia.edu'),
    //温州肯恩大学
	'wku.gpa.edu.cn' => array('*wku.gpa.edu.cn')
);

$customer_alias = array(
	'cernet.114.edu.cn' => 'cernet',
	'cernet.gpa.edu.cn' => 'cernet',
	'cernet.gp.test' => 'cernet',
	'njnu.gp.test' => 'njnu',
	'jzhj.gp.test' => 'jzhj',
	'jzhj.gpa.edu.cn' => 'jzhj',
	'njnu.gpa.edu.cn' => 'njnu',
	'xznu.gpa.edu.cn' => 'xznu',
	'jsnu.gpa.edu.cn' => 'jsnu',
	'cczu.gpa.edu.cn' => 'cczu',
	'njue.gpa.edu.cn' => 'njue',
	'njutcm.gpa.edu.cn' => 'njutcm',
	'njcit.gpa.edu.cn' => 'njcit',
	'wjtvu.gpa.edu.cn' => 'wjtvu',
	'whxy.gpa.edu.cn' => 'whxy',
	'tczz.gpa.edu.cn' => 'tczz',
	'wxic.gpa.edu.cn' => 'wxic',
	'njcc.gpa.edu.cn' => 'njcc',
	'ouc.gpa.edu.cn' => 'ouc',
	'wxgyxy.gpa.edu.cn' => 'wxgyxy',
	'ntu.gpa.edu.cn' => 'ntu',
	'cug.gpa.edu.cn' => 'cug',
	'dlmu.gpa.edu.cn' => 'dlmu',
	'jsit.gpa.edu.cn' => 'jsit',
	'hbut.gpa.edu.cn' => 'hbut',
	'nfpc.gpa.edu.cn' => 'nfpc',
	'rdedu.gpa.edu.cn' => 'rdedu',
	'uestc.gpa.edu.cn' => 'uestc',
	'sgtc.gpa.edu.cn' => 'sgtc',
	'yzu.gpa.edu.cn' => 'yzu',
	'chzu.gpa.edu.cn' => 'chzu',
	'xzcit.gpa.edu.cn' => 'xzcit',
	'wxit.gpa.edu.cn' => 'wxit',
	'tust.tjjw.edu.cn' => 'tust',
	'tust.gp.tust.edu.cn' => 'tust',
	'czie.gpa.edu.cn' => 'czie',
	'cdsu.gpa.edu.cn' => 'cdsu',
	'scfai.gpa.edu.cn' => 'scfai',
	'jssvc.gpa.edu.cn' => 'jssvc',
	'szai.gpa.edu.cn' => 'szai',
	'hue.gpa.edu.cn' => 'hue',
	'hhit.gpa.edu.cn' => 'hhit',
	'lygtc.gpa.edu.cn' => 'lygtc',
	'jsafc.gpa.edu.cn' => 'jsafc',
	'suda.gpa.edu.cn' => 'suda',
	'njfu.gpa.edu.cn' => 'njfu',
	'ccit.gpa.edu.cn' => 'ccit',
	'seu.gpa.edu.cn' => 'seu',
	'hcit.gpa.edu.cn' => 'hcit',
	'jsfsc.gpa.edu.cn' => 'jsfsc',
	'ntsc.gpa.edu.cn' => 'ntsc',
	'ntac.gpa.edu.cn' => 'ntac',
	'hyit.gpa.edu.cn' => 'hyit',
	'nju.gpa.edu.cn' => 'nju',
	'ccnu.gpa.edu.cn' => 'ccnu',
	'wxcsxy.gpa.edu.cn' => 'wxcsxy',
	'dlut.gpa.edu.cn' => 'dlut',
	'dgut.gpa.edu.cn' => 'dgut',
	'ougd.gpa.edu.cn' => 'ougd',
	'gtcfla.gpa.edu.cn' => 'gtcfla',
	'ms.ynutcm.edu.cn' => 'ynutcm',
	'fzu.gpa.edu.cn' => 'fzu',
	'ms.eurasia.edu' => 'eurasia',
    'wku.gpa.edu.cn' => 'wku',
    'tjjw.gp.test' => 'tjjw',
    'swust.gpa.edu.cn' => 'swust'
);

$customer_name = array(
	'cernet.114.edu.cn' => '赛尔网络',
	'cernet.gpa.edu.cn' => '赛尔网络',
	'cernet.gp.test' => '赛尔网络',
	'njnu.gp.test' => '南京师范',
	'jzhj.gp.test' => '金智华教',
	'jzhj.gpa.edu.cn' => '金智华教',
	'njnu.gpa.edu.cn' => '南京师范',
	'xznu.gpa.edu.cn' => '江苏师范',
	'jsnu.gpa.edu.cn' => '江苏师范',
	'cczu.gpa.edu.cn' => '常州师范',
	'njue.gpa.edu.cn' => '南京财经大学',
	'njutcm.gpa.edu.cn' => '南京中医药大学',
	'njcit.gpa.edu.cn' => '南京信息职业技术学院',
	'wjtvu.gpa.edu.cn' => '江苏广播电视大学武进学院',
	'whxy.gpa.edu.cn' => '中南财经政法大学武汉学院',
	'tczz.gpa.edu.cn' => '江苏省太仓中等专业学校',
	'wxic.gpa.edu.cn' => '无锡商业职业技术学院',
	'njcc.gpa.edu.cn' => '南京化工职业技术学院',
	'ouc.gpa.edu.cn' => '中国海洋大学',
	'wxgyxy.gpa.edu.cn' => '无锡工艺职业技术学院',
	'ntu.gpa.edu.cn' => '南通大学',
	'cug.gpa.edu.cn' => '中国地质大学',
	'dlmu.gpa.edu.cn' => '大连海事大学',
	'jsit.gpa.edu.cn' => '江苏信息职业技术学院',
	'hbut.gpa.edu.cn' => '湖北工业大学',
	'nfpc.gpa.edu.cn' => '南京森林警察学院',
	'rdedu.gpa.edu.cn' => '江苏如东县教育局',
	'uestc.gpa.edu.cn' => '四川电子科技大学',
	'sgtc.gpa.edu.cn' => '山东国网技术学院',
	'yzu.gpa.edu.cn' => '扬州大学',
	'chzu.gpa.edu.cn' => '滁州学院',
	'xzcit.gpa.edu.cn' => '徐州工业职业技术学院',
	'wxit.gpa.edu.cn' => '无锡职业技术学院',
	'czie.gpa.edu.cn' => '常州工程职业技术学院',
	'cdsu.gpa.edu.cn' => '成都体育学院',
	'scfai.gpa.edu.cn' => '四川美术学院',
	'jssvc.gpa.edu.cn' => '江苏职业大学',
	'szai.gpa.edu.cn' => '苏州农业职业技术学院',
	'hue.gpa.edu.cn' => '湖北第二师范学院',
	'hhit.gpa.edu.cn' => '淮海工学院',
	'lygtc.gpa.edu.cn' => '连云港职业技术学院',
	'jsafc.gpa.edu.cn' => '江苏农林职业技术学院',
	'suda.gpa.edu.cn' => '苏州大学',
	'njfu.gpa.edu.cn' => '南京林业大学',
	'ccit.gpa.edu.cn' => '常州信息职业技术学院',
	'seu.gpa.edu.cn' => '东南大学',
	'hcit.gpa.edu.cn' => '淮安信息职业技术学院',
	'jsfsc.gpa.edu.cn' => '江苏食品药品职业技术学院',
	'ntsc.gpa.edu.cn' => '南通航运职业技术学院',
	'ntac.gpa.edu.cn' => '南通科技职业技术学院',
	'nju.gpa.edu.cn' => '南京大学',
	'ccnu.gpa.edu.cn' => '华中师范大学',
	'dgut.gpa.edu.cn' => '东莞理工学院',
	'ougd.gpa.edu.cn' => '广东开放大学',
	'gtcfla.gpa.edu.cn' => '广东省外语艺术职业学院',

	'dlut.gpa.edu.cn' => '大连理工大学',
	'hyit.gpa.edu.cn' => '淮阴工学院',
	'wxcsxy.gpa.edu.cn' => '无锡城市职业技术学院',	
	'tust.tjjw.edu.cn' => '天津科技大学',
	'tust.gp.tust.edu.cn' => '天津科技大学',
	'ms.ynutcm.edu.cn' => '云南中医学院',
	'fzu.gpa.edu.cn' => '福州大学',
    'ms.eurasia.edu' => '西安欧亚学院',
	'wku.gpa.edu.cn' => '温州肯恩大学',
	'tjjw.gp.test' => 'tjjw测试',
	'swust.gpa.edu.cn' => '西南科技大学'
);


$customer_securekey = array(
	'cernet.114.edu.cn'   => 'Wz&22@^GsmV!T@7MkZy`sKt?Q/&oEl&EuZnj',
	'cernet.gpa.edu.cn'   => 'Wz&22@^GsmV!T@7MkZy`sKt?Q/&oEl&EuZnj',
	'cernet.gp.test'      => 'F~e4,r<&UMe3klU/<*/9fk=Rjil_-%5J-MBj',
	'njnu.gp.test'        => 'fF^nhT.9X3m1y$+tV.^#A*Yc?`dRP;Y>Kov<',
	'jzhj.gp.test'        => '0si7LM_drNwifbpI)V/S`8zFytJ`~y9DI9)i',
	'jzhj.gpa.edu.cn'     => '0si7LM_drNwifbpI)V/S`8zFytJ`~y9DI9)i',
	'njnu.gpa.edu.cn'     => 'fF^nhT.9X3m1y$+tV.^#A*Yc?`dRP;Y>Kov<',
	'xznu.gpa.edu.cn'     => 'kj6vG7KtDyqqNaPuFzpfuzQYlRSXTfs9zhBn',
	'jsnu.gpa.edu.cn'     => 'YlRyqqNauzQzhBnPzpSXTfs9kj6vG7uFKtDf',
	'cczu.gpa.edu.cn'     => 'uPitY1jESuSQNFq1XeMdK8qcY42KaY7KSpRa',
	'njue.gpa.edu.cn'     => 'aY7KtY18qcYjEuPiFq1XeMdKRa42KSuSQNSp',
	'njutcm.gpa.edu.cn'   => 'Ra42Kp7KtY18qaYcYjEuPiFq1SuSQNSXeMdK',
	'njcit.gpa.edu.cn'    => 'YMdKRa42KuSQNSXeKtY18qp7cYjEuPiFq1Sa',
	'wjtvu.gpa.edu.cn'    => 'pYjYMdKRa42KuS7ciFq8QNEuPq1SaSXeKtY1',
	'whxy.gpa.edu.cn'     => 'KtpMdciFq8Ra42YjYKuS71QNEuPq1YSaSXeK',
	'tczz.gpa.edu.cn'     => 'q8RiFtpMEuSXeKa42YjPq1YSaYKuS71QNKdc',
	'wxic.gpa.edu.cn'     => 'jPq1YSaYSXKQKKa41uScNRiFtuMEd78e2Ypq',
	'njcc.gpa.edu.cn'     => 'aYSX8e2YpKEjPq1YS1uSKQd7qa4KcNRiFtuM',
	'ouc.gpa.edu.cn'      => 'FFq8lU/ciQN-MB~e4e3k&UMzpSXTfsj9kj6-',
	'wxgyxy.gpa.edu.cn'   => 'fQzhBnPzpI8qPq1YSaSXm1uFzFytJNEuSifb',
	'ntu.gpa.edu.cn'      => 'G7Ktya42KFq1XefypaSfuuuFKtD17MuFKtDD',
	'cug.gpa.edu.cn'      => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf',
	'dlmu.gpa.edu.cn'     => 'paKtSXaYcYFzplFsTfK9ztY18fuzQYqefu4R',
	'jsit.gpa.edu.cn'     => 'FqplK9z1XecY42FzssTfQNFtY1XTMdK8qf9k',
	'hbut.gpa.edu.cn'     => '8qcI)V/FuXTifzFfiFq1S`8XeYjEs9kj6bpM',
	'nfpc.gpa.edu.cn'     => 'Lkso[a#512kisp)-4kdoeDqlLja09&1?Mkae',
	'rdedu.gpa.edu.cn'    => '>0WJu#HpD2>>02FQdP8_Thi*!L^9d8zY6N:s',
	'uestc.gpa.edu.cn'    => '#aw96RDeB_%TdVzi_w~_+%~p+s}G9@hdiF7o',
	'sgtc.gpa.edu.cn'     => 'QrhS7~2uSeiMjFv3ckO{jtG0^qeB$7e2EaO+',
	'yzu.gpa.edu.cn'      => 'lcMfvRl>8uWUQb+?Yor&MV}>{Tfx>85~zn3a',
	'chzu.gpa.edu.cn'     => 'Wz&22@^GsmV!T@7MkZy`sKt?Q/&oEl&EuZnj',
	'xzcit.gpa.edu.cn' 	  => 'paKtSXaYcYFzplFsTfK9ztY18fuzQYqefu4R',
	'wxit.gpa.edu.cn' 	  => '8qcI)V/FuXTifzFfiFq1S`8XeYjEs9kj6bpM',
	'czie.gpa.edu.cn' 	  => 'KtpMdciFq8Ra42YjYKuS71QNEuPq1YSaSXeK',
	'cdsu.gpa.edu.cn' 	  => 'FFq8lU/ciQN-MB~e4e3k&UMzpSXTfsj9kj6-',
	'scfai.gpa.edu.cn' 	  => 'FFq8lU/ciQN-MB~e4e3k&UMzpSXTfsj9kj6-',
	'jssvc.gpa.edu.cn'    => 'G7Ktya42KFq1XefypaSfuuuFKtD17MuFKtDD',
	'szai.gpa.edu.cn'     => 'G7Ktya42KFq1XefypaSfuuuFKtD17MuFKtDD',
	'hue.gpa.edu.cn'      => 'fQzhBnPzpI8qPq1YSaSXm1uFzFytJNEuSifb',
	'hhit.gpa.edu.cn'     => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf',
	'lygtc.gpa.edu.cn'    => 'YlRyqqNauzQzhBnPzpSXTfs9kj6vG7uFKtDf',
	'jsafc.gpa.edu.cn'    => 'KtpMdciFq8Ra42YjYKuS71QNEuPq1YSaSXeK',
	'suda.gpa.edu.cn'    => 'FqplK9z1XecY42FzssTfQNFtY1XTMdK8qf9k',
	'njfu.gpa.edu.cn'    => 'fQzhBnPzpI8qPq1YSaSXm1uFzFytJNEuSifb',
	'ccit.gpa.edu.cn'    => 'uPitY1jESuSQNFq1XeMdK8qcY42KaY7KSpRa',
	'seu.gpa.edu.cn'    => 'uPitY1jESuSQNFq1XeMdK8qcY42KaY7KSpRa',
	'hcit.gpa.edu.cn'    => 'fQzhBnPzpI8qPq1YSaSXm1uFzFytJNEuSifb',
	'jsfsc.gpa.edu.cn'    => 'Wz&22@^GsmV!T@7MkZy`sKt?Q/&oEl&EuZnj',

	'ntsc.gpa.edu.cn'    => 'Lkso[a#512kisp)-4kdoeDqlLja09&1?Mkae',
	'ntac.gpa.edu.cn'    => 'aYSX8e2YpKEjPq1YS1uSKQd7qa4KcNRiFtuM',
	'nju.gpa.edu.cn'    => 'KtpMdciFq8Ra42YjYKuS71QNEuPq1YSaSXeK',
	'dgut.gpa.edu.cn'    => 'QrhS7~2uSeiMjFv3ckO{jtG0^qeB$7e2EaO+',
	'ougd.gpa.edu.cn'    => 'uPitY1jESuSQNFq1XeMdK8qcY42KaY7KSpRa',
	'gtcfla.gpa.edu.cn'    => 'uPitY1jESuSQNFq1XeMdK8qcY42KaY7KSpRa',
		
	'dlut.gpa.edu.cn'    => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf',
	'hyit.gpa.edu.cn'    => '8qcI)V/FuXTifzFfiFq1S`8XeYjEs9kj6bpM',	
	'ccnu.gpa.edu.cn'    => 'fQzhBnPzpI8qPq1YSaSXm1uFzFytJNEuSifb',
	'wxcsxy.gpa.edu.cn'    => 'YlRyqqNauzQzhBnPzpSXTfs9kj6vG7uFKtDf',		
	'tust.tjjw.edu.cn'    => 'lcMfvRl>8uWUQb+?Yor&MV}>{Tfx>85~zn3a',
	'tust.gp.tust.edu.cn' => '0kL1859$kaP!498394j2*kopab)*378MAlq3',
	'ms.ynutcm.edu.cn' => 'lcMfvRl>8uWUQb+?Yor&MV}>{Tfx>85~zn3a',
	'fzu.gpa.edu.cn' => 'lcMfvRl>8uWUQb+?Yor&MV}>{Tfx>85~zn3a',
    'ms.eurasia.edu' => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf',
	'wku.gpa.edu.cn' => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf',
	'tjjw.gp.test' => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf',
	'swust.gpa.edu.cn' => 'FKtDXefu42KD1DuFKuS7yGFua7M1ytqpaKtf'
);
