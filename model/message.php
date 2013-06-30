<?php
class message extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "message"; // 数据表的名称
  // 由spModel的变量$linker来设置表间关联
        var $linker = array(
                'sender'=>array(
                        'type' => 'hasone',   // 关联类型，这里是一对一关联
                        'map' => 'sender',    // 关联的标识
                        'mapkey' => 'sender', // 本表与对应表关联的字段名
                        'fclass' => 'user', // 对应表的类名
                        'fkey' => 'id',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
                'receiver'=>array(
                        'type' => 'hasone',   // 关联类型，这里是一对一关联
                        'map' => 'receiver',    // 关联的标识
                        'mapkey' => 'receiver', // 本表与对应表关联的字段名
                        'fclass' => 'user', // 对应表的类名
                        'fkey' => 'id',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
        );
}