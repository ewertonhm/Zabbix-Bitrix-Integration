<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Map\\ColaboradorTableMap',
    1 => '\\Map\\ColaboradorTecnologiaTableMap',
    2 => '\\Map\\ColaboradorUnidadeTableMap',
    3 => '\\Map\\TaskAccompliceTableMap',
    4 => '\\Map\\TaskAuditorTableMap',
    5 => '\\Map\\TaskTableMap',
    6 => '\\Map\\TecnologiaTableMap',
    7 => '\\Map\\UnidadeTableMap',
    8 => '\\Map\\UsuarioTableMap',
  ),
));
