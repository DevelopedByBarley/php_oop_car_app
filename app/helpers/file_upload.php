<?php
    class FileUploader{
        public $whiteList = [IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG];

    

        public function saveFile($file) {
            if (!in_array(exif_imagetype($file["tmp_name"]), $this->whiteList)) return false;

            $rand = uniqid(rand(), true);
            $ext = pathinfo($file["name"], PATHINFO_EXTENSION);

            $fileTmpName = $_FILES['file']['tmp_name'];

            $originalFileName = $rand . '.' . $ext;
            $directoryPath = "../public/images/" . $originalFileName;

            move_uploaded_file($fileTmpName, $directoryPath);

            return $originalFileName;
        }
    }
?>