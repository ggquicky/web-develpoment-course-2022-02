<?php

require_once __DIR__.'/Downloader.php';

class CSVDownloader implements Downloader
{
    public function download(array $users)
    {
        var_dump('Download as CSV');
    }
}
