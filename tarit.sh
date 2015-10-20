#!/bin/bash

tar -cvf pomodori.tar *
gzip -c pomodori.tar > pomodori.tgz
