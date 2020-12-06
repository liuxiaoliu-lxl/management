drop table users;
create table users(
	`id` int UNSIGNED primary key auto_increment comment 'id',
	`username` varchar(50) UNIQUE default '' comment '用户名',
	`password` varchar(32) default '' comment '密码',
	`nickname` varchar(50) default '' comment '昵称',
	`create_time` TIMESTAMP default CURRENT_TIMESTAMP comment '创建时间',
	`update_time` TIMESTAMP default CURRENT_TIMESTAMP comment '修改时间',
	`status` tinyint UNSIGNED default 1 comment '状态'
);
insert into users (`username`, `password`) values ('admin', md5('adminmanagementadmin'));


drop table customer;
create table customer(
	id int UNSIGNED primary key auto_increment comment '客户id',
	`name` varchar(50) default '' comment '客户姓名',
	company varchar(200) default '' comment '公司',
	phone varchar(20) default '' comment '电话',
	wechat varchar(50) default '' comment '微信',
	email varchar(50) default '' comment '邮箱',
	address varchar(200) default '' comment '地址',
	category tinyint UNSIGNED default 0 comment '客户类别',
	major tinyint UNSIGNED default 0 comment '重要程度',
	`status` tinyint UNSIGNED default 0 comment '客户状态',
	receipt tinyint unsigned default 0 comment '是否已开发票',
	`create_time` TIMESTAMP default CURRENT_TIMESTAMP comment '创建时间',
	`update_time` TIMESTAMP default CURRENT_TIMESTAMP comment '修改时间'
);
