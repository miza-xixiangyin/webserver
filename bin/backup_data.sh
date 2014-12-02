DATE=$(date +%Y-%m-%d)
TIME=$(date +%s)
DATABASE=xixiangyin-test
PATH=/mnt/backup/$DATE

# create backup folder
if [ ! -d "$PATH" ]; then
	/bin/mkdir $PATH
fi

# expore mysql data
/usr/bin/mysqldump -pzizhulin@db -u root $DATABASE > $PATH/$DATABASE-$TIME.sql

# backup media data
/bin/cp -R public/uploads $PATH/uploads-$TIME