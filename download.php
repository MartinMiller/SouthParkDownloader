#!/usr/bin/env php
<?php

/**
 * Main script.
 * This file is part of the South Park Downloader package.
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3 License
 */

require_once(__DIR__.'/app/SouthParkDownloader.php');
require_once(__DIR__.'/config.php');

try {
	$southParkDownloader = new SouthParkDownloader();
	$config = $southParkDownloader->getCommandLineArguments($argv);
	$config->setTmpFolder($tmp);
	$config->setDownloadFolder($download);
	$config->setOutputFolder($output);
	$config->setFfmpeg($ffmpeg);
	$config->setMkvmerge($mkvmerge);
	$config->setVerifyChecksums(true); // no command line option yet
	$config->setUpdateChecksumOnSuccessfulDownload(true); // no command line option yet
	$config->setPrintUrls(false); // no command line option yet
	$config->setPrintCommandCalls(false); // no command line option yet
	$config->setQuietCommands(true); // no command line option yet
	$config->setRemoveTempFiles(true); // no command line option yet
	$config->setRemoveDownloadedFiles(false); // no command line option yet
	$southParkDownloader->setConfig($config);
	$southParkDownloader->run();
} catch (RuntimeException $e) {
	die($e->getMessage());
}
