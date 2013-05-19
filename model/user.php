<?php
class user extends spModel
{
  var $pk = "id";
  var $table = "user";

  /**
   * 为userId账户增加金额cash(以分为单位)
   */
  public function addBalance($userId,$cash) {
      $userDO = $this->findBy("id",$userId);
      if (is_null($userDO)) {
          return false;
      }
      return $this->runSql("update user set balance=balance+".$cash." where id = " .$userId);
  }
}