## عن المشروع 
رابط المشروع 
[project land](https://still-falls-68309.herokuapp.com/)

هو مشروع لشركة تعرض المستخدمين والمشاريع، ويمكن للمستخدم الذي يملك صلاحية مدير القيام بالتالي
- رفع المشاريع
-التعديل عليها
- ارسال ايملات للمستخدمين

## البيانات

بالإمكان تغيير عدد المستخدمين والمشاريع التي يملكونها من خلال الملف DatabaseSeeder.php

```php
// You can change Users number and Porjects 
        $numberofUsers = 10;
        $userHasProjects = 3;
```

ثم نقوم بعمل التهجير بواسطة الامر:
```php
php artisan migreate --seed
```

## التعديلات على ملف .env

-QUEUE_DRIVER=database
-MAIL_MAILER=smtp
-MAIL_HOST=smtp.mailtrap.io
-MAIL_PORT=2525
-MAIL_USERNAME=اسم المستخدم 
-MAIL_PASSWORD=كلمة المرور