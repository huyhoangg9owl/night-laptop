<?php
class Route
{
    public function init()
    {
        $uri = $_REQUEST['uri'] ?? "";
        return $this->dynamicRoutes($uri);
    }

    private function dynamicRoutes($uri)
    {
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
            $uri = $this->paramsPath($uri, $rootPath);
            return $uri;
        }
    }

    private function paramsPath($uri, $rootPath)
    {
        $checkPathArray = array_merge([""], explode("/", $uri));
        $rootPath = $this->cleanPath($rootPath);
        $path = "pages";
        for ($i = 0; $i < count($checkPathArray); $i++) {
            $currentPath = $this->cleanPath($path);
            $nextPath = $currentPath . "/" . $checkPathArray[$i];
            if (file_exists($nextPath . ".php") || is_dir($nextPath)) {
                $path = $this->cleanPath($nextPath);
            } else {
                $dirs = scandir($currentPath);
                $dirs = array_filter($dirs, function ($dir) {
                    return $dir !== "." && $dir !== "..";
                });
                $dirs = array_filter($dirs, function ($dir) {
                    return strpos($dir, "[") !== false && strpos($dir, "]") !== false;
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

    private function cleanPath($uri)
    {
        $uri = explode("?", $uri);
        $uri = $uri[0];
        $uri = explode("#", $uri);
        $uri = $uri[0];
        $uri = trim($uri, "/");
        return $uri;
    }
}
return new Route($alias);
