<?php
namespace common\components\loaders;

use common\components\Utils;
use SplFileInfo;
use Yii;

abstract class BaseLoader
{
    protected $xmlData;
    protected $storage;
    protected $logType = 'upload_shop';

    public function __construct(\SimpleXMLElement $xmlData)
    {
        $this->xmlData = $xmlData;
        $this->storage = Yii::$app->fileStorage;
    }

    abstract public function load();

    protected function batchInsert($table, $columns, $dataRows, $onDup = null)
    {
        if ($dataRows) {
            $command = Yii::$app->db->createCommand()
                ->batchInsert($table, $columns, $dataRows);
            $sql = $command->getRawSql();

            if ($onDup) {
                $sql = $sql . ' ' . $onDup;
            }
            $command->setRawSql($sql);

            try {
                $command->execute();
            } catch (\Exception $e) {
                Yii::error($e->getMessage(), $this->logType);
            }
        }
    }

    protected function saveImage($picture)
    {
        $pathPrefix = 'offers';
        $file = new SplFileInfo($picture);

        try {
            $dirIndex = Utils::getDirIndex($pathPrefix);
            $path = implode(DIRECTORY_SEPARATOR, [ $pathPrefix, $dirIndex, $file->getFilename() ]);

            if ($this->storage->getFilesystem()->has($path)) {
                return $path;
            }

            $stream = fopen($picture, 'r');

            if ($this->storage->getFilesystem()->putStream($path, $stream)) {
                if (\is_resource($stream)) {
                    fclose($stream);
                }
                return $path;
            }

            if (\is_resource($stream)) {
                fclose($stream);
            }
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), $this->logType);
        }

        return '';
    }
}