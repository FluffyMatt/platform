<?php

return [
	'protocol' => 'ldap://',
    'port' => '',
    'server' => 'ldap.cpwplc.com',
    'domain' => 'cpwplc.com',
    'baseDn' => 'dc=cpwplc,dc=com',
    'userFilter' => '(&(objectClass=User) (sAMAccountName=UNAME))',
];
