# cplugins-exception
Hyperf异常警报

## 安装
项目根目录执行:
```
composer require cplugins/hexception v1.0.1
```

## 配置
vendor/cplugins/hexception/src/ExceptionAlert.php 文件 48行

配置异常推送的url, 多G.O上线后从env调用该链接

## 使用 
```
throw new UrgentException("很好", "57657");
```

## 输出
```
二级警报
项目名称： /workspace/php-project/i-admin-manage-pc-interface
调用方法： app\http\controllers\product\templatecontroller testlog
错误信息： 参数传入错误
堆栈信息： xxxx
```


