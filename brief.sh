#!/usr/bin/env bash

few=5 ; lines="$(cat)" ; cnt=$(wc -l <<< "$lines") 
[ $cnt -lt $((2*$few+2)) ] && { echo "$lines"; exit; }
mid=$(($cnt/2)) ; [ $few -gt $mid ] && few=$mid
{ head -n$few; echo . . .; tail -n$few; } <<<"$lines"
