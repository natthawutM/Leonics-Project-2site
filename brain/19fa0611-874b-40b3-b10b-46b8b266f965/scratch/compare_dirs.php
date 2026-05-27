<?php

function getFiles($dir, $baseDir) {
    $files = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $path = $file->getRealPath();
            $relPath = str_replace($baseDir, '', $path);
            // Normalize path separators
            $relPath = str_replace('\\', '/', $relPath);
            $files[$relPath] = md5_file($path);
        }
    }
    return $files;
}

$dir1 = __DIR__ . '/../../../Tetabuan_MYS';
$dir2 = __DIR__ . '/../../../Terusan_MYS';

$baseDir1 = realpath($dir1);
$baseDir2 = realpath($dir2);

if (!$baseDir1 || !$baseDir2) {
    echo "One or both directories do not exist.\n";
    exit(1);
}

$files1 = getFiles($baseDir1, $baseDir1);
$files2 = getFiles($baseDir2, $baseDir2);

$onlyIn1 = array_diff_key($files1, $files2);
$onlyIn2 = array_diff_key($files2, $files1);

$differentContent = [];
foreach ($files1 as $relPath => $hash1) {
    if (isset($files2[$relPath])) {
        if ($hash1 !== $files2[$relPath]) {
            $differentContent[] = $relPath;
        }
    }
}

echo "=== ONLY IN TETABUAN ===\n";
foreach (array_keys($onlyIn1) as $f) {
    echo "$f\n";
}

echo "\n=== ONLY IN TERUSAN ===\n";
foreach (array_keys($onlyIn2) as $f) {
    echo "$f\n";
}

echo "\n=== DIFFERENT CONTENT ===\n";
foreach ($differentContent as $f) {
    echo "$f\n";
}
