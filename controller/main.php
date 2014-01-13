<?php

class main extends spController
{
	function index(){
        $type = spClass('type');
        $advertise=spClass('advertise');
        $trade=spClass('trade');
        $news=spClass('news');
        $this->types = $type->spLinker()->findAll();
        $this->currentCategory=1;

        //最新的广告位
        $this->advertises = $advertise->spLinker()->findAll("verify=1","id desc",null,"0,9");
        $conditions="verify=1 and state=0";

        //推荐的广告位
        $advertise->linker[0]['condition']='alexa>0';
        $this->hots =  $advertise->spLinker() -> findAll($conditions,null,null,"0,3");


        //最新的行业新闻三则
        $newsList = $news->findAll(null,"id desc",null,"0,3");
        foreach ($newsList as &$news) {
            if(strlen($news['content'])>40){
                $news['content']=mb_substr(strip_tags($news['content']), 0,40,"UTF-8");  //hp点
                $news['content'].="...";
            }    
        }
        $this->newsList=$newsList;


        //刚刚售出的广告位
        $trades =  $trade->spLinker()->findAll(null,'id DESC',null,"0,3");
        $solds=array();


        foreach ($trades as $trad) {
            if($trad['advertise']!=""){
                $soldCondition="id=".$trad['advertise']['id'];
                $ad=$advertise->spLinker()->find($soldCondition);
                $solds[]=$ad;
            }
            
        }

        $this->solds=$solds;
        $this->display("index.php"); // 首页
	}
    function replaceStr($str){
        $result=strip_tags($str);
        $result=str_replace('(',"",$result);
        $result=str_replace(')',"",$result);
        $result=str_replace('&quot;',"",$result);
        $result=str_replace('"',"",$result);
        return $result;
    }
    //条件筛选广告位
    function result(){
        $type = spClass('type');
        $advertise=spClass('advertise');
        spClass('advertise')->pk = 'ad.id';

        $keyword=$this->replaceStr(urldecode($this->spArgs("keyword")));
        $category=$this->replaceStr($this->spArgs("category"));
        $currentPage=$this->replaceStr($this->spArgs("page"));
        $currentAlexa=$this->replaceStr($this->spArgs("alexa"));
        $currentOrder=$this->replaceStr($this->spArgs("order"));
        $currentPrice=$this->replaceStr($this->spArgs("price"));
        $currentState=$this->replaceStr($this->spArgs("state"));

        if(trim($currentAlexa)!=""){
             $currentAlexa=explode(',', $currentAlexa);
        }
         if(trim($currentPrice)!=""){
             $currentPrice=explode(',', $currentPrice);
        }      
        if($keyword==''){
            $keyword="";
        }
        if($category==''){
            $category=1;
        }
        if($currentPage==""){
            $currentPage=1;
        }
        //dump($currentPrice);

        $conditions=" ad.verify=1";
        if($category!=1){
             $conditions =$conditions." and pro.category=".$advertise->escape($category);
        }
        if($currentAlexa!=""){
            $conditions =$conditions." and pro.alexa<=".$advertise->escape($currentAlexa[1])." and pro.alexa>=".$advertise->escape($currentAlexa[0]);
        }
        if($currentPrice!=""){
            $conditions =$conditions." and (ad.price*(1+ad.fee*0.01))<=".$advertise->escape($currentPrice[1]*100)." and (ad.price*(1+ad.fee*0.01))>=".$advertise->escape($currentPrice[0]*100);
        }
        if($currentState!=""){
            $conditions =$conditions." and ad.state=".$advertise->escape($currentState);
        }
        $this->keyword=strip_tags(trim($keyword));
        //dump($category);
        if(isset($keyword)&&$keyword!=""){
            $conditions = $conditions.' and (pro.name like '.$advertise->escape('%'.$this->keyword.'%');
            $conditions= $conditions." or pro.description like ".$advertise->escape('%'.$this->keyword.'%').')';
        }
        $this->currentCategory=strip_tags($category);
        //dump($conditions);
        $this->currentPage=strip_tags($currentPage);
        if($currentAlexa!=""){
            $this->currentAlexa=strip_tags($currentAlexa[0].",".$currentAlexa[1]);
        }
        if($currentState!=""){
            $this->currentState=strip_tags($currentState[0]);
        }
        if($currentPrice!=""){
            $this->currentPrice=strip_tags($currentPrice[0].",".$currentPrice[1]);
        }

        //增加排序查询
        $orderCondition=" order by id desc";
        if($currentOrder!=""){
            $this->currentOrder=strip_tags($currentOrder);
            if($currentOrder==1){//价格升序
                $orderCondition=" order by price asc,id desc";
            }else if($currentOrder==2){
                $orderCondition=" order by price desc,id desc";
            }
            
        }else{
            $this->currentOrder=0;
        }
        $conditions=$conditions.$orderCondition;


        $pageSize=12;
        $startIndex=($currentPage-1)*$pageSize;
        $sql="select ad.*,pro.name,pro.url,pro.logo,pro.alexa  from advertise ad,project pro where ad.project=pro.id and ".$conditions." limit ".$startIndex.",".$pageSize;
        $results=$advertise->findSql($sql);
        foreach ($results as &$ad) {
            $pro=array(
                'name' => $ad['name'],
                'url'=>$ad['url'],
                'logo'=>$ad['logo'],
                'alexa'=>$ad['alexa'],
             );
            $ad['base']=$pro;
        }
        $this->results=$results;

        $sql="select ad.*,pro.name,pro.url,pro.logo,pro.alexa  from advertise ad,project pro where ad.project=pro.id and ".$conditions;
        $results=$advertise->findSql($sql);
        $this->resultsCount=count($results);//广告位总数
        
        
        $sumPage=ceil($this->resultsCount/$pageSize);
        $maxPage=15;

        if($maxPage>=$sumPage){
            $maxPage=$sumPage;
        }
        $minPage=1;
        $allpages=array();
        if($sumPage>$maxPage&&$currentPage>($maxPage/2)){
            $minPage=$minPage+$currentPage-1;
            $maxPage=$maxPage+$currentPage-1;
            if($maxPage>$sumPage){
                $maxPage=$sumPage;
                $minPage=$maxPage-15+1;
            }
        }
        for ($i=$minPage; $i<=$maxPage ; $i++) { 
            $allpages[]=$i;
        }
        //dump($allpages);
        //dump($maxPage);
        $pager = array(
            'first_page' => 1, 
            'current_page'=>$currentPage,
            'prev_page'=>$currentPage-1,
            'all_pages'=> $allpages,
            'next_page'=>$currentPage+1,
            'last_page' => $sumPage, 
            );
        $this->pager = $pager;
        $this->display("result.php"); // 首页
    }
	function login(){
		if(!isset($_SESSION["user"])){
            $this->display("signin.php"); // 登录
        }
        else{
        	$this->jump(spUrl('sub', 'dashboard'));   
        }
	}
    function register(){
            $this->display("signup.php"); // 注册   
    }
    function email() {
                // $mail = spClass('spEmail');
                // $email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的email
                // $emailx=$this->encryptEmail($email);
                // $address="http://".$_SERVER['SERVER_NAME'].spUrl('cuser', 'verify')."?ticket=".$emailx;
                // $addition="<p>此邮件为系统自动发送的邮件，请勿直接回复</p>";
                // $mailsubject = "广告市场注册验证邮箱";//邮件主题
                // $mailbody = "<h4> 请点击下面验证地址进行验证：</h4>"."<p> <a href=".$address.">".$address."<a></p>".$addition;//邮件内容
                // $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
                // $result=$mail->sendmail($email, $mailsubject, $mailbody, $mailtype);
                // echo $result;
                //import('tool.php');
                $tool = spClass('tool');
                $email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的email
                $emailx=$this->encryptEmail($email);
                $address="http://".$_SERVER['SERVER_NAME'].spUrl('cuser', 'verify')."?ticket=".$emailx;
                $addition="<p>此邮件为系统自动发送的注册激活邮件，请勿直接回复</p>";
                $mailsubject = "广告市场注册验证邮箱";//邮件主题
                $mailbody = "<h4> 请点击下面验证地址进行验证：</h4>"."<p> <a href=".$address.">".$address."<a></p>".$addition;//邮件内容
                $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
                $result=$tool->sendEmail($email, $mailsubject, $mailbody);
                echo $result;
        }
    //加密加密字符串中的email
    function encryptEmail($orginalEmail) {
        $date = date("Ymd H:i:s",time());
        $orginalEmail = $orginalEmail."&".$date;
        $encrypttedEmail = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, "6461772803150152", $orginalEmail, MCRYPT_MODE_CBC,"8105547186756005");
        //$encrypttedEmail = $orginalEmail;
        $encrypttedEmail = base64_encode($encrypttedEmail);
        $encrypttedEmail = urlencode($encrypttedEmail);
        return $encrypttedEmail;
    }

    function detail(){
        $type = spClass('type');
        $project=spClass('project');
        $conditions =" id=".$this->spArgs("project");
        
        

        $this->currentCategory=1;
        $this->types = $type->spLinker()->findAll();
        $this->project = $project->spLinker()->find($conditions);
        $user=spClass('user');
        $conditions =" id=".$this->project['owner'];
        $result=$user->find($conditions);
        $this->fee=$result['fee'];
        $this->display("detail.php"); // 注册 

    }
    function news(){
        $news = spClass('news');

        $conditions =" id=".$news->escape(strip_tags($this->spArgs("id")));
        $result = $news->spLinker()->find($conditions);

        $this->news=$result;
        $this->currentCategory=1;
        $this->display("news.php"); // 注册 

    }
    function newslist(){
        $news = spClass('news');
        $results=$news->spLinker()->spPager($this->spArgs('page', 1), 15)->findAll(null,"id desc");
        $this->pager = $news->spPager()->getPager();
        $this->records=$results;
        $this->currentCategory=1;
        $this->display("newsList.php"); // 注册 
    }
    function buy(){
        $advertise=spClass('advertise');
        $id=$this->spArgs("id");
        if(!isset($id)){
             $id=0;
        }
        $conditions=" id=".$id;
        $ad=$advertise->spLinker()->find($conditions);
        $this->ad=$ad;

        $user=spClass('user');
        $userconditions=" id=".$ad['base']['owner'];
        $res=$user->find($userconditions);
        $this->joinDate=$res['time'];

        //查询该广告位的最近三个月的真实浏览次数/月
        $report=spClass('report');
        $startTime = time();  // 当前时间戳
        $endTime =$startTime - (90 * 24 * 60 * 60);  // N天后的时间戳 
        $showtime=date("Y-m-d H:i:s",$endTime);
        $reportConditions=" (advertise=".$id." and impression!=0) and date>'".$showtime."'";
        $reports=$report->findSql("select sum(impression) as impression from report where ".$reportConditions);
        $repCount=0;
        if($reports){
            $repCount=$reports[0]['impression'];
            $this->adCount=floor($repCount/3);
        }else{
            $this->adCount=0;
        }
        $product=spClass('product');
        if(isset($_SESSION['user'])){
            $productConditions =" owner=". $_SESSION['user']['id'];
            $this->products=$product->findAll($productConditions);
            $this->display("buy.php"); // 注册 
        }else{
            $this->jump(spUrl('main', 'login'));
        }
        
    }
    function booking(){
        $advertise=spClass('advertise');
        $id=$this->spArgs("id");
        if(!isset($id)){
             $id=0;
        }
        $conditions=" id=".$id;
        $ad=$advertise->spLinker()->find($conditions);
        $this->ad=$ad;

        $user=spClass('user');
        $userconditions=" id=".$ad['base']['owner'];
        $res=$user->find($userconditions);
        $this->joinDate=$res['time'];

        //查询该广告位的最近三个月的真实浏览次数/月
        $report=spClass('report');
        $startTime = time();  // 当前时间戳
        $endTime =$startTime - (90 * 24 * 60 * 60);  // N天后的时间戳 
        $showtime=date("Y-m-d H:i:s",$endTime);
        $reportConditions=" (advertise=".$id." and impression!=0) and date>'".$showtime."'";
        $reports=$report->findSql("select sum(impression) as impression from report where ".$reportConditions);
        $repCount=0;
        if($reports){
            $repCount=$reports[0]['impression'];
            $this->adCount=floor($repCount/3);
        }else{
            $this->adCount=0;
        }
        $product=spClass('product');
        if(isset($_SESSION['user'])){
            $productConditions =" owner=". $_SESSION['user']['id'];
            $this->products=$product->findAll($productConditions);
            $this->display("booking.php"); // 注册 
        }else{
            $this->jump(spUrl('main', 'login'));
        }
        
    }
    function search(){
        $this->display("search.php"); // 找回密码 
    }
    function help(){
        $this->display("help.php"); // 注册 
    }
    function about(){
        $this->display("about.php"); // 注册 
    }
    function privacy(){
        $this->display("privacy.php"); // 注册 
    }
    function partner(){
        $this->display("partner.php"); // 注册 
    }
    function question(){
        $this->display("question.php"); // 注册 
    }
    function forget(){
        $this->display("forget.php"); // 找回密码 
    }
     function go(){
        $url=strip_tags($this->spArgs("url"));
        //dump($url);
        $this->jump($url);
    }
    function test(){
        $this->display("test.php"); // 找回密码 
    }
}