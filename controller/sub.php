<?php
class sub extends spController
{
     public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }
    }
    function dashboard(){
        if($_SESSION['user']['type']==0){
            $this->jump(spUrl('sub', 'product')); // 跳转到首页
        }else{
            $this->jump(spUrl('sub', 'sitemanage')); // 跳转到首页
        }
    	
    }
    function logout(){
    	unset($_SESSION["user"]);
    	session_destroy();
    	$this->jump(spUrl('main', 'index')); // 跳转到首页 // 退出   
    }
    function setting(){
        $user = spClass("user");
        $project = spClass("project");
        $condition = array("owner" => $_SESSION['user']['id']);
        $conditions = array("id" => $_SESSION['user']['id']);
        $this->user = $user->find($conditions); 
        $records = $project->spLinker()->findAll($condition); 
        $this->projectCount=count($records);//工程总数
        $adCount=0;//广告总数
        $soldAd=0;//已出售广告
        $profits=0;//累计总收益
        foreach ($records as $project) { 
            $adCount=$adCount+count($project['detail']);
            foreach ($project['detail'] as  $ad) {
                if($ad['state']==1){
                    $soldAd=$soldAd+1;
                }
                $profits=$profits+$ad['profit'];
            }
        }
        $this->adCount=$adCount;
        $this->soldAd=$soldAd;
        $this->profits=$profits;

        $this->current="setting";//设置当前导航状态
        $this->display("user/setting.php"); // 设置
    }
    function admanage(){
        $project = spClass("project");
        $conditions = array("owner" => $_SESSION['user']['id']);
        $category = spClass("category");
        $this->categories=$category->findAll();

        $records = $project->spLinker()->findAll($conditions); 
        $this->projectCount=count($records);//工程总数
        $adCount=0;//广告总数
        $soldAd=0;//已出售广告
        $unsoldAd=0;//未出售广告
        $profits=0;//累计总收益
        $beVerified=0;
        foreach ($records as &$project) { 
            $adCount=$adCount+count($project['detail']);
            foreach ($project['detail'] as  &$ad) {
                if($ad[state]=="1"){
                    $trade=spClass("trade");
                    $condition = array("advertise" => $ad['id'],"state"=>0);
                    $result=$trade->find($condition);
                    $process=floor((time()-strtotime($result['startTime']))/(strtotime($result['endTime'])-strtotime($result['startTime']))*100);//计算广告出售进度
                    $ad['startTime']=$result['startTime'];
                    $ad['endTime']=$result['endTime'];
                }else{
                    $process=0;
                }
                
                $ad['process']=$process;

                if($ad['state']==1){
                    $soldAd=$soldAd+1;
                }
                if($ad['state']==0){
                    $unsoldAd=$unsoldAd+1;
                }
                if($ad['verify']==0){
                    $beVerified=$beVerified+1;
                }
                $profits=$profits+$ad['profit'];
            }
        }
        $this->projects=$records;
        $this->adCount=$adCount;
        $this->soldAd=$soldAd;
        $this->unsoldAd=$unsoldAd;
        $this->beVerified=$beVerified;
        $this->profits=$profits;

        $this->current="admanage";//设置当前导航状态
        $this->display("user/publisher/admanage.php"); // 广告管理
    }
    function inbox(){
        $message = spClass("message");
        $conditions=" receiver=".$_SESSION['user']['id'];
        $countMessage=$message->findAll($conditions," id desc ");

        $this->msgCount=count($countMessage);//总数

        $this->unread=0;//未读
        $this->read=0;//已读
        $this->notice=0;//系统通知
        $this->personal=0;//私人信息
        $this->broadcast=0;//系统公告
        foreach ($countMessage as  $value) {
            if($value['state']==0){
                $this->unread+=1;
            }
            if($value['state']==1){
                $this->read+=1;
            }
            if($value['type']==1){
                $this->notice+=1;
            }
            if($value['type']==2){
                $this->personal+=1;
            }
            if($value['type']==3){
                $this->broadcast+=1;
            }
        }
        $state=$this->spArgs('state');
        $type=$this->spArgs('type');
        if(isset($state)){
            if($state!=2){
                $conditions=$conditions." and state=".$state;
            }
            $this->state=$state;
        }else{
            $this->state=2;
        }
        if(isset($type)){
            if($type!=0){
               $conditions=$conditions." and type=".$type;
            }
            $this->type=$type;
        }else{
            $this->type=0;
        }

        $messages = $message->spLinker()->spPager($this->spArgs('page', 1), 8)->findAll($conditions," id desc ");
        $this->messages=$messages;

        $this->pager = $message->spPager()->getPager();

        $this->current="inbox";//设置当前导航状态
        $this->display("user/inbox.php"); // 广告管理
        
    }
    function sitemanage(){
        $project = spClass("project");
        $conditions = array("owner" => $_SESSION['user']['id']);
        $this->projects = $project->spLinker()->findAll($conditions);
        $category = spClass("category");
        $this->categories=$category->findAll();

        $this->projectCount=count($this->projects);//工程总数
        $this->maxProfit=0;//最高收益
        $this->minProfit=0;//最低收益
        $this->avgProfit=0;//平均收益
        $this->sumProfit=0;//累计总收益
        $this->adCount=0;
        if($this->projectCount>0){
            $this->minProfit=$this->projects[0]['detail'][0]['profit'];
            $this->maxProfit=$this->projects[0]['detail'][0]['profit'];
            $this->avgProfit=$this->projects[0]['detail'][0]['profit'];
        }
        
        foreach ($this->projects as $project) { 
           
            foreach ($project['detail'] as  $ad) {

                if($ad['profit']>$this->maxProfit){
                    $this->maxProfit=$ad['profit'];
                }
                if($ad['profit']<$this->minProfit){
                    $this->minProfit=$ad['profit'];
                }
                $this->sumProfit=$this->sumProfit+$ad['profit'];
                $this->adCount=$this->adCount+1;
            }
        }
        if($this->projectCount>0){
            $this->avgProfit=$this->sumProfit/$this->projectCount;
        }
        
        $this->current="sitemanage";//设置当前导航状态
        $this->display("user/publisher/sitemanage.php"); // 广告管理
    }
    function finance(){
        $finance = spClass("finance");
        $conditions = array("user_id" => $_SESSION['user']['id']);
        $adIncome=0;
        $adOutcome=0;
        $handIncome=0;
        $handOutcome=0;
        $sumIncome=0;
        $sumOutcome=0;
        $records = $finance->findAll($conditions); 
        foreach ($records as $record) { 
            if($record['type']=="00"){//广告收益
                $adIncome=$adIncome+$record['number'];
            }
            if($record['type']=="01"){//充值
                $handIncome=$handIncome+$record['number'];
            }
            if($record['type']=="10"){//广告支出
                $adOutcome=$adOutcome+$record['number'];
            }
            if($record['type']=="11"){//提现
                $handOutcome=$handOutcome+$record['number'];
            }
            if(substr($record['type'],0,1)=="0"){//收入
                $sumIncome=$sumIncome+$record['number'];
            }
             if(substr($record['type'],0,1)=="1"){//支出
                $sumOutcome=$sumOutcome+$record['number'];
            }
        }
        $this->adIncome=$adIncome;
        $this->adOutcome=$adOutcome;
        $this->handIncome=$handIncome;
        $this->handOutcome=$handOutcome;
        $this->sumIncome=$sumIncome;
        $this->sumOutcome=$sumOutcome;

        $this->records = $finance->spPager($this->spArgs('page', 1), 5)->findAll($conditions,'time DESC'); 
        $this->pager = $finance->spPager()->getPager();
        //dump($records);

        $this->current="finance";//设置当前导航状态
        $this->display("user/finance.php"); // 财务统计
    }
    
    function product(){
        $product = spClass("product");
        $conditions = array("owner" => $_SESSION['user']['id']);
        $this->products = $product->spLinker()->findAll($conditions);
         if($this->products){
             $this->productCount=count($this->products);//产品总数
         }
        else{
            $this->productCount=0;
        }
        $this->sumFee=0;//总推广费用
        $this->sumImpression=0;//总展示次数
        $this->sumClick=0;//总点击次数
        $this->impressPrice=0;//累计总收益
        $this->clickPrice=0;
        foreach ($this->products as $product) { 
           $this->sumFee=$this->sumFee+$product['fee'];
            $this->sumImpression=$this->sumImpression+$product['impression'];
            $this->sumClick=$this->sumClick+$product['click'];
        }
        $this->impressPrice=$this->sumFee/$this->sumImpression;
        $this->clickPrice=$this->sumFee/$this->sumClick;


        $this->current="product";//设置当前导航状态
        $this->display("user/advertiser/product.php"); // 用户面板   
    }

    function effect(){
        $trade = spClass("trade");
        $project = spClass("project");
        $conditions = array("buyer" => $_SESSION['user']['id'],"state"=>0);
        $trades = $trade->spLinker()->findAll($conditions,'id DESC');
        $this->tradeCount=count($trades);//交易总数
        $this->sumFee=0;//总推广费用
        $this->videoNum=0;//视频广告
        $this->textNum=0;//文字广告
        $this->picNum=0;//图片广告
        $this->expire=0;//即将到期
        foreach ($trades as &$trade) { 
            $condition = array("id" => $trade['advertise']['project']);
            $tempProject=$project->find($condition);
            $trade['project']=$tempProject;

            $this->sumFee+=$trade['price']*$trade['number'];
            if($trade['process']>=90){
                $this->expire+=1;
            }
            if($trade['advertise']['format']==0){
                $this->textNum+=1;
            }
             if($trade['advertise']['format']==1){
                $this->picNum+=1;
            }
             if($trade['advertise']['format']==2){
                $this->videoNum+=1;
            }
        }

        $this->trades=$trades;

        $this->current="effect";//设置当前导航状态
        $this->display("user/advertiser/effect.php"); // 广告管理
    }
   
}