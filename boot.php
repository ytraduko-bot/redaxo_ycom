<?php

if (rex::isBackend()) {
    rex_extension::register('PACKAGES_INCLUDED', function ($params) {

        $plugin = rex_plugin::get('yform', 'manager');

        if ($plugin) {
            $pages = $plugin->getProperty('pages');
            $ycom_tables = rex_ycom::getTables();

            foreach ($pages as $page) {
                if (in_array($page->getKey(), $ycom_tables)) {
                    $page->setBlock('ycom');
                }
            }

        }

    });
}

rex_ycom::addTable('rex_ycom_user');
rex_yform_manager_dataset::setModelClass('rex_ycom_user', rex_ycom_user::class);
