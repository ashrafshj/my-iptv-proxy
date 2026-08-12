<?php
$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36";
$referer = "https://b4uplay.com/";

// പ്ലെയർ സ്ട്രീം പേജ് / API URL
$targetUrl = "https://b4uplay.com/sunxt/livestream15.sunnxt.com/54ce8446ac9e412591bba4de574760d5/SuryaTVHD_P_IN_index.mpd"; 

// നേരിട്ട് MPD സ്ട്രീമിലേക്ക് 302 Redirect നൽകുന്നു
header("Location: " . $targetUrl, true, 302);
exit();
?>

