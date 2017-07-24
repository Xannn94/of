<?php

namespace App\Modules\Search\Http\Controllers;

use Xannn94\Modules\Modules;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Xannn94\Modules\Facades\Module;
use App\Modules\Search\Models\StatisticsSearchWord;
use Illuminate\Support\Facades\Validator;
use App\Modules\Search\Http\Controllers\Search as SearchAbstract;

class IndexController extends Controller
{
    public function getModel()
    {
        return new StatisticsSearchWord();
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'query' => 'bail|required|min:3|max:55'
        ]);

        if ($validator->fails()) {;
            return view('search::message')->withErrors($validator);
        }

        $query = trim($request->input('query'));
        $query = str_replace(array('*', '%'), '', $query);

        if (!$query) {
            $validator->errors()->add('query', trans('search::index.errors.empty_query'));
            return view('search::message')->withErrors($validator);
        }

        if (mb_strlen($query) < 3) {
            $validator->errors()->add('query', trans('search::index.errors.too_short_search_word'));
            return view('search::message')->withErrors($validator);
        }

        $queries = explode(' ', $query);

        foreach ($queries as $num => $q) {
            $q = trim($q);

            if (mb_strlen($q) < 3) {
                unset($queries[$num]);
            } else {
                $queries[$num] = $q;
            }
        }

        $query = implode(' ', $queries);

        if (mb_strlen($query) < 3) {
            $validator->errors()->add('query', trans('search::index.errors.too_short_search_words'));
            return view('search::message')->withErrors($validator);
        }

        if (!$this->_isAllowed($request->ip())) {
            $validator->errors()->add(
                'query',
                trans('search::index.errors.timeout', ['seconds' => module_config('settings.timeout')])
            );
            return view('search::message')->withErrors($validator);
        }

        $modules    = Module::all();
        $result     = [];

        foreach ($modules as $module) {
            if (file_exists(app_path() . '/Modules/' . $module['basename'] . '/Facades/Search.php')) {
                $className      = 'App\Modules\\' . $module['basename'] . '\Facades\Search';
                $searchClass    = new $className;
                $searchClass->setQuery($query);
                $searchClass->setResultArray($result);
                $result = $searchClass->getResult();
            }
        }

        $statistics             = new StatisticsSearchWord;
        $statistics->date       = date('Y-m-d H:i:s');
        $statistics->lang       = \Lang::locale();
        $statistics->ip         = ip2long($request->ip());
        $statistics->query      = $query;
        $statistics->results    = SearchAbstract::$total;

        $statistics->save();

        if (SearchAbstract::$total > module_config('settings.result_limit')) {
            $validator->errors()->add('query', trans('search::index.errors.too_many'));
            return view('search::message')->withErrors($validator);
        }

        return view('search::index', ['query' => $query, 'total' => SearchAbstract::$total, 'result' => $result]);
    }

    /**
     * Check the time passed since last search
     *
     * @param $ipAddress integer User`s IP address
     * @return bool
     */
    protected function _isAllowed($ipAddress)
    {
        $stats = StatisticsSearchWord::where('ip', ip2long($ipAddress))
            ->latest('date')
            ->first();

        if ($stats === null) {
            return true;
        }

        $diff = time() - strtotime($stats->date);

        return ($diff > module_config('settings.timeout'));
    }
}
