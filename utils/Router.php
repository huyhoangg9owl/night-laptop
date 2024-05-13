<?php

class Route
{
    public function init(): string
    {
        $uri = $_REQUEST['uri'] ?? "";
        return $this->dynamicRoutes($uri);
    }

    private function dynamicRoutes($uri): string
    {
        if (str_contains($uri, "upload")) {
            return $uri;
        }
        if ($uri === "") $uri = "index";
        $uri = $this->cleanPath($uri);
        $rootPath = $_SERVER['DOCUMENT_ROOT'] . "/pages/";
        $path = $rootPath . $uri;
        if (file_exists($path . ".php")) {
            return $path . ".php";
        } else if (file_exists($path . "/index.php")) {
            $path = $path . "/index";
            return $path . ".php";
        } else {
            return $this->paramsPath($uri, $rootPath);
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

    private function paramsPath($uri, $rootPath): string
    {
        $checkPathArray = array_merge([""], explode("/", $uri));
        $this->cleanPath($rootPath);
        $path = "pages";
        for ($i = 0; $i < count($checkPathArray); $i++) {
            $currentPath = $this->cleanPath($path);
            $nextPath = $currentPath . "/" . $checkPathArray[$i];
            if (file_exists($nextPath . ".php") || is_dir($nextPath)) {
                $path = $this->cleanPath($nextPath);
            } else {
                if (!is_dir($currentPath)) {
                    $path = "pages/not-found.php";
                    break;
                }
                $dirs = scandir($currentPath);
                $dirs = array_filter($dirs, function ($dir) {
                    return $dir !== "." && $dir !== "..";
                });
                $dirs = array_filter($dirs, function ($dir) {
                    return str_contains($dir, "[") && str_contains($dir, "]");
                });
                if (count($dirs) === 0) {
                    $path = "pages/not-found.php";
                    break;
                }
                $dir = array_values($dirs)[0];
                $GLOBALS['params'][str_replace(["[", "]", ".php"], "", $dir)] = $checkPathArray[$i];
                $path = $currentPath . "/" . $dir;
            }
        }
        if (is_dir($path)) $path = $path . "/index.php";

        return $path;
    }
}

return new Route();
