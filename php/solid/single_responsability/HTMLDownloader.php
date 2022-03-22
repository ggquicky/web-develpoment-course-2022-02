<?php

require_once __DIR__.'/Downloader.php';

class HTMLDownloader implements Downloader
{
    public function download(array $users)
    {
        var_dump('Download as HTML');
    }
}
