set FECHA=%date%
set FECHA=%FECHA:/=%
set FECHA=%FECHA: =%
set FECHA=%FECHA::=%
set FECHA=%FECHA:,=%
set FILE=C:\\Backups\\Backup_%FECHA%.sql
C:/"Archivos de programa"/VertrigoServ/Mysql/bin/mysqldump.exe -h localhost -u root -p VERTRIGO -r %FILE% registro
pause