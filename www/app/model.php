<?php

class model {
    protected function ensureFileExists($name) {
        $fileName = DATA_PATH . $name . ".xml";

        $dom = new DOMDocument("1.0", "utf-8");

        if (!file_exists($fileName)) {
            try {
                $dom -> appendChild($dom -> createElement($name));
                file_put_contents($fileName, $dom -> saveXML());
            } catch (Exception $e) {
                throw new Exception("There's no needed files.", ERROR_NO_FILES);
            }
        }

        $dom -> load($fileName);
        if ($dom -> childNodes -> item(0) -> childNodes -> length == 0) {
            return FALSE;
        }

        return TRUE;
    }
}