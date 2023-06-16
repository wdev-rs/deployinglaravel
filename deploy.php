<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/wdev-rs/deployinglaravel.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

task('artisan:migrate')->disable();

// Hosts

host('deployinglaravel.local')
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '/var/www/deployinglaravel.local');

// Hooks

after('deploy:failed', 'deploy:unlock');
