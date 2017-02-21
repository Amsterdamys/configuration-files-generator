#!/bin/sh
MYDIR="`dirname \"$0\"`"
cd $MYDIR
git stash
PULLRESULT=`git pull origin "$(git branch | grep -E '^\* ' | sed 's/^\* //g')"`

if [ "$PULLRESULT" == "Already up-to-date." ] && [ "$1" != "-f" ]; then
  echo "Aleady up-to-date, no need to deploy"
  exit 1
fi

git stash
php composer.phar update