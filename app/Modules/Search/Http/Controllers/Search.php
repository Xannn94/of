<?php

namespace App\Modules\Search\Http\Controllers;

use App\Modules\Search\Helpers\Stem;
use Xannn94\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

abstract class Search
{
    /**
     * @var bool|string Query string
     */
    protected $_query = false;

    /**
     * @var bool|array Result array
     */
    protected $_resultArray = false;

    /**
     * @var bool|string Table name
     */
    public $tableName = false;

    /**
     * @var bool|DB DB facade
     */
    protected $_table = false;

    /**
     * @var string Default title field name
     */
    public $titleField = 'title';

    /**
     * @var string Default preview field name
     */
    public $previewField = 'preview';

    /**
     * @var string Default date field name
     */
    public $dateField = 'created_at';

    /**
     * @var string Default route name
     */
    public $routeName = 'default';

    /**
     * @var int Total results count
     */
    static $total = 0;

    abstract public function getResult();

    /**
     * @param $query string Query string
     * @return bool
     */
    public function setQuery($query)
    {
        if ( !is_string($query) ) {
            return false;
        }

        $this->_query = $query;

        return true;
    }

    /**
     * @return bool|string Query string
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * @param $resultArray array Result array
     * @return bool
     */
    public function setResultArray($resultArray)
    {
        if ( !is_array($resultArray) ) {
            return false;
        }

        $this->_resultArray = $resultArray;

        return true;
    }

    /**
     * @return array|bool Result array
     */
    public function getResultArray()
    {
        return $this->_resultArray;
    }

    /**
     * Get Query Builder table
     *
     * @return bool
     */
    public function getTable()
    {
        if (false === $this->_table) {
            $this->_table = DB::table($this->tableName);
        }
        return $this->_table;
    }

    /**
     * @param $result array|Collection Search results
     * @param $module string Module name
     * @param $title string Module title in view
     * @param bool $catalog Is catalog
     * @return array
     */
    public function addNodes($result, $module, $title, $catalog = false)
    {
        $resultArray = [];

        if ((is_object($result) && $result->count() >= 1) || (is_array($result) && count($result) >= 1)) {
            $resultArray[$module]['title']  = $title;
            $nodes                          = [];
            $resultArray[$module]['html']   = $this->getModuleHtml($result);

            if ($resultArray[$module]['html']) {
                $total = count($result);
                self::$total += $total;
            } else {
                if ($catalog) {
                    foreach ($result as $num => $row) {
                        $nodes[] = [
                            'title'     => $this->getTitle($row),
                            'url'       => $this->getUrl($row),
                            'preview'   => $this->getPreview($row),
                            'articulus' => $row->articulus,
                            'price'     => $row->price,
                            'image'     => $row->image,
                            'date'      => $this->getDate($row),
                            'html'      => $this->getNodesHtml($row),
                        ];
                        self::$total++;
                    }
                } else {
                    foreach ($result as $num => $row) {
                        $nodes[] = [
                            'title'     => $this->getTitle($row),
                            'url'       => $this->getUrl($row),
                            'preview'   => $this->getPreview($row),
                            'date'      => $this->getDate($row),
                            'html'  => $this->getNodesHtml($row),
                        ];
                        self::$total++;
                    }
                }
                $resultArray[$module]['nodes'] = $nodes;
            }
        }

        $resultArray = $this->postAdd($resultArray);

        return $resultArray;
    }

    /**
     * Prepare search text
     *
     * @param $text string Query text
     * @return array
     */
    protected function _prepareSearchText($text)
    {
        $swaps = [
            0   => [0, 1, 2],
            1   => [0, 2, 1],
            2   => [1, 0, 2],
            3   => [1, 2, 0],
            4   => [2, 0, 1],
            5   => [2, 1, 0],
            6   => [0, 1],
            7   => [1, 0],
            8   => [0, 2],
            9   => [2, 0],
            10  => [1, 2],
            11  => [2, 1],
        ];

        $stemmer = new Stem;
        $text = preg_replace("/[^\w\sа-яё]/iu", " ", strip_tags($text));
        $text = explode(' ', $text);

        $word_array = [];

        $this->_minWords = [];

        foreach ($text as $word) {
            if (strlen($word) >= 3) {
                $min_word = $stemmer->stem_word($word);
                $word_array[] = $min_word;
                $this->_minWords[] = $min_word;
            }
        }

        if (sizeof($word_array) == 0) {
            return [];
        } elseif (sizeof($word_array) == 1) {
            return ['%' . $word_array[0] . '%'];
        }

        $result = [];
        for ($i = 0; $i < sizeof($swaps); $i++) {
            $cur_words = [];
            if (sizeof($swaps[$i]) <= sizeof($word_array)) {
                for ($j = 0; $j < sizeof($swaps[$i]); $j++) {
                    if ($swaps[$i][$j] < sizeof($word_array)) {
                        $cur_words[] = $word_array[$swaps[$i][$j]];
                    } else {
                        $cur_words = [];
                        break;
                    }
                }
            }
            if (sizeof($cur_words) > 0) {
                $result[] = '%' . implode('%', $cur_words) . '%';
            }
        }

        if (sizeof($word_array) > 3) {
            for ($i = 0; $i < sizeof($word_array); $i++) {
                $result[] = '%' . $word_array[$i] . '%';
            }
        }

        return $result;
    }

