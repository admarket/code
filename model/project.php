<?php
class project extends spModel
{
  var $pk = "id"; // 每个留言唯一的标志，可以称为主键
  var $table = "project"; // 数据表的名称
   // 由spModel的变量$linker来设置表间关联
        var $linker = array(
                'advertise'=>array(
                        'type' => 'hasmany',   // 关联类型，这里是一对一关联
                        'map' => 'detail',    // 关联的标识
                        'mapkey' => 'id', // 本表与对应表关联的字段名
                        'fclass' => 'advertise', // 对应表的类名
                        'fkey' => 'project',    // 对应表中关联的字段名
                        'enabled' => true     // 启用关联
                ),
                'category' => array(
                                'type' => 'hasone',   // 一对多关联，一个用户可能属于多个用户组
                                'map' => 'kind',    // 关联的标识
                                'mapkey' => 'category',  // 关联的字段
                                'fclass' => 'category', // 对应表的数据类是m_group
                                'fkey' => 'id', // 对应表的关联字段
                                'enabled' => true
                ),
        );
}