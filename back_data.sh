#!/bin/env 
i=0
while [ $i -lt 11 ]
do
    echo $i;
php duanku.php $i
((i++))
done
