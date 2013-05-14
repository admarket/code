<?php
class cadvertise extends spController
{
	
      	function AddAdvertise(){//添加广告项目
      		$advertise = spClass("advertise");
      		$newrow = array(
                              'project' => $this->spArgs('advertiseProject'),
                              'title' => $this->spArgs('advertiseName'),
                              'content' => $this->spArgs('advertiseContent'),
                              'format' => $this->spArgs('format'),
                              'width'=> $this->spArgs('advertiseWidth'),
                              'height'=> $this->spArgs('advertiseHeight'),
                              'price'=> $this->spArgs('advertisePrice'),

                      );
                      $result=$advertise->create($newrow);
                      if($result){
                      	echo 1;
                      }  else{
                      	echo 0;
                      }
      	}
        function RemoveAdvertise(){//添加广告项目
                $advertise = spClass("advertise");
                $conditions = array(
                        'id' => $this->spArgs('advertiseID'),
                );
                $result=$advertise->delete($conditions);
                if($result){
                        echo 1;
                }  else{
                        echo 0;
                }
        }
        function UpdateAdvertise(){//添加广告项目
                $advertise = spClass("advertise");
                $conditions = array("id"=>$this->spArgs('pk')); // 查找id是2的记录
                $argName=$this->spArgs('name');
                switch ($argName)
                {
                case "advertiseName":
                  $newrow = array(
                        'title' => $this->spArgs('value'),
                        );
                  break;
                case "advertiseContent":
                   $newrow = array(
                         'content' => $this->spArgs('value'),
                        );
                  break;
                case "format":
                  $newrow = array(
                        'format' =>  $this->spArgs('value'),
                        );
                  break;
                case "advertiseWidth":
                  $newrow = array(  
                         'width'=> $this->spArgs('value'),
                        );
                  break;
                case "advertiseHeight":
                  $newrow = array(
                        'height'=> $this->spArgs('value'),
                        );
                  break;
                case "advertisePrice":
                  $newrow = array(
                         'price'=> $this->spArgs('value'),
                        );
                  break;
                default:
                  echo 0;
                }
                $result=$advertise->update($conditions,$newrow);
                if($result){
                        echo 1;
                }  else{
                        echo 0;
                }
        }

    
}