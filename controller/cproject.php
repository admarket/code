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
                if($result){
                        $arg = array(
                        APP_PATH.'/img/ads/',
                        $result
                        );
                    $upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
                    $result=$upFlie->upload_file($_FILES['logo']);
                	echo 1;
                }  else{
                	echo 0;
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

    
}