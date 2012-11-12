#!/bin/sh

cd twister
clear
echo "*--[ Twister version 1.0 ]--------------------------------*"
echo "\n"

while [ 1 ]
    do
    echo "1. Lock on target.\n"
    echo "\033[0;33m Target : \033[0m" | tr -d '\n'
    read target
    if [ ! "$target" ] ;
        then
        break
    fi
    echo "\n2. Tweet is set.\n"
    array=("$target")
    while [ 1 ]
        do
        echo "\033[0;34m Tweet > \033[0m" | tr -d '\n'
        read tweet
        array+=("$tweet")
        if [ ! "$tweet" -o "$tweet" = 'list' ] ;
            then
            echo "\n"
            php index.php ${array[@]}
            echo "\n"
            break
        fi
    done
done
