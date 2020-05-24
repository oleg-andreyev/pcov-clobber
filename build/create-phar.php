<?php
// The php.ini setting phar.readonly must be set to 0
$pharFile = 'pcov-clobber.phar';

// clean up
if (file_exists($pharFile)) {
    unlink($pharFile);
}

// create phar
$p = new Phar($pharFile);

// creating our library using whole directory
$p->buildFromDirectory('.');
$p->delete('build/create-phar.php');

// pointing main file which requires all classes
$p->setDefaultStub('bin/pcov', null);

echo "$pharFile successfully created";