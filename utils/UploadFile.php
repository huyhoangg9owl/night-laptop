<?php

class UploadFile
{
    private mixed $file;
    private string $uploadDir;
    private mixed $allowedTypes;
    private int $maxSize;
    private string $fileName;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function setUploadDir($uploadDir): void
    {
        $this->uploadDir = $uploadDir;
    }

    public function setAllowedTypes($allowedTypes): void
    {
        $this->allowedTypes = $allowedTypes;
    }

    public function setMaxSize($maxSize): void
    {
        $this->maxSize = $maxSize;
    }

    /**
     * @throws Exception
     */
    public function upload(): void
    {
        if (!is_dir($this->uploadDir)) {
            chmod(ROOT_PATH . "/upload", 777);
            mkdir($this->uploadDir, 0777, true);
        }

        if (!in_array($this->file["type"], $this->allowedTypes)) {
            throw new Exception("File type is not allowed.");
        }

        if ($this->file["size"] > $this->maxSize) {
            throw new Exception("File size is too large.");
        }

        $this->fileName = $this->fileName ?? pathinfo($this->file["name"], PATHINFO_FILENAME);

        $path = $this->uploadDir . "/" . $this->fileName . "." . pathinfo($this->file["name"], PATHINFO_EXTENSION);
        move_uploaded_file($this->file["tmp_name"], $path);

        if (in_array($this->file["type"], ["image/png", "image/jpeg", "image/jpg"])) {
            $image = null;
            if ($this->file["type"] === "image/png") {
                $image = imagecreatefrompng($path);
            } elseif ($this->file["type"] === "image/jpeg" || $this->file["type"] === "image/jpg") {
                $image = imagecreatefromjpeg($path);
            }

            $tmp = $this->cropToSquare($image, 200);
            imagejpeg($tmp, $path);
        }
    }

    private function cropToSquare($image, $size): mixed
    {
        $width = imagesx($image);
        $height = imagesy($image);

        $min = min($width, $height);

        $x = ($width - $min) / 2;
        $y = ($height - $min) / 2;

        $tmp = imagecreatetruecolor($size, $size);
        imagecopyresampled($tmp, $image, 0, 0, $x, $y, $size, $size, $min, $min);

        return $tmp;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName($fileName): void
    {
        $this->fileName = $fileName;
    }

    public function getPath(): string
    {
        return str_replace(ROOT_PATH, "", $this->uploadDir) . "/" . $this->fileName . "." . pathinfo($this->file["name"], PATHINFO_EXTENSION);
    }
}