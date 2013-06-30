<?php
class report extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "report"; // 数据表的名称
  var $linker = array(
                'product' => array(
                                'type' => 'hasone',   // 一对多关联，一个用户可能属于多个用户组
                                'map' => 'product',    // 关联的标识
                                'mapkey' => 'product',  // 关联的字段
                                'fclass' => 'product', // 对应表的数据类是m_group
                                'fkey' => 'id', // 对应表的关联字段
                                'enabled' => true
                ),
                'advertise' => array(
                                'type' => 'hasone',   // 一对多关联，一个用户可能属于多个用户组
                                'map' => 'advertise',    // 关联的标识
                                'mapkey' => 'advertise',  // 关联的字段
                                'fclass' => 'advertise', // 对应表的数据类是m_group
                                'fkey' => 'id', // 对应表的关联字段
                                'enabled' => true
                ),
        );
}