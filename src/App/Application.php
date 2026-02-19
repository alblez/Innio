<?php

namespace App;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    protected $namespace = 'App\\';

    public function __construct($basePath = null)
    {
        parent::__construct($basePath);
        $this->useAppPath(base_path('src/App'));
    }
}
