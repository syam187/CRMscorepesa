<?php
return [
  'database' => [
    'host' => 'localhost',
    'port' => '3306',
    'charset' => NULL,
    'dbname' => 'espocrm',
    'user' => 'espocrmuser',
    'password' => 'C0d3d@21',
    'driver' => 'pdo_mysql'
  ],
  'smtpPassword' => 'scorepesa@2023',
  'logger' => [
    'path' => 'data/logs/espo.log',
    'level' => 'WARNING',
    'rotation' => true,
    'maxFileNumber' => 30,
    'printTrace' => false
  ],
  'restrictedMode' => false,
  'webSocketMessager' => 'ZeroMQ',
  'clientSecurityHeadersDisabled' => false,
  'clientCspDisabled' => false,
  'clientCspScriptSourceList' => [
    0 => 'https://maps.googleapis.com'
  ],
  'isInstalled' => true,
  'microtimeInternal' => 1684832280.92681,
  'passwordSalt' => '07698a3078effe28',
  'cryptKey' => '3afc1c74f7665362a259a332eeb80b42',
  'hashSecretKey' => '3b89bfb3300c3fd6db0d3f29725d89e2',
  'defaultPermissions' => [
    'user' => 33,
    'group' => 33
  ],
  'actualDatabaseType' => 'mysql',
  'actualDatabaseVersion' => '8.0.33'
];
