<?php

$fileName = WP_CONTENT_DIR . '/keys.php';

if(!file_exists($fileName)) {
    $names = [
        'AUTH_KEY',
        'SECURE_AUTH_KEY',
        'LOGGED_IN_KEY',
        'NONCE_KEY',
        'AUTH_SALT',
        'SECURE_AUTH_SALT',
        'LOGGED_IN_SALT',
        'NONCE_SALT'
    ];

    $file = fopen($fileName, 'w');
    fprintf($file, "<?php\n\n");
    fprintf($file, "/* Generated %s */\n", date('Y-m-d H:i'));
    foreach($names as $name) {
        fprintf($file, "define('%s', '%s');\n", $name, bin2hex(random_bytes(32)));
    }
    fclose($file);
}

include $fileName;

