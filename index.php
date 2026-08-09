<?php
// index.php - Direct M3U8 Stream Fetcher
$id = isset($_GET['id']) ? $_GET['id'] : '900';
$target = "https://s.ipl2026.workers.dev/live.m3u8?id=" . $id;

header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");

$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
    ]
];

$context = stream_context_create($opts);
$content = @file_get_contents($target, false, $context);

if ($content !== FALSE) {
    echo $content;
} else {
    header("Location: " . $target);
}
exit();
?>
