<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});
Breadcrumbs::register('admin.odds', function ($breadcrumbs) {
    $breadcrumbs->push(__('odds'), route('admin.odds'));
});
Breadcrumbs::register('admin.games', function ($breadcrumbs) {
    $breadcrumbs->push(__('games'), route('admin.games'));
});

Breadcrumbs::register('admin.betslip', function ($breadcrumbs) {
    $breadcrumbs->push(__('betslip'), route('admin.betslip'));
});


require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
