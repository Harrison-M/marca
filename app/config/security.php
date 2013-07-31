<?php

// this is NOT actually real code - see http://symfony.com/doc/current/book/service_container.html#importing-other-container-configuration-resources
if ($container->getParameter('ldap')) {
    $this->import('security_ldap.yml');
} else {
    $this->import('security_fos_only.yml');
}