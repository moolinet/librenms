<?php

$name = 'fbsd-nfs-server';
$app_id = $app['app_id'];
$scale_min = 0;
$colours = 'mixed';
$unit_text = 'per second';
$unitlen = 10;
$bigdescrlen = 10;
$smalldescrlen = 10;
$dostack = 0;
$printtotal = 0;
$addarea = 1;
$transparency = 15;

$rrd_filename = rrd_name($device['hostname'], ['app', $name, $app_id]);

if (rrdtool_check_rrd_exists($rrd_filename)) {
    $rrd_list = [
        [
            'filename' => $rrd_filename,
            'descr'    => 'write ops',
            'ds'       => 'writeops',
            'colour'   => 'aa6c39',
        ],
        [
            'filename' => $rrd_filename,
            'descr'    => 'write rpc',
            'ds'       => 'writerpc',
            'colour'   => '582a72',
        ],
        [
            'filename' => $rrd_filename,
            'descr'    => 'ops saved',
            'ds'       => 'opsaved',
            'colour'   => '28536c',
        ],
    ];
} else {
    echo "file missing: $rrd_filename";
}

require 'includes/html/graphs/generic_v3_multiline.inc.php';
