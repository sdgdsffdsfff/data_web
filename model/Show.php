<?php
class ShowModel
{
    public function __construct($db){
        $this->_db = $db;
    }

    public function getReguserCount($ge_date, $le_date){
        //$le_date = date("Y-m-d", time($le_date.' 00:00:00'));
        $le_date = $le_date." 23:59:59";
        $sql = <<<EOF
            select date(a.create_time) as 日期, et as 注册来源, count(distinct a.sky_id) as 数量
                from avcp_work.avcp_user_info a
                where a.create_time>='{$ge_date}'
	            and a.create_time<='{$le_date}'
                group by 1,2
                order by 1,2;
EOF;
        return $this->_db->query($sql)->fetchAllArray();
    }

    public function getLoginuserCount($ge_date, $le_date){
        $le_date = $le_date." 23:59:59";
        $sql = <<<EOF
            select    date(a.create_time) 日期,
            count(distinct a.user_name) 登录用户数
            from avcp_work.avcp_user_login_log a
            where a.create_time>='{$ge_date}'
            and a.create_time<'{$le_date}'
        group by 1
        order by 1;
EOF;
        return $this->_db->query($sql)->fetchAllArray();
    }

    public function getChargeCount($ge_date, $le_date){
        $le_date = $le_date." 23:59:59";
        $sql = <<<EOF
             SELECT date(create_time) as 日期,
			        count(distinct sky_id) as 请求充值用户数,
			        round(sum(case when amount=0 or amount is null then real_amount else amount end)/-100.0, 2) as 请求金额,
			        count(distinct case when result=0 and gold_amount>0 then sky_id else null end) as 成功用户数,
			        round(sum(real_amount)/-100.0, 2) as 成功金额
			        FROM avcp_work.avcp_pay_order_log a
	                left join (SELECT user_point
                                FROM avcp_work.avcp_pay_rate where rate>0
                                group by 1
                              ) b
                    on a.user_point=b.user_point
			        where create_time>='{$ge_date}'
			        and create_time<='{$le_date}'
			        and card_type<>22046
			        and ((a.user_point is null and card_type not in (22047, 22048)) or b.user_point is not null)
			        group by 1
			        order by 1;
EOF;
        return $this->_db->query($sql)->fetchAllArray();
    }

    public function getRoomChargeCount($ge_date, $le_date){
        $le_date = $le_date." 23:59:59";
        $sql = <<<EOF
            select a.date as 日期,
                proxy_skyid,
                b.nick_name as 昵称,
                id as 房间ID,
                reqcharge_user as 请求充值用户数,
                round(reqcharge_amount, 2) as 请求金额,
                succcharge_user as 成功用户数,
                round(succcharge_amount, 2) as 成功金额
            from
            ( SELECT date(create_time),
                proxy_skyid,
                count(distinct sky_id) as reqcharge_user,
                count(distinct case when result=0 and gold_amount>0 then sky_id else null end) as succcharge_user,
                sum(case when amount=0 or amount is null then real_amount else amount end)/-100.0 as reqcharge_amount,
				sum(real_amount)/-100.0 as succcharge_amount
			    FROM avcp_work.avcp_pay_order_log a
	            left join (SELECT user_point
                                FROM avcp_work.avcp_pay_rate where rate>0
                                group by 1
                              ) b
                on a.user_point=b.user_point
			    where create_time>='{$ge_date}'
			    and create_time<='{$le_date}'
			    and card_type<>22046

			    and ((a.user_point is null and card_type not in (22047, 22048)) or b.user_point is not null)
			    group by 1,2
			    order by 1,2 ) a
            left join
	        (
	            select a.sky_id,a.nick_name,b.id
		        from  avcp_work.avcp_user_info a ,avcp_work.avcp_room_info b
		        where a.sky_id=b.sky_id
            )b
	        on a.proxy_skyid=b.sky_id;
EOF;
        return $this->_db->query($sql)->fetchAllArray();
    }

    public function getGoldAmountCount($ge_date, $le_date){
        $sql = <<<EOF
            select date(a.create_time),sum(a.gold_amount)
            from avcp_work.avcp_pay_order_log a
            where a.create_time>='{$ge_date}'
            and a.result=0
            and a.type=4
            group by 1
EOF;

        return $this->_db->query($sql)->fetchAllArray();
    }


}