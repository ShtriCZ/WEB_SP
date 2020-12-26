<?php
$ch = curl_init();
$name= $_GET['nama'];
$downloadFile = fopen( $name, 'w' );
curl_setopt($ch, CURLOPT_URL, "file link here");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_BUFFERSIZE, 65536);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'downloadProgress');
curl_setopt($ch, CURLOPT_NOPROGRESS, false);
curl_setopt( $ch, CURLOPT_FILE, $downloadFile );
curl_exec($ch);
curl_close($ch);

function downloadProgress ($resource, $download_size, $downloaded_size, $upload_size, $uploaded_size) {

    if($download_size!=0){
        $percen= (($downloaded_size/$download_size)*100);
        echo $percen."<br>";

    }

}
?>