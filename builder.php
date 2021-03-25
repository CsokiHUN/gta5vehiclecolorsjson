<?php
    $result = array();
    $file = fopen('vehiclecolors.tsv', 'r');

    while(!feof($file)) {
        $line = fgets($file);
        $splited = preg_split('/[\t]/', $line);

        $rgb = explode(',', preg_replace('/\s+/', '', $splited[3]));

        $result[intval($splited[0])] = [
            'name' => $splited[1],
            'hex' => $splited[2],
            'rgb' => [
                'r' => intval($rgb[0]),
                'g' => intval($rgb[1]),
                'b' => intval($rgb[2])
            ]
        ];
    }
  
    fclose($file);

    echo(json_encode($result, JSON_PRETTY_PRINT));
?>