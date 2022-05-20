<?php

namespace App;

class Application extends \Illuminate\Foundation\Application
{
    /**
     * @inheritdoc
     */
    public function path($path = '')
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'kundol' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