    /**
     * Get raw sql where closure
     *
     * @param $text string Search text
     * @param $fieldsList array Array of table columns
     * @param bool $extWhere Additional where closure
     * @return string Raw sql string
     */
    public function getSearchSqlWhere($text, $fieldsList, $extWhere = false)
    {
        $text = mb_strtolower($text, 'UTF-8');
        $result = $this->_prepareSearchText($text);

        $sql_str = '';
        foreach ($fieldsList as $indx => $field) {
            $cur_word = '';
            foreach ($result as $num => $searchWord) {
                $cur_word = $cur_word . ($cur_word != '' ? ' OR ' : '') . $field . ' LIKE \'' . $searchWord . '\'';
            }

            if ($cur_word != '') {
                $cur_word = ' (' . $cur_word . ') ';
            }

            if ($cur_word != '') {
                $sql_str = $sql_str . ($sql_str != '' ? ' OR ' : '') . $cur_word;
            }
        }

        if ($extWhere !== false && is_array($extWhere)) {
            foreach ($extWhere as $num => $whereCase) {
                $sql_str = $sql_str . ($sql_str != '' ? ' OR ' : '') . ' (' . $whereCase . ') ';
            }
        }

        if ($sql_str == '' || $sql_str == '()') {
            $sql_str = '(id < 0)';
        }

        return DB::raw($sql_str);
    }

    /**
     * Get module`s custom search result html
     * Should be override by module`s search class
     *
     * @param $nodes Collection Search result
     * @return bool|string Html
     */
    public function getModuleHtml($nodes)
    {
        return false;
    }

    /**
     * I don`t know what is it
     *
     * @param $row
     * @return bool
     */
    public function getNodesHtml($row)
    {
        return false;
    }

    /**
     * Merge current module and previous module search results
     *
     * @param $resultArray array Search Results
     * @return array Merged array
     */
    public function postAdd($resultArray)
    {
        return array_merge($this->getResultArray(), $resultArray);
    }

    /**
     * Get formatted search result row title
     *
     * @param $row Collection Row from table
     * @return string Formatted string
     */
    public function getTitle($row)
    {
        return $this->highLight($row->{$this->titleField});
    }

    /**
     * Get route to search result
     *
     * @param $row Collection Row from table
     * @return string Formatted string
     */
    public function getUrl($row)
    {
        if (!$this->routeName || !Route::has($this->routeName)) {
            return '';
        }

        return route($this->routeName, $row->id);
    }

    /**
     * Get formatted search result row preview
     *
     * @param $row Collection Row from table
     * @return string Formatted string
     */
    public function getPreview($row)
    {
        if (!$this->previewField) {
            return '';
        }
        $preview = $row->{$this->previewField};
        $preview = Str::limit($preview, 250);
        return $this->highLight($preview);
    }

    /**
     * Get formatted search result row date
     *
     * @param $row Collection Row from table
     * @return string Formatted string
     */
    public function getDate($row)
    {
        if (!$this->dateField) {
            return '';
        }
        $date = $row->{$this->dateField};
        $date = strip_tags($date);
        return $this->highLight($date);
    }

    /**
     * Highlight search text in search result with html markup
     *
     * @param $word string Search result text
     * @return string Formatted string
     */
    public function highLight($word)
    {
        if ($this->_minWords !== false && count($this->_minWords) > 0) {
            foreach ($this->_minWords as $indx => $minWord) {
                $word = preg_replace("/(" . $minWord . ")/iu", '<mark class="h-highlight">$1</mark>', $word);
            }
            return $word;
        } else {
            if (!mb_strpos($this->getQuery(), ' ')) {
                return preg_replace("/(" . $this->getQuery() . ")/iu", '<mark class="h-highlight">$1</mark>', $word);
            }

            $query = explode(' ', $this->getQuery());
            if (is_array($query)) {
                foreach ($query as $qu) {
                    $word = preg_replace("/($qu)/iu", '<mark class="h-highlight">$1</mark>', $word);
                }

                return $word;
            }
        }
    }
}