## عن المشروع 
رابط المشروع 
[project land](https://still-falls-68309.herokuapp.com/)

•   الموقع يدعم اللغتين العربية و الإنجليزية
•   متجاوب مع جميع الشاشات

صفحة الزوار
-    الصفحة الرئيسية نعرض تفاصيل سريعة عن المشروع

صفحة المستخدم
-   المشاريع التي أنجزتها في الصفحة الرئيسية
-   حقل للاشتراك داخل  footer   
-   تفاصيل المشروع  

صفحة المدير
-   المشاريع CRUD
-   صفحة خاصة بإرسال بريد إلكتروني

هو مشروع لشركة تعرض المستخدمين والمشاريع، ويمكن للمستخدم الذي يملك صلاحية مدير القيام بالتالي
- رفع المشاريع
-التعديل عليها
- ارسال ايملات للمستخدمين

**لإستخدام صلاحية مدير يرجى إدخال ايميل المستخدم : admin@admin.com
وكلمة المرور: password

## البيانات

بالإمكان تغيير عدد المستخدمين والمشاريع التي يملكونها من خلال الملف DatabaseSeeder.php

```php
// You can change Users number and Porjects 
        $numberofUsers = 10;
        $userHasProjects = 3;
```

ثم نقوم بعمل التهجير بواسطة الامر:
```php
php artisan migrate --seed
```

## عدد الإيميلات المرسلة لكل مهمة(Job)  
نقوم بالتعديل على ملف SendBulkMailController والموجود داخل App\Http\Controllers وتغيير قيمة المتغير 
```php
// How many emails per Job
    $chunkedEmails = 25;
```
## التعديلات على ملف .env

-QUEUE_DRIVER=database
-MAIL_MAILER=smtp
-MAIL_HOST=smtp.mailtrap.io
-MAIL_PORT=2525
-MAIL_USERNAME=اسم المستخدم 
-MAIL_PASSWORD=كلمة المرور



