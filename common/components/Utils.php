<?php
namespace common\components;

use Yii;

class Utils
{
    public static function getDirIndex($path = '')
    {
        $storage = Yii::$app->fileStorage;
        $dirindex = 1;

        $normalizedPath = '.dirindex';
        if (isset($path)) {
            $normalizedPath = $path . DIRECTORY_SEPARATOR . '.dirindex';
        }
        if (!$storage->getFilesystem()->has($normalizedPath)) {
            $storage->getFilesystem()->write($normalizedPath, (string) $dirindex);
        } else {
            $dirindex = $storage->getFilesystem()->read($normalizedPath);

            if ($storage->maxDirFiles !== -1) {
                $filesCount = count($storage->getFilesystem()->listContents($dirindex));

                if ($filesCount > $storage->maxDirFiles) {
                    $dirindex++;
                    $storage->getFilesystem()->put($normalizedPath, (string) $dirindex);
                }
            }
        }

        return $dirindex;
    }

}