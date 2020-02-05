#mac搭建php环境
###1.下载安装XAMPP
包中含有PHP环境，命令 php -v，查看版本（版本7.1.33）
###2.composer全局配置
命令：composer config -g repo.packagist composer https://packagist.phpcomposer.com
###3.下载Laravel框架
https://learnku.com/docs/laravel/5.4/installation/1216（版本5.4）
cd /Applications/XAMPP/htdocs/
composer create-project --prefer-dist laravel/laravel blog "5.4.*"  新建项目命令，项目名称 blog
###4.配置XAMPP
DocumentRoot "/Applications/XAMPP/htdocs/blog/public"
<Directory "/Applications/XAMPP/htdocs/blog/public">
###5.增加权限
cd /Applications/XAMPP/htdocs/blog
chmod -R 777 storage/