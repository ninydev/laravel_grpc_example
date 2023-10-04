<?php
return [

    /**
     * Настройки очередей для всего сайта
     */
    'SITE_EVENTS_CONNECTION' => env('SITE_EVENT_CONNECTION', 'redis'),
    'SITE_EVENTS_QUEUE' => env('SITE_EVENT_CONNECTION', 'events'),
];
