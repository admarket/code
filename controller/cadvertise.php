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
        
        function GetADCode(){
          //查询广告位基本信息
          $ip;
            if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
            else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
            //else $ip = "Unknow";
          $advertise = spClass("advertise");
          $conditions = array("id"=>$this->spArgs('aid')); // 根据id查找指定的广告位
          $result=$advertise->spLinker()->find($conditions);
          echo "var advertise=";
          echo json_encode($result);
          echo ";";
          ////如果广告位状态为已经出售，查询交易信息
          if($result['state']!='0'){
            $trade = spClass("trade");
            $conditions = array("advertise"=>$this->spArgs('aid')); // 根据id查找指定的广告位
            $result=$trade->spLinker()->find($conditions);

            $report=spClass('report');//添加数据统计信息
            $newrow = array(
                        'advertise' => $this->spArgs('aid'),
                        'product' => $result['product']['id'],
                        'trade' => $result['id'],
                        'impression' => 1,
                        'click' => 0,
                        'buyer' => $result['buyer'],
                        'seller' => $result['seller'],
                        'ip' => $ip,
                        );
            $report->create($newrow);

            $product=spClass('product');//更新产品统计信息
            $productConditions = array("id"=>$result['product']['id']); // 查找email是$email的记录
            $newrow = array(
                    'impression' => $result['product']['impression']+1,  // 浏览次数+1
            );
            $product->update($productConditions, $newrow); // 更新记录

            echo "var trade=";
            echo json_encode($result);
            echo ";";
          }
          
        }
        function clicked(){
           $ip;
            if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
            else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
            //else $ip = "Unknow";

            $trade = spClass("trade");
            $conditions = array("advertise"=>$this->spArgs('aid')); // 根据id查找指定的广告位
            $result=$trade->spLinker()->find($conditions);

            $report=spClass('report');//添加数据统计信息
            $newrow = array(
                        'advertise' => $this->spArgs('aid'),
                        'product' => $result['product']['id'],
                        'trade' => $result['id'],
                        'impression' => 0,
                        'click' => 1,
                        'buyer' => $result['buyer'],
                        'seller' => $result['seller'],
                        'ip' => $ip,
                        );
            $report->create($newrow);

            $product=spClass('product');//更新产品统计信息
            $productConditions = array("id"=>$result['product']['id']); // 查找email是$email的记录
            $newrow = array(
                    'click' => $result['product']['click']+1,  // 点击次数+1
            );
            $product->update($productConditions, $newrow); // 更新记录

            $this->jump($result['product']['url']);//跳转到产品url
        }
    
}