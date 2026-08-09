<?php
// index.php - Simple Direct Token Proxy
$id = isset($_GET['id']) ? $_GET['id'] : '900';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://s.ipl2026.workers.dev/live.m3u8?id=" . $id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');

$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    header("Content-Type: application/vnd.apple.mpegurl");
    echo $response;
} else {
    header("Location: https://s.ipl2026.workers.dev/live.m3u8?id=" . $id);
}
exit();
?>
