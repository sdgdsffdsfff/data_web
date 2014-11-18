<?php
putenv("ORACLE_HOME=/home/ku6_data/oracle/instantclient_11_2");
$conn = oci_connect('ku6_dev', 'Ku6_dev', '//10.125.60.22/dw2');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, "select * from creater_user.v_ku6rp1_new");
#$stid = oci_parse($conn, "select TABLE_NAME from ALL_TABLES");
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

