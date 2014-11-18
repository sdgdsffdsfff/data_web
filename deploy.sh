#!/bin/sh
source /etc/profile

env=$1
if [ $env == "dev" ]
then
    rm -f config.php
    ln -s configs/config_dev.php config.php
elif [ $env == "stage" ]
then
    rm -f config.php
    ln -s configs/config_stage.php config.php
elif [ $env == "online" ]
then
    rm -f config.php
    ln -s configs/config_online.php config.php
fi
