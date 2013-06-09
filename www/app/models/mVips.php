<?php

class mVips extends model {

    function getList() {
        if ( !file_exists(DATA_PATH . "vips.csv") ) {
            //TODO: why to throw exception? maybe we should just create this file?
            throw new Exception("It seems there is no even news.csv file...");
        }

        $vips = file(DATA_PATH . "vips.csv");

        if (count($vips) == 1 && $vips[0] == '') {
            //TODO: why to throw exception? maybe we should just show a user-friendly message that there's no cNews?
            throw new Exception("It seems there is vips.csv file, but still no vipItems there...");
        }

        $resultArray[] = null;

        foreach ($vips as $vip) {
            $vip = explode(';', $vip);
            array_push($resultArray, array(
                "id" => $vip[0],
                "name" => $vip[1]));
        }

        $resultArray = array_slice($resultArray, 1);
        asort($resultArray);

        return $resultArray;
    }

}