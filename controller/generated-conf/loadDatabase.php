<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Map\\ColaboradorTableMap',
    1 => '\\Map\\TaskAccompliceTableMap',
    2 => '\\Map\\TaskAuditorTableMap',
    3 => '\\Map\\TaskTableMap',
    4 => '\\Map\\TecnologiaTableMap',
    5 => '\\Map\\UnidadeTableMap',
    6 => '\\Map\\UsuarioTableMap',
  ),
));
