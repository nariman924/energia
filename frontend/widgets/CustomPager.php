<?php
namespace frontend\widgets;

use yii\widgets\LinkPager;


class CustomPager extends LinkPager
{
    public $options = ['class' => 'page_nav d-flex flex-row'];

    public $nextPageLabel = '<i class="fa fa-chevron-right"></i>';
    /**
     * @var string|bool the text label for the previous page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "previous" page button will not be displayed.
     */
    public $prevPageLabel = '<i class="fa fa-chevron-left"></i>';
    /**
     * @var string|bool the text label for the "first" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "first" page button will not be displayed.
     */
    public $firstPageLabel = '<i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i>';
    /**
     * @var string|bool the text label for the "last" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "last" page button will not be displayed.
     */
    public $lastPageLabel = '<i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>';

    protected function renderPageButtons()
    {
        $buttons = parent::renderPageButtons();
        return '<div class="mt-5 d-flex flex-row">' . $buttons . '</div>';
    }

}