<?php

namespace Services;

require_once 'Config/bootstrap.php';
require_once REPOSITORY_PATH . '/ImageRepository.php';

use Repositories\ImageRepository;

class FileUploadService
{
    private $imageRepository;

    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }

    public function execute($file): int
    {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $original_name = str_replace('.' . $ext, '', $file['name']);
        $name = sprintf('%s-%s', md5($original_name), md5(date('Y-m-d H:i:s')));

        $this->upload($name, $ext, $file['tmp_name']);

        $create = [
            'name' => $name,
            'original_name' => $original_name,
            'extension' => $ext,
            'size' => $file['size'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        return $this->store($create);
    }

    protected function upload($name, $ext, $tmp_name)
    {
        $path = sprintf('%s/%s.%s', UPLOAD_DIR, $name, $ext);
        move_uploaded_file($tmp_name, $path);
    }

    protected function store($data): int
    {
        return $this->imageRepository->create($data);
    }
}