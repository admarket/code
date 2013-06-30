<?php
class cproduct extends spController
{
	function addProduct(){
		$filename=$_FILES['show']['name'];
        $ext=end(explode('.', $filename));
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
             echo "false".$msg;
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
        $ext=end(explode('.', $filename));
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
         echo "true";
        }else {
         echo "false".$msg;
        }
	}
	function getJsonData(){
		$product = spClass("product");
		$conditions = array("owner" => $_SESSION['user']['id']);
		$records = $product->findAll($conditions); 
		echo json_encode($records);
	}

    
}