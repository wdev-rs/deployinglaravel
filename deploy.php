<?php
namespace Deployer;

require 'vendor/wdev-rs/deployer-recipes/recipe/laravel.php';
require 'vendor/wdev-rs/deployer-recipes/recipe/provision.php';

// Config

set('repository', 'https://github.com/wdev-rs/deployinglaravel.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

task('artisan:migrate')->disable();

// Hosts

host('deployinglaravel.local')
    ->set('remote_user', 'deploy')
//    ->set('remote_user', 'vernerd')
//    ->set('become', 'root')
    ->set('deploy_path', '/var/www/deployinglaravel.local');

// Hooks

after('deploy:failed', 'deploy:unlock');
