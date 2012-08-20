BACKUP_PATH=d:\backup\
DB_NAME=registro
DB_USER=root
DB_PASS=vertrigo
set FECHA= %date%
set FECHA=%FECHA%:/=%s
set FECHA=%FECHA%: =%s
set FECHA=%FECHA%::=%s
set FECHA=%FECHA%:,=%s
set BACKUP_FILE=%BACKUP_PATH%backup_%DB_NAME%_%fecha%.sql

mysqldump -u%DB_USER% -p%DB_PASS% %DB_NAME%> %BACKUP_FILE%