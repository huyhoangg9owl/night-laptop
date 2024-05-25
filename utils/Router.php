<?php

class Router
{
    private mixed $params = [];

    public function init(): void
    {
        $uri = $_REQUEST['uri'] ?? "";
        require_once $this->dynamicRoutes($uri);
    }

    private function dynamicRoutes($uri): string
    {
        if (!str_contains($uri, "upload")) {
            if ($uri === "") $uri = "index";
            $uri = $this->cleanPath($uri);
            $rootPath = ROOT_PATH . "/pages/";
            $path = $rootPath . $uri;
            if (file_exists($path . ".php")) {
                return $path . ".php";
            } else if (file_exists($path . "/index.php")) {
                $path = $path . "/index";
                return $path . ".php";
            } else {
                return $this->paramsPath($uri);
            }
        } else {
            return ROOT_PATH . "/pages/not-found.php";
        }
    }

    private function cleanPath($uri): string
    {
        $uri = explode("?", $uri);
        $uri = $uri[0];
        $uri = explode("#", $uri);
        $uri = $uri[0];
        return trim($uri, "/");
    }

    private function paramsPath($uri): string
    {
        $checkPathArray = array_merge([""], explode("/", $uri));
        $path = ROOT_PATH . "/pages";
        for ($i = 0; $i < count($checkPathArray); $i++) {
            $currentPath = "/" . $this->cleanPath($path);
            $nextPath = $currentPath . "/" . $checkPathArray[$i];
            if (file_exists($nextPath . ".php") || is_dir($nextPath)) {
                $path = $this->cleanPath($nextPath);
            } else {
                if (!is_dir($currentPath)) {
                    $path = ROOT_PATH . "/pages/not-found.php";
                } else {
                    $dirs = scandir($currentPath);
                    $dirs = array_filter($dirs, function ($dir) {
                        return $dir !== "." && $dir !== "..";
                    });
                    $dirs = array_filter($dirs, function ($dir) {
                        return str_contains($dir, "[") && str_contains($dir, "]");
                    });
                    if (count($dirs) === 0) {
                        $path = ROOT_PATH . "/pages/not-found.php";
                        break;
                    }
                    $dir = array_values($dirs)[0];
                    $this->params[str_replace(["[", "]", ".php"], "", $dir)] = $checkPathArray[$i];
                    $path = $currentPath . "/" . $dir;
                }
            }
        }
        if (is_dir($path)) $path = $path . "/index.php";
        return $path;
    }

    public function getParams(): mixed
    {
        return $this->params;
    }
}
