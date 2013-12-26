<?php
class news extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "news"; // 数据表的名称
  var $linker = array(
                'user'=>array(
                        'type' => 'hasone',   // 关联类型，这里是一对一关联
                        'map' => 'author',    // 关联的标识
                        'mapkey' => 'creator', // 本表与对应表关联的字段名
                        'fclass' => 'user', // 对应表的类名
                        'fkey' => 'id',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
                
        );
}