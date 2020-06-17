<?php

return [
    'ffmpeg' => [
        'binaries' => env('FFPROBE_BINARIES', '/usr/local/bin/ffmpeg'),
        'threads'  => 12,
    ],

    'ffprobe' => [
        'binaries' => env('FFPROBE_BINARIES', '/usr/local/bin/ffmpeg'),
    ],

    'timeout' => 3600,

    'enable_logging' => true,
];
