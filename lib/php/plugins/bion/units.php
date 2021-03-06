<?php
// lib/php/plugins/bion/units.php 20190225 - 20190427
// Copyright (C) 2015-2019 Mark Constable <markc@renta.net> (AGPL-3.0)

class Plugins_Bion_Units extends Plugin
{
    protected
    $tbl = 'bion_units',
    $in = [
        'name'          => '',
        'port'          => '',
        'link_user'     => '',
        'link_admin'    => '',
        'link_files'    => '',
        'link_charts'   => '',
        'site'          => '',
    ];

    protected function create() : string
    {
error_log(__METHOD__.' x='.$this->g->in['x']);

        parent::create();
    }

    protected function list() : string
    {
//error_log(__METHOD__.' x='.$this->g->in['x']);

        if ($this->g->in['x'] === 'json') {
            $columns = [
                ['dt' => null, 'db' => 'id'],
                ['dt' => 0, 'db' => 'name', 'formatter' => function($d, $row) {
                    return '
                    <b><a href="?o=bion_units&m=read&i=' . $row['id'] . '">' . $d . '</a></b>';
                }],
                ['dt' => 1, 'db' => 'port'],
                ['dt' => 2, 'db' => 'link_user'],
                ['dt' => 3, 'db' => 'link_admin'],
                ['dt' => 4, 'db' => 'link_files'],
                ['dt' => 5, 'db' => 'link_charts'],
                ['dt' => 6, 'db' => 'site'],
/*
                ['dt' => 6, 'db' => 'site', 'formatter' => function($d, $row) {
//error_log(var_export($row,true));
                    return '
                    <b><a href="?o=bion_sites&m=read&i=' . $d . '">' . $row['sites_name'] . '</a></b>';
                }],
*/
           ];
            return json_encode(db::simple($_GET, $this->tbl, 'id', $columns), JSON_PRETTY_PRINT);
        }
        return $this->t->list($this->in);
    }
}

?>
