<?php

class ControllerCronImport extends Controller
{
	public function index()
    {
        $category = $this->addCategory([]);
        $this->load->helper('utils');

        $json = array();

        $xml = new SimpleXMLElement(
            'https://voltmarket.ru/bitrix/catalog_export/volt_partners.php',
            LIBXML_PARSEHUGE,
            true
        );

        foreach ($xml->shop->categories->category as $element) {
            $temp = (array)$element;

            print_r(
                [
                    $temp['@attributes']['id'],
                    $temp['@attributes']['parentId'] ?? 'not set',
                    Utils::rusToLat($temp[0])
                ]
            );
        }

//        foreach ($xml->shop->offers->offer as $offerItem) {
//            var_dump((string) $offerItem->url);
//            var_dump((string)$offerItem->price);
//            var_dump((string)$offerItem->qty);
//            var_dump((string)$offerItem->name);
//            var_dump((string)$offerItem->description);
//            var_dump((array)$offerItem->picture);
//
//            foreach ($offerItem->param as $paramItem) {
//                $temp = (array)$paramItem;
//
//                print_r(
//                    [
//                        $temp['@attributes']['name'] ?? 'not set',
//                        $temp[0]
//                    ]
//                );
//            }
//        }

//		$this->response->addHeader('Content-Type: application/json');
//		$this->response->setOutput(json_encode($json));
	}

    public function addCategory($data)
    {
        $tbl = DB_PREFIX;
        $this->db->query("INSERT INTO {$tbl}category SET parent_id = '" . (int)$data['parent_id'] . "', `top` = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', `column` = '" . (int)$data['column'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), date_added = NOW()");

        $category_id = $this->db->getLastId();

//        if (isset($data['image'])) {
//            $this->db->query("UPDATE {$tbl}category SET image = '" . $this->db->escape($data['image']) . "' WHERE category_id = '" . (int)$category_id . "'");
//        }

        foreach ($data['category_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO {$tbl}category_description SET category_id = '" . (int)$category_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
        }

//        // MySQL Hierarchical Data Closure Table Pattern
//        $level = 0;
//
//        $query = $this->db->query("SELECT * FROM `{$tbl}category_path` WHERE category_id = '" . (int)$data['parent_id'] . "' ORDER BY `level` ASC");
//
//        foreach ($query->rows as $result) {
//            $this->db->query("INSERT INTO `{$tbl}category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$result['path_id'] . "', `level` = '" . (int)$level . "'");
//
//            $level++;
//        }
//
//        $this->db->query("INSERT INTO `{$tbl}category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$category_id . "', `level` = '" . (int)$level . "'");
//
//        if (isset($data['category_filter'])) {
//            foreach ($data['category_filter'] as $filter_id) {
//                $this->db->query("INSERT INTO {$tbl}category_filter SET category_id = '" . (int)$category_id . "', filter_id = '" . (int)$filter_id . "'");
//            }
//        }

        if (isset($data['category_store'])) {
            foreach ($data['category_store'] as $store_id) {
                $this->db->query("INSERT INTO {$tbl}category_to_store SET category_id = '" . (int)$category_id . "', store_id = '" . (int)$store_id . "'");
            }
        }

        if (isset($data['category_seo_url'])) {
            foreach ($data['category_seo_url'] as $store_id => $language) {
                foreach ($language as $language_id => $keyword) {
                    if (!empty($keyword)) {
                        $this->db->query("INSERT INTO {$tbl}seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'category_id=" . (int)$category_id . "', keyword = '" . $this->db->escape($keyword) . "'");
                    }
                }
            }
        }

        // Set which layout to use with this category
        if (isset($data['category_layout'])) {
            foreach ($data['category_layout'] as $store_id => $layout_id) {
                $this->db->query("INSERT INTO {$tbl}category_to_layout SET category_id = '" . (int)$category_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
            }
        }

        $this->cache->delete('category');
    }

}