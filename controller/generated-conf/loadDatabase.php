<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Map\\ApiKeysTableMap',
    1 => '\\Map\\ColaboradorTableMap',
    2 => '\\Map\\ColaboradorTecnologiaTableMap',
    3 => '\\Map\\ColaboradorUnidadeTableMap',
    4 => '\\Map\\N3AccompliceTableMap',
    5 => '\\Map\\TaskAccompliceTableMap',
    6 => '\\Map\\TaskAuditorTableMap',
    7 => '\\Map\\TaskTableMap',
    8 => '\\Map\\TecnologiaTableMap',
    9 => '\\Map\\UnidadeTableMap',
    10 => '\\Map\\UsuarioTableMap',
  ),
));
