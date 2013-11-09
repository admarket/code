<?php
class recharge extends spModel
{
  var $pk = "id";
  var $table = "recharge_info";
  /**
   * 充值记录的创建状态
   */
  var $recharge_status_new = 1;
    /**
     * 充值记录的完结状态
     */
  var $recharge_status_finish = 2;

  public function create($row) {
      date_default_timezone_set(PRC);
      $now = date("Y-m-d H:i:s");
      $rechargeDO = array("user_id"=> $row['uid'],
        "cash"=>$row['cash'],
        "r_status"=>($this->recharge_status_new),
        "gmt_create"=>$now,
        "gmt_modified"=>$now);
      return parent::create($rechargeDO);
  }

  /**
   * 完成特定的充值记录，同时增加充值金额到当前人额账户上,
   * 为了数据完整性，其中开启了事务，为了处理并发修改问题，使用了mysql乐观锁
   */
  public function finish($rechargeId,$totalFee) {
      $rechargeDO = $this->findBy("id",$rechargeId);
      if (is_null($rechargeDO)) {
        return false;
      }
      $r_status = $rechargeDO['r_status'];
      if($r_status == $this->recharge_status_finish) {
          return true;
      } else if ($r_status == $this->recharge_status_new) {
          $this->query("BEGIN");
          $condition = array("id"=>$rechargeId,"r_status"=>$r_status);
          $finish_recharge_result = $this->update($condition,
              array("r_status"=>$this->recharge_status_finish,
              "gmt_modified"=>date("Y-m-d H:i:s"),
              "cash"=>$totalFee
              )
          );
          $updateCount = $this->affectedRows() >= 1;
          if (!$finish_recharge_result||!$updateCount) {
              $this->query("ROLLBACK");
              return false;
          }
          $user = spClass("user");
          $addBalanceResult = $user->addBalance($rechargeDO['user_id'],$totalFee);
          if (!$addBalanceResult) {
              $this->query("ROLLBACK");
              return false;
          }

          $finance = spClass("finance");

          $finance->create(
              array('user_id'=>$rechargeDO['user_id'],
                    'type'=>'10', 'number'=>$totalFee,
                    'remark'=>'充值', 'time'=>date("Y-m-d H:i:s"))
          );

          $this->query("COMMIT");
          return true;
      }
  }

}