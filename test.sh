#!/bin/bash
#
MYDIR="`dirname \"$0\"`"
cd $MYDIR
./vendor/bin/codecept run -vvv --debug $1
