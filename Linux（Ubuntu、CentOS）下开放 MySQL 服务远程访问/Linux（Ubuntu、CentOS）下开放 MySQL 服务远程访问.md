#CentOS 直接跳到第二步。
##第一步,修改配置文件：
###Ubuntu（CentOS 直接跳到第二步）:
```
vim /etc/mysql/my.cnf
```
找到
```
bind-address = 127.0.0.1
```
改为
```
#允许任意ip地址访问,也可以指定IP地址。
bind-address = 0.0.0.0
```
###重启MySQL
```
sudo /etc/init.d/mysqld restart
```

##第二步,修改数据库配置
授权root用户进行远程连接，注意替换 “password” 为 root 用户真正的密码:
```
grant all privileges on *.* to root@"%" identified by "password" with grant option;
flush privileges;
```
第二行命令使设置生效，可以马上连接
