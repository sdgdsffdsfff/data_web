<?php

class DtGridUtils {
	
	/**
	 * DTGrid的查询方法
	 * @param sql 查询SQL
	 * @param pager 传递的Pager参数对象
	 * @return 包含查询结果集的Pager
	 * @throws Exception
	 */
	static function queryForDTGrid($sql, $pager, $db_config) {
		try{
                    if(is_resource($db_config)){
                        $link = $db_config;
                    }else{
                        $link = mysql_connect($db_config['dbhost'], $db_config['dbuser'], $db_config['dbpass']);
			mysql_select_db($db_config['dbname'], $link);
                    } 
//			处理导出
			if($pager["isExport"]){
//				如果是全部导出数据
                            if($pager["exportAllData"]){
//					获取快速查询条件SQL、高级查询条件SQL
                                    $fastQuerySql = QueryUtils::getFastQuerySql($pager["fastQueryParameters"]);
                                    $advanceQueryConditionSql = QueryUtils::getAdvanceQueryConditionSql($pager["advanceQueryConditions"]);
//					获取排序SQL
                                    $advanceQuerySortSql = QueryUtils::getAdvanceQuerySortSql($pager["advanceQuerySorts"]);
//					查询结果集放到信息中
                                    $resultSql = "select * from (".$sql.") t where 1=1 ".$fastQuerySql.$advanceQueryConditionSql.$advanceQuerySortSql;
                                    $result = mysql_query($resultSql, $link);
                                    $exportDatas = array();
                                    while($row=mysql_fetch_array($result))
                                            array_push($exportDatas, $row);
                                    $pager["exportDatas"] = $exportDatas;
                            }
                            ExportUtils::export($pager);
                            return;
			}
//			映射为int型
			$pageSize = $pager["pageSize"];
			$startRecord = $pager["startRecord"];
			$recordCount = $pager["recordCount"];
			$pageCount = $pager["pageCount"];
//			获取快速查询条件SQL、高级查询条件SQL
			$fastQuerySql = QueryUtils::getFastQuerySql($pager["fastQueryParameters"]);
			$advanceQueryConditionSql = QueryUtils::getAdvanceQueryConditionSql($pager["advanceQueryConditions"]);
//			获取排序SQL
			$advanceQuerySortSql = QueryUtils::getAdvanceQuerySortSql($pager["advanceQuerySorts"]);
//			获取总记录条数、总页数可能没有
			$countSql = "select count(*) from (".$sql.") t where 1=1 ".$fastQuerySql.$advanceQueryConditionSql.$advanceQuerySortSql;
			$result = mysql_query($countSql, $link);
			$recordCount = 0;
			while($row=mysql_fetch_row($result)){
				$recordCount = $row[0];
			}
			$pager["recordCount"] = $recordCount;
			$pageCount = ceil($recordCount/$pageSize);
			$pager["pageCount"] = $pageCount;
//			查询结果集放到信息中
			$resultSql = "";
			$resultSql.="select * from (".$sql.") t where 1=1 ".$fastQuerySql.$advanceQueryConditionSql.$advanceQuerySortSql." limit ".$startRecord.", ".$pageSize;
			$result = mysql_query($resultSql, $link);
			$dataList = array();
			while($row=mysql_fetch_array($result))
				array_push($dataList, $row);
			$pager["exhibitDatas"] = $dataList;
//			设置查询成功
			$pager["isSuccess"] = true;
		}catch(Exception $e){
//			设置查询失败
			$pager["isSuccess"] = false;
		}
		echo json_encode($pager);
	}
	
	/**
	 * 格式化日期
	 * @param column
	 * @param content
	 * @return
	 * @throws Exception
	 */
	static function formatContent($column, $content){
		try{
//			处理码表
			if($column["codeTable"]!=null){
				if($column["codeTable"][$content]){
					return $column["codeTable"][$content];
				}
			}
//			处理日期、数字的默认情况
			if(strcasecmp("date", $column["type"])==0&&$column["format"]!=null&&!strcasecmp("", $column["format"])){
				if($column["otype"]!=null&&!strcasecmp("", $column["otype"])){
//					if(strcasecmp("time_stamp_s", $column["otype"])){
//						SimpleDateFormat sdf = new SimpleDateFormat(column.getFormat());
//						Date date = new Date(Integer.parseInt(content)*1000);
//						return sdf.format(date);
//					}else if(strcasecmp("time_stamp_ms", $column["otype"])){
//						SimpleDateFormat sdf = new SimpleDateFormat(column.getFormat());
//						Date date = new Date(Integer.parseInt(content));
//						return sdf.format(date);
//					}else if(strcasecmp("string", $column["otype"])){
//						if($column["oformat"]!=null&&!strcasecmp("", $column["oformat"])){
//							SimpleDateFormat osdf = new SimpleDateFormat($column["oformat"]);
//							SimpleDateFormat sdf = new SimpleDateFormat(column.getFormat());
//							Date date = osdf.parse(content);
//							return sdf.format(date);
//						}
//					}
				}
			}else if(strcasecmp("number", $column["type"])&&!strcasecmp("", $column["format"])){
//				DecimalFormat df = new DecimalFormat(column.getFormat());
//				content = df.format(Double.parseDouble(content));
			}
		}catch(Exception $e){}
		return $content;
	}
	
}
?>