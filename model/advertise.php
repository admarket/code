<?php
class advertise extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "advertise"; // 数据表的名称
  // 由spModel的变量$linker来设置表间关联
        var $linker = array(
                'project'=>array(
                        'type' => 'hasone',   // 关联类型，这里是一对一关联
                        'map' => 'base',    // 关联的标识
                        'mapkey' => 'project', // 本表与对应表关联的字段名
                        'fclass' => 'project', // 对应表的类名
                        'fkey' => 'id',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
                'trade'=>array(
                        'type' => 'hasmany',   // 关联类型，这里是一对一关联
                        'map' => 'trade',    // 关联的标识
                        'mapkey' => 'trade', // 本表与对应表关联的字段名
                        'fclass' => 'trade', // 对应表的类名
                        'fkey' => 'id',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
        );
}