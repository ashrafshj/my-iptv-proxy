<?php
// User-Agent & Referer Headers
$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36";
$referer = "https://bhoomtv.net/";

// Target Site URL (ചാനൽ ഉള്ള പേജ് / API)
$targetUrl = "https://bhoomtv.net/"; 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: " . $userAgent,
    "Referer: " . $referer
]);

$response = curl_exec($ch);
curl_close($ch);

// .mpd URL 추출 ചെയ്യുന്ന Regex Pattern
preg_match('/https?:\/\/[^\s"]+\.mpd\?[^"\s]+/', $response, $matches);

if (!empty($matches[0])) {
    $mpdUrl = $matches[0];
    
    // TiviMate-ലേക്ക് 302 Redirect നൽകുന്നു
    header("Location: " . $mpdUrl, true, 302);
    exit();
} else {
    http_response_code(404);
    echo "Stream URL not found or Expired.";
}
?>

