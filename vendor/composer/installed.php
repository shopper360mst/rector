<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'phpstan/phpstan' => array(
            'pretty_version' => '1.10.55',
            'version' => '1.10.55.0',
            'reference' => '9a88f9d18ddf4cf54c922fbeac16c4cb164c5949',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpstan/phpstan',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'rector/rector' => array(
            'pretty_version' => '0.19.0',
            'version' => '0.19.0.0',
            'reference' => '503f4ead06b3892bd106f67f3c86d4e36c94423d',
            'type' => 'library',
            'install_path' => __DIR__ . '/../rector/rector',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
    ),
);