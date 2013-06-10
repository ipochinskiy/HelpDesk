<?php

class model {
    protected function ensureFileExist($fileName, $text) {
        if (!file_exists($fileName)) {
            try {
                $file = fopen($fileName, "x");
                fwrite($file, "<?xml version='1.0' standalone='yes'?>" . $text);
                fclose($file);
            } catch (Exception $e) {
                throw new Exception("$fileName is not exist and not creatable");
            }
        }
    }
}