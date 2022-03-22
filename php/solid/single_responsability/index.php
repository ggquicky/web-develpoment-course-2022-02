<?php

require_once __DIR__.'/CSVDownloader.php';
require_once __DIR__.'/Downloader.php';
require_once __DIR__.'/HTMLDownloader.php';

class DownloadReport {
    private array $users;

    public function __construct()
    {
        // connect to DB. query...
        // (new Database())->all()
        $this->users = [];
    }

    public function download(Downloader $downloader): void
    {
        $downloader->download($this->users);
    }
}

$dr = new DownloadReport();

$dr->download(
    new CSVDownloader()
);