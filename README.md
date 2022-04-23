## عن المشروع 
رابط المشروع 
[project land](https://git.heroku.com/projects-land.git)

•   الموقع يدعم اللغتين العربية و الإنجليزية
•   متجاوب مع جميع الشاشات

صفحة الزوار
-    الصفحة الرئيسية نعرض تفاصيل سريعة عن المشروع
- صفحة تفاصيل المشروع 
- إمكانية الاشتراك في القائمة البريدية في ذيل الصفحة


صفحة المدير
-   المشاريع CRUD (إنشاء، قراءة، تعديل، حذف)
-   صفحة خاصة بإرسال بريد إلكتروني
- صفحة لقائمة الشتركين في البريد 

هو مشروع لشركة تعرض المستخدمين والمشاريع، ويمكن للمستخدم الذي يملك صلاحية مدير القيام بالتالي
- رفع المشاريع
-التعديل عليها
- ارسال ايملات للمستخدمين

** لإستخدام صلاحية مدير يرجى إدخال ايميل المستخدم : admin@admin.com
وكلمة المرور: password  **

## البيانات

بالإمكان تغيير عدد المشتركين في البريد من خلال الملف Database\Seeders\DatabaseSeeder.php

```php
// You can change number of Subscriber 
        $numberofSubscriber = 1000;
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

- QUEUE_DRIVER=database
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.mailtrap.io
- MAIL_PORT=2525
- MAIL_USERNAME=اسم المستخدم 
- MAIL_PASSWORD=كلمة المرور



