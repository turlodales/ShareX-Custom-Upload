<?php

if (!file_exists("config.php")) {
    $error_msg = "Your configuration file does not exist. Please make a copy of the default configuration (config.default.php) and rename it to config.php. <a href='https://github.com/JoeGandy/ShareX-Custom-Upload/tree/master#setup'>More info</a>";
    $error_no_cfg = true;
    include 'error.php';
    die();
}

$user_config = include 'config.php';

$default_config = [
    'base_url' => 'https://www.example.com',
    'secure_key' => 'super secret key',
    'file_storage_folder' => 'u/',
    'upload_access_path' => '/',
    'zip_storage_folder' => 'backups/',
    'allowed_ips' => ['127.0.0.1', '::1'],
    'enable_password_login' => false,
    'enable_username' => true,
    'remember_me_expiration_days' => 30,
    'page_title' => 'My File Uploader',
    'heading_text' => 'My File Uploader',
    'gallery_date_format' => 'MMMM Do YYYY, HH:mm:ss',
    'enable_gallery_page_uploads' => true,
    'enable_delete_all' => true,
    'enable_delete' => true,
    'enable_rename' => true,
    'enable_tooltip' => true,
    'enable_zip_dump' => false,
    'enable_bulk_operations' => true,
    'enable_rich_text_viewer' => true,
    'sharex_upload_naming_scheme' => 'random',
    'gallery_upload_naming_scheme' => 'random',
    'text_upload_default_naming_scheme' => 'random',
    'random_name_length' => 6,
    'upload_date_format' => 'Y-m-d_H.i.s',
    'enable_updater' => true,
    'enable_update_rollback' => true,
    'enable_image_cache' => true,
    'debug_mode' => false
];

$config_merged = [];

$config_merged['default_used_list'] = [];

foreach ($default_config as $key => $value) {
    if (isset($user_config[$key])) {
        $config_merged[$key] = $user_config[$key];
    } else {
        $config_merged[$key] = $value;
        array_push($config_merged['default_used_list'], $key);
    }
}

return $config_merged;
