<?php
class product extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "product"; // 数据表的名称
  var $linker = array(
                'trades' => array(
                                'type' => 'hasmany',   // 一对多关联，一个用户可能属于多个用户组
                                'map' => 'trades',    // 关联的标识
                                'mapkey' => 'id',  // 关联的字段
                                'fclass' => 'trade', // 对应表的数据类是m_group
                                'fkey' => 'product', // 对应表的关联字段
                                'enabled' => true
                ),
                
        );
}