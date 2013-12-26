<?php
class cash extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "cash"; // 数据表的名称
  var $linker = array(
                'user' => array(
                                'type' => 'hasone',   // 一对多关联，一个用户可能属于多个用户组
                                'map' => 'user',    // 关联的标识
                                'mapkey' => 'user',  // 关联的字段
                                'fclass' => 'user', // 对应表的数据类是m_group
                                'fkey' => 'id', // 对应表的关联字段
                                'enabled' => true
                ),
        );
}