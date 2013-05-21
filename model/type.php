<?php
class type extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "type"; // 数据表的名称
  // 由spModel的变量$linker来设置表间关联
        var $linker = array(
                'category'=>array(
                        'type' => 'hasmany',   // 关联类型，这里是一对一关联
                        'map' => 'categories',    // 关联的标识
                        'mapkey' => 'id', // 本表与对应表关联的字段名
                        'fclass' => 'category', // 对应表的类名
                        'fkey' => 'type',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
        );
}