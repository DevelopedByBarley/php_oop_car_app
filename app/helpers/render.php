<?php
class Render
{
    private $path;
    private $params = [];

    public function render($path, $params): string
    {
        ob_start();
        require dirname(__DIR__, 1) . './views/' . $path;
        return ob_get_clean();
    }
}
