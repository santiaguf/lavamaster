@echo off 
echo Running dump... 
C:\"Archivos de programa"\VertrigoServ\Mysql\bin\mysqldump -u[root] -p[vertrigo] --result-file="c:\<path>\backup.%DATE:~0,3%.sql" [database] 
echo Done!


http://stackoverflow.com/questions/198968/whats-the-best-free-mysql-backup-solution-on-a-windows-server
http://realm3.com/articles/how_to_schedule_regular_mysql_backups_in_windows
http://www.alejandroarco.es/administracion-de-sistemas/bases-de-datos/mysql-backup-con-mysqldump/