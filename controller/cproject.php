<?php
class cproject extends spController
{
	
	function AddProject(){//添加广告项目
		
        $filename=$_FILES['logo']['name'];
        $ext=end(explode('.', $filename));
		$newrow = array(
                        'name' => $this->spArgs('projectName'),
                        'url' => $this->spArgs('projectUrl'),
                        'description' => $this->spArgs('projectDescription'),
                        'category' => $this->spArgs('projectCategory'),
                        'owner'=> $_SESSION['user']['id'],
                        'logo'=>$ext,
                );
        $project = spClass("project");
        $result=$project->create($newrow);
        $id=$result;
        if($result){
                $arg = array(
                APP_PATH.'/img/ads/',
                $result
                );
            $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
            $result=$upFlie->upload_file($_FILES['logo']);
            if($result){
                $project = spClass("project");
                $conditions = array("id"=>$id); // 查找email是$email的记录
                $newrow = array(
                        'logo' => $id.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
                );
                $project->update($conditions, $newrow); // 更新记录
             echo 1;
            }else {
             echo "false".$msg;
            } 
        }   
        	
	}
    function RemoveProject(){//添加广告项目
            $project = spClass("project");
            $conditions = array(
                    'id' => $this->spArgs('projectID'),
            );

             $result=$project->delete($conditions);
                if($result){
                        echo 1;
                }  else{
                        echo 0;
                }   
           
            
    }
    function UpdateProject(){ // 测试update用页面
            $project = spClass("project");
            $conditions = array("id"=>$this->spArgs('pk')); // 查找id是2的记录
            $argName=$this->spArgs('name');
            switch ($argName)
            {
            case "projectName":
              $newrow = array(
                    'name' => $this->spArgs('value'),
                    );
              break;
            case "projectUrl":
               $newrow = array(
                     'url' => $this->spArgs('value'),
                    );
              break;
            case "projectDescription":
              $newrow = array(
                    'description' =>  $this->spArgs('value'),
                    );
              break;
            case "category":
              $newrow = array(
                    'category' =>  $this->spArgs('value'),
                    );
              break;
            default:
              echo 0;
            }
            $result=$project->update($conditions,$newrow);
            if($result){
                    echo 1;
            }  else{
                    echo 0;
            }
            
    }

    function UpateLogo(){
        $filename=$_FILES['logo']['name'];
        $ext=end(explode('.', $filename));
        $arg = array(
        APP_PATH.'/img/ads/',
        $this->spArgs('id')
        );
        $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
        $result=$upFlie->upload_file($_FILES['logo']);
        $msg=$upFlie->errmsg;
        if($result){
            $project = spClass("project");
            $id=$this->spArgs('id'); 
            $conditions = array("id"=>$id); // 查找email是$email的记录
            $newrow = array(
                    'logo' => $id.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
            );
            $project->update($conditions, $newrow); // 更新记录
         echo "true";
        }else {
         echo "false".$msg;
        }
        
    }
    function GetJsonData(){//返回json格式的广告项目
        $project = spClass("project");
        $conditions = array("owner" => $_SESSION['user']['id']);
        $records = $project->spLinker()->findAll($conditions); 
        echo json_encode($records);
    }
}