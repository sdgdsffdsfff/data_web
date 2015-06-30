<?php
class HighLevelModel
{
    /// Database Handler
    private $_db;

    /** 
     * constructor
     * 
     * @param db , database handler, Instance of oracle_db
     * 
     * @return 
     */
    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function getResult($sql){
        $stid = $this->_db->query($sql);
        if($stid === NULL) return NULL;
        return $this->_db->fetchAll();
    }

    //
    public function sub_site_daily($d_offset = 31){
        $d_offset = intval($d_offset);
        if($d_offset < 0 || $d_offset > 90)
            $d_offset = 30;
        $sql = <<<EOF
            SELECT DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date,url,
            pv,ifnull(concat(round(pv_compare /100,2),' %'),0) as pv_compare,
            uv,ifnull(concat(round(uv_compare /100,2),' %'),0) as uv_compare,
            (pv/uv)
            FROM ku6_report_url 
            WHERE stat_date>=DATE_ADD(current_date(), INTERVAL -{$d_offset} day)
            AND url in (
            'www.ku6.com',
            'ent.ku6.com',
            'joke.ku6.com',
            'cinema.ku6.com',
            'dv.ku6.com',
            'zongyi.ku6.com',
            'auto.ku6.com',
            'life.ku6.com',
            'tech.ku6.com',
            'fashion.ku6.com',
            'baby.ku6.com',
            'comic.ku6.com',
            'news.ku6.com',
            'zhizao.ku6.com',
            'sports.ku6.com',
            'mv.ku6.com',
            'coolyuanchuang.ku6.com',
            'yuanchuang.ku6.com',
            'games.ku6.com',
            'so.ku6.com',
            'topic.ku6.com',
            'ishow.ku6.com',
            'm.ku6.com',
            'boke.ku6.com',
            'show.ku6.com'
            )
            ORDER BY stat_date DESC, pv DESC
EOF;
        return $this->getresult($sql);
    }

    //频道日报
    public function channel_daily($d_offset = 31){
        $d_offset = intval($d_offset);
        if($d_offset < 0 || $d_offset > 90)
            $d_offset = 31;
        $sql = <<<EOF
        select DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date, channel, 
        ifnull(vv,0) as vv, ifnull(concat(round(vv_compare/100,2),' %'),0) as vv_compare
        FROM ku6_report_channel where stat_date >= DATE_ADD(current_date(), INTERVAL -{$d_offset} day) order by stat_date DESC, vv DESC
EOF;
        return $this->getresult($sql);     
    }
    
    //returns channel daily top50, 
    public function channel_daily_top50(){
        $sql = <<<EOF
        select DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date, channel, 
        ifnull(vv,0) as vv, ifnull(concat(round(vv_compare/100,2),' %'),0) as vv_compare
        FROM ku6_report_channel where stat_date=DATE_ADD(current_date(), INTERVAL -1 day) order by vv desc limit 50;
EOF;
        return $this->getresult($sql);     
    }

    //returns vv来源分析
    public function vv_src($d_offset = 30){
        $d_offset = intval($d_offset);
        if($d_offset < 0 || $d_offset > 90)
            $d_offset = 30;
        $sql = <<<EOF
            SELECT DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date, ver, 
            ifnull(vv,0) as vv, ifnull(concat(round(vv_compare/100,2),' %'),0) as vv_compare 
            from ku6_report_ver where stat_date>= DATE_ADD(current_date(), INTERVAL -{$d_offset} day) ORDER BY stat_date DESC, vv DESC
EOF;
        return $this->getresult($sql);
    }

    //returns 站内日报
    public function in_daily($d_offset = 30){
        $d_offset = intval($d_offset);
        if($d_offset < 0 || $d_offset > 90)
            $d_offset = 30;
        $sql = <<<EOF
            select DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date,
            ifnull(pv,0) as pv, ifnull(concat(round(pv_compare/100,2),' %'),0) as pv_compare,
            ifnull(uv,0) as uv, ifnull(concat(round(uv_compare/100,2),' %'),0)  as uv_compare,
            ifnull(mobile_uv,0) as mobile_uv, ifnull(concat(round(mobile_uv_compare/100,2),' %'),0) as mobile_uv_compare,
            ifnull(vv,0) as vv, ifnull(concat(round(vv_compare/100,2),' %'),0) as vv_compare,
            ifnull(mobile_vv,0) as mobile_vv, ifnull(concat(round(mobile_vv_compare/100,2),' %'),0) as mobile_vv_compare,
            ifnull(adshow,0) as adshow, ifnull(concat(round(adshow_compare /100,2),' %'),0) as adshow_compare
            FROM ku6_report_daily_inside where stat_date>= DATE_ADD(current_date(), INTERVAL -{$d_offset} day) order by stat_date desc;
EOF;
        return $this->getresult($sql);
    }

    //returns 各来源uv及带来的vv日报 
    public function hl_vhl_refer_uv_vv_daily($d_offset = 30){
        $d_offset = intval($d_offset);
        if($d_offset < 0 || $d_offset > 90)
            $d_offset = 30;
        $sql = <<<EOF
            SELECT DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date,refer,
            uv,ifnull(concat(round(uv_compare /100,2),' %'),0) as uv_compare,
            ifnull(vv, 0) as vv,ifnull(concat(round(vv_compare /100,2),' %'),0) as vv_compare,
            (vv/uv)
            FROM ku6_report_refer
            WHERE stat_date >= DATE_ADD(current_date(), INTERVAL -{$d_offset} day) order by stat_date desc, uv desc
EOF;
        return $this->getResult($sql);
    }

}




























