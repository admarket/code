<?php
class cadvertise extends spController
{
    
      	function AddAdvertise(){//添加广告项目
      		$advertise = spClass("advertise");
          //手续费规则：(0,1000)=10%，[1000,3000)=9%，[3000,5000)=8%，[5000,8000)=7%，[8000,10000)=6%,[10000,+]=5%;
          $price=intval($this->spArgs('advertisePrice'));
          $fee=10;
          if($price<1000){
            $fee=10;
          }else if($price<3000){
            $fee=9;
          }else if($price<5000){
            $fee=8;
          }else if($price<8000){
            $fee=7;
          }else if($price<10000){
            $fee=6;
          }else{
            $fee=5;
          }
      		$newrow = array(
                              'project' => $this->spArgs('advertiseProject'),
                              'title' => $this->spArgs('advertiseName'),
                              'content' => $this->spArgs('advertiseContent'),
                              'format' => $this->spArgs('format'),
                              'width'=> $this->spArgs('advertiseWidth'),
                              'height'=> $this->spArgs('advertiseHeight'),
                              'price'=> $this->spArgs('advertisePrice')*100,
                              'fee'=>$fee,

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
                   $price=intval($this->spArgs('value'));
                    $fee=10;
                    if($price<1000){
                      $fee=10;
                    }else if($price<3000){
                      $fee=9;
                    }else if($price<5000){
                      $fee=8;
                    }else if($price<8000){
                      $fee=7;
                    }else if($price<10000){
                      $fee=6;
                    }else{
                      $fee=5;
                    }
                  $newrow = array(
                         'price'=> 100*$this->spArgs('value'),
                         'fee'=>$fee,
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
          ob_clean();
          header('Content-type:application/x-javascript');
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
          }else{
            $report=spClass('report');//添加数据统计信息
            $newrow = array(
                        'advertise' => $this->spArgs('aid'),
                        'product' => -1,
                        'trade' => -1,
                        'impression' => 1,
                        'click' => 0,
                        'buyer' => -1,
                        'seller' => -1,
                        'ip' => $ip,
                        );
            $report->create($newrow);
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

            if($result){
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
            }else{
               $this->jump(spUrl('main', 'index'));
            }
            
        }
    
}