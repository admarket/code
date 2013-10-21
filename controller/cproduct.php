<?php
class cproduct extends spController
{
     public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }
    }
	function addProduct(){
		$filename=$_FILES['show']['name'];
        $tempName=explode('.', $filename);
        $ext=end($tempName);
		$newrow = array(
                        'name' => $this->spArgs('productName'),
                        'url' => $this->spArgs('productUrl'),
                        'owner'=> $_SESSION['user']['id'],
                        'shown'=>$ext,
                );
        $product = spClass("product");
        $result=$product->create($newrow);
        $id=$result;
        if($result){
                $arg = array(
                APP_PATH.'/img/show/',
                $result
                );
            $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
            $result=$upFlie->upload_file($_FILES['show']);
            if($result){
                $conditions = array("id"=>$id); // 查找email是$email的记录
                $newrow = array(
                        'shown' => $id.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
                );
                $product->update($conditions, $newrow); // 更新记录
             echo 1;
            }else {
             echo  "操作失败：".$msg;
            } 
        }   
	}
	function removeProduct(){//添加广告项目
            $product = spClass("product");
            $conditions = array(
                    'id' => $this->spArgs('productID'),
            );

             $result=$product->delete($conditions);
                if($result){
                        echo 1;
                }  else{
                        echo 0;
                }      
    }
	function updateProduct(){
		$product = spClass("product");
            $conditions = array("id"=>$this->spArgs('pk')); // 查找id是2的记录
            $argName=$this->spArgs('name');
            switch ($argName)
            {
            case "productName":
              $newrow = array(
                    'name' => $this->spArgs('value'),
                    );
              break;
            case "productUrl":
               $newrow = array(
                     'url' => $this->spArgs('value'),
                    );
              break;
           
            default:
              echo 0;
            }
            $result=$product->update($conditions,$newrow);
            if($result){
                    echo 1;
            }  else{
                    echo 0;
            }
	}
	function updateShown(){
		$filename=$_FILES['shown']['name'];
        $tempName=explode('.', $filename);
        $ext=end($tempName);
        $arg = array(
        APP_PATH.'/img/show/',
        $this->spArgs('id')
        );
        $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
        $result=$upFlie->upload_file($_FILES['shown']);
        $msg=$upFlie->errmsg;
        if($result){
            $product = spClass("product");
            $id=$this->spArgs('id'); 
            $conditions = array("id"=>$id); // 查找email是$email的记录
            $newrow = array(
                    'shown' => $id.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
            );
            $product->update($conditions, $newrow); // 更新记录
         echo "1";
        }else {
         echo "操作失败：".$msg;
        }
	}
	function getJsonData(){
		$product = spClass("product");
		$conditions = array("owner" => $_SESSION['user']['id']);
		$records = $product->findAll($conditions); 
		echo json_encode($records);
	}
    function getJsonProduct(){
        $product = spClass("product");
        $conditions = array("id" => $this->spArgs('id'));
        $records = $product->find($conditions); 
        echo json_encode($records);
    }
    //上传头像
    function uploadAdImage(){
        $filename=$_FILES['file']['name'];
        $productID=$this->spArgs('id');
        $endName=explode('.', $filename);
        $ext=end($endName);
        $firstName=$productID;
        $product = spClass("product");
        $conditions = array("id"=>$productID); // 查找email是$email的记录
        $result=$product->find($conditions);
        $pos=strpos($result['image'],'a'); 
        if($pos){
             $firstName=$firstName.'b';
        }          
        else{
            $firstName=$firstName.'a';
        }

        $arg = array(
        APP_PATH.'/img/adcontent/image',
        $firstName
        );
        $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
        $result=$upFlie->upload_file($_FILES['file']);
        $msg=$upFlie->errmsg;
            if($result){
                $product = spClass("product");
                $conditions = array("id"=>$productID); // 查找email是$email的记录
                $newrow = array(
                        'image' => $firstName.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
                );
                $product->update($conditions, $newrow); // 更新记录
             echo $firstName.".".$ext;
            }else {
             echo "操作失败：".$msg;
            }
        
    }
    function uploadAdVideo(){
        $filename=$_FILES['file']['name'];
        $productID=$this->spArgs('id');
        $endName=explode('.', $filename);
        $ext=end($endName);
        $firstName=$productID;
        $product = spClass("product");
        $conditions = array("id"=>$productID); // 查找email是$email的记录
        $result=$product->find($conditions);
        $pos=strpos($result['video'],'a'); 
        if($pos){
             $firstName=$firstName.'b';
        }          
        else{
            $firstName=$firstName.'a';
        }

        $arg = array(
        APP_PATH.'/img/adcontent/video',
        $firstName
        );
        $random=rand();
        $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
        $result=$upFlie->upload_file($_FILES['file']);
        $msg=$upFlie->errmsg;
            if($result){
                $product = spClass("product");
                $conditions = array("id"=>$productID); // 查找email是$email的记录
                $newrow = array(
                        'video' => $firstName.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
                );
                $product->update($conditions, $newrow); // 更新记录
             echo $firstName.".".$ext;
            }else {
             echo "0".$msg."123";
            }
        
    }
    function upDateAdTxt(){
        $productID=$this->spArgs('id');
        $txt=$this->spArgs('txt');
        $product = spClass("product");
        $conditions = array("id"=>$productID); // 查找email是$email的记录
        $newrow = array(
                'txt' => $txt,  // 然后将这条记录的name改成“喜羊羊”    
        );
        $result=$product->update($conditions, $newrow); // 更新记录
        if($result){
            echo "1";
        }else{
            echo "0";
        }
        
    }
    
}