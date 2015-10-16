#!/bin/bash

CTR=0
while test $CTR -lt 60 ; do
FNAME=`printf "%03d" $CTR`
convert -background gray -fill black \
          -size 60x60  -pointsize 50  -gravity center \
          label:$CTR    $FNAME.gif
CTR=`expr $CTR + 1`
done

./animate.sh
