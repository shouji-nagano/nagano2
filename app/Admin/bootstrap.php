<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
 
 use Encore\Admin\Grid\Column;
 use Encore\Admin\Facades\Admin;



Column::extend('color', function ($value, $color) {
    return "<span style='color: $color'>$value</span>";
});


Encore\Admin\Form::forget(['map', 'editor']);

\Encore\Admin\Form::extend(
    'customMonth',
    \App\Admin\Extensions\CustomMonth::class
);

app('view')->prependNamespace('admin', resource_path('views/laravel-admin'));

