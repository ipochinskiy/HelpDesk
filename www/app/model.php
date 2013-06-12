<?php

class model {
    protected function ensureFileExists($fileName, $ext, $text) {
        if ($ext == "xml") {
            $text = "<?xml version='1.0' standalone='yes'?>" . $text;
        }
        $fileName = $fileName . "." . $ext;
        if (!file_exists($fileName)) {
            try {
                $file = fopen($fileName, "x");
                fwrite($file, $text);
                fclose($file);
            } catch (Exception $e) {
                throw new Exception($fileName . "is not exist and not creatable");
            }
        }
    }
}