<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Project,
    User,
};

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project1 = Project::create([
            'title_ar' => 'جامع',
            'body_ar' => 'المَسْجِد أو الجامع هو دار عبادة المسلمين، وتُقام فيه الصلوات الخمس المفروضة وغيرها، وسمي مسجداً لأنه مكان للسجود لله، ويُطلق على المسجد أيضاً اسم جامع، وخاصةً إذا كان كبيراً، وفي الغالب يُطلق على اسم «جامع» لمن يجمع الناس لأداء صلاة الجمعة فيه فكل جامع مسجد وليس كل مسجد بجامع، كذلك يطلق اسم مصلى بدل من اسم مسجد عند أداء بعض الصلوات الخمس المفروضة فيه وليس كلها مثل مصليات المدارس والمؤسسات والشركات وطرق السفر وغيرها التي غالباً ما يؤدى فيها صلاة محدودة بحسب الفترة الزمنية الحالية، ويدعى للصلاة في المسجد عن طريق الأذان، وذلك خمس مرات في اليوم.
            الحرم المكي وفي وسطه الكعبة المشرفة بمكة المكرمة سنة 1880م.
            المسجد النبوي بالمدينة المنورة سنة 1905م.
            وكان المسجد هو أول مبنى تشهده المدينة المنورة العاصمة الأولى للدولة الإسلامية مباشرة بعد وصول النبي محمد عليه الصلاة والسلام مهاجرا من مكة، وشكل هذا المسجد إحدى ركائز بناء مجتمع مسلم من جميع النواحي الدينية والسياسية والاجتماعية.',
            'title_en' => 'Mosque',
            'body_en' => 'The mosque or the mosque is the place of worship for Muslims, and the five obligatory prayers and others are held in it. A mosque is a mosque, and not every mosque has a mosque. Also, the name of a chapel is called instead of the name of a mosque when performing some of the five daily prayers imposed in it, and not all of them are like chapels of schools, institutions, companies, travel routes and others, in which a limited prayer is often performed according to the current time period, and it is called to pray in the mosque through The call to prayer, five times a day.
            The Great Mosque of Mecca with the Kaaba in the middle in Makkah Al Mukarramah in the year 1880 AD.
            Al-Masjid an-Nabawi in Medina in 1905 AD.
            The mosque was the first building witnessed by Madinah, the first capital of the Islamic state, immediately after the arrival of the Prophet Muhammad, peace and blessings be upon him, as an immigrant from Mecca, and this mosque constituted one of the pillars of building a Muslim community in all religious, political and social aspects.',
            'project_image' => 'images/projects/1.jpg',
            'user_id' => User::where('name', 'محمد علي')->first()->id,
        ]);

        $project2 = Project::create([
            'title_ar' => 'ملعب رياضي',
            'body_ar' => 'ملعب كرة القدم هو مساحة اللعب التي تُقَام فيها مباريات كرة القدم. تُحَدَّد أبعاد الملعب وفقاً للقانون الأول من قوانين لعبة كرة القدم، وهو قانون "مساحات اللّعب".
            ويمكن أن يكون سطح الملعب طبيعيًا أو مصطنعًا، لكن قوانين الفيفا للعبة تفرض أن تكون كل الأسطح المصطنعة ملونة باللون الأخضر. الملعب عادة ما يكون مصنوعًا من العشب (الحشائش) أو العشب الصناعي، بالرغم من أن الفرق الهاوية أو الترفيهية تلعب على الملاعب الترابية.
            كل العلامات الخطية تكون جزءًا من المساحة المحددة، على سبيل المثال: الكرة فوق أو على خط التماس لا تزال داخل الملعب، الخطأ الملتزم بخط ال 16.5 مترًا (18 ياردة) ينفذ داخل منطقة الجزاء. لذلك يجب أن تعبر الكرة بكامل محيطها من خط التماس لتكون خارج الملعب وأيضًا يجب أن تعبر الكرة كاملة خط المرمى (بين القائمين) قبل أن يحتسب الهدف، إذا كان أي جزء من الكرة على أو فوق خط المرمى إذن فالكرة لا تزال قي الملعب وليست هدفًا.
            وصف الملعب المخصص لمباريات البالغين وارد في الأسفل. لاحظ أنه بسبب الصيغة الأصلية للقوانين في إنجلترا والسيادة المبكرة للروابط البريطانية الأربعة داخل مجلس الاتحاد الدولي لكرة القدم والمعروف اختصارًا بـ "IFAB" فإن الأبعاد الأساسية لملعب كرة القدم معبر عنها بـالوحدات الإمبراطورية. القوانين الآن تصف الأبعاد بشكل تقريبي للوحدات المترية المكافئة (متبوعة بالوحدات التقليدية في أقواس)، لكن استعمال الوحدات الإمبراطورية لايزال شائعًا في بعض الدول خاصةً في المملكة المتحدة.s عندما تكون الشركة متخصصة في الخطأ المطبعي (Letraset) البلاستيكية، نشرت ألواح مع أبجد هوز. في عصر الكمبيوتر، والعديد من البرامج لمعالجة النصوص أو تخطيط الصفحة باستخدام هذه النصوص كقالب افتراضي، وبالتالي وجودها في مواقع البناء.',
            'title_en'=> 'Football Field',
            'body_en'=> 'A football field is the playing space in which football matches are played. The dimensions of the stadium are determined according to the first law of the game of football, which is the law of “playing spaces”.
            The surface of the playing field can be natural or artificial, but the FIFA laws of the game require that all artificial surfaces be colored green. A court is usually made of turf (grass) or artificial turf, although amateur or recreational teams play on clay.
            All line marks are part of the designated space, for example: the ball above or on the touchline is still inside the field, the 16.5-meter (18 yards) line foul is taken inside the penalty area. Therefore, the ball must cross the entire circumference of the touch line to be outside the field, and also the entire ball must cross the goal line (between the goalposts) before the goal is awarded, if any part of the ball is on or above the goal line, then the ball is still in the field and not a goal.
            A description of the stadium for adult matches is shown below. Note that due to the original formulation of the laws in England and the early supremacy of the four British associations within the IFAB, the basic dimensions of a football field are expressed in imperial units. Laws now describe dimensions in approximate metric equivalent units (followed by traditional units in parentheses), but the use of imperial units is still common in some countries, especially the United Kingdom.',
            'project_image' => 'images/projects/2.jpg',
            'user_id' => User::where('name', 'وائل محمد')->first()->id,
        ]);

        $project3 = Project::create([
            'title_ar' => 'محطة قطار',
            'body_ar' => 'أنواع المحطات
            تصنف محطات القطار بحسب نوع النقل المخصصة لأجله كما يأتي:
            ـ محطات الركاب passenger stations.
            ـ محطات الشحن (محطات البضائع) freight stations.
            ـ محطات مختلطة ( ركاب وبضائع) mixed stations.
            كما تصنف المحطات بحسب المهام وحجوم الأعمال المطلوب تنفيذها في المحطة كما يأتي:
            ـ محطات التلاقي أو التجاوز crossing stations.
            ـ المحطات المتوسطة intermediate stations.
            ـ محطات المناطق regional stations.
            ـ محطات الفرز marshalling yards.
            عمل المحطة وحرمها والغاية منها والمنشآت اللازمة لعملها:
            مخطط عام لكيفية توضع الخطوط في محطة صغيرة
            تعمل محطات الخطوط الحديدية ـ في غالب الأحوال ـ على مدار الساعة وعلى مدار السنة لتنفيذ الأعمال المخصصة لها بحسب المهام وحجوم الأعمال المطلوبة من «كوادرها». ولكي تقوم بتنفيذ ذلك، لابد من توفير المواصفات والشروط اللازمة لعملها، وتزويدها بالمنشآت والأدوات المحركة والمتحركةrolling stock والتجهيزات المناسبة لها، والكوادر المؤهلة تأهيلاً خاصاً للعمل في المحطات. ولكل محطة حرم خاص يحيط بها. يُحدّد هذا الحرم بعلامات أو بسور يُمنع العامة من دخوله أو العبث ضمنه. وله بوابات نظامية خاصة للدخول وللخروج الآمن ',
            'title_en' => 'Train stations',
            'body_en' => 'Station types
            Train stations are classified according to the type of transport for which they are designated as follows:
            passenger stations.
            - Freight stations (cargo stations).
            Mixed stations (passengers and goods).
            The stations are also classified according to the tasks and volumes of work to be implemented in the station as follows:
            Crossing stations.
            intermediate stations.
            - regional stations.
            - Marshalling yards sorting stations.
            The work of the station, its precincts, its purpose, and the facilities necessary for its operation:
            General diagram of how the lines should be placed in a small station
            Railway stations work - in most cases - around the clock and throughout the year to carry out the works assigned to them according to the tasks and volumes of work required of their "cadres". In order to implement this, it is necessary to provide the specifications and conditions necessary for its work, and to provide it with facilities, moving and rolling stock, and the appropriate equipment for it, and specially qualified cadres to work in the stations. Each station has its own sanctuary. This sanctuary is identified by signs or by a fence that prevents the public from entering or tampering with it. It has special gates for safe entry and exit',
            'project_image' => 'images/projects/3.jpg',
            'user_id' => User::where('name', 'أكرم حسام')->first()->id,
        ]);

        $project4 = Project::create([
            'title_ar' => 'مجمع سكني',
            'body_ar' => 'مُجمع سكني أو عمارات هو مبنى ينقسم إلى عدة وحدات كلً مملوكة على حِدة، و تحيط بها مناطق مشتركة مملوكة بشكل مُشترك.
            كثيرًا ما يتم تشييد المجمعات السكنية كمباني سكنية ، ولكن هناك أيضًا «مجمعات سكنية منفصلة» ، و التي تبدو مثل منازل الأسرة الواحدة ، و لكن فيها الساحات الخضراء (الحدائق) و الممرات و المباني الخارجية و الشوارع بالإضافة إلى أي مرافق ترفيهية (مثل البرك أو حمامات سباحة ، صالة بولينغ ، ملاعب تنس ، ملعب جولف ، إلخ) ، مملوكة بشكل مشترك من قبل جمعية مجتمعية.
            على عكس الشقق المؤجرة من قبل المستأجرين ، فإن الوحدات السكنية مملوكة بالكامل. بالإضافة إلى ذلك، يمتلك مالكو الوحدات الفردية أيضًا بشكل جماعي المناطق العامة للعقار، مثل الممرات / الممرات و غرف الغسيل وما إلى ذلك ، بالإضافة إلى المرافق العامة ووسائل الراحة ، مثل نظام التدفئة والتهوية وتكييف الهواء و المصاعد و ما إلى ذلك. تشغيل. العديد من مراكز التسوق عبارة عن مجمعات صناعية تكون فيها مساحات التجزئة و المكاتب الفردية مملوكة للشركات التي تشغلها ، في حين أن المناطق المشتركة في المركز التجاري مملوكة بشكل جماعي لجميع الكيانات التجارية التي تمتلك المساحات الفردية.',
            'title_en' => 'An apartment complex',
            'body_en' => 'An apartment complex or condominium is a building that is divided into several separately owned units, surrounded by jointly owned common areas.
            Apartment complexes are often constructed as apartment buildings, but there are also "detached apartment blocks", which look like single-family homes, but have green yards (gardens), driveways, outbuildings, streets as well as any recreational facilities (such as ponds or swimming pools, bowling alley, tennis courts, golf course, etc.), jointly owned by a community association.
            Unlike apartments rented by tenants, condominiums are wholly owned. In addition, individual unit owners also collectively own the common areas of the property, such as corridors/corridors, laundry rooms, etc., as well as common utilities and amenities, such as HVAC system, elevators, etc. employment. Many malls are industrial complexes in which the individual retail and office space is owned by the companies that occupy them, while the common areas of the mall are collectively owned by all the business entities that own the individual spaces.',
            'project_image' => 'images/projects/4.jpg',
            'user_id' => User::where('name', 'حسن خالد')->first()->id,
        ]);

        $project5 = Project::create([
            'title_ar' => 'وزارة التجارة',
            'body_ar' => 'وزارة التجارة هي الوزارة المسؤولة عن تنظيم التجارة بالمملكة العربية السعودية، تأسست عام 1373 هـ، ووزيرها هو الدكتور ماجد بن عبدالله القصبي ونائب الوزير هي إيمان هباس المطيري.وتتولى الوزارة مهمة وضع وتنفيذ السياسات التجارية للمملكة، وتسهيل العمل التجاري وتنميته داخليًا وخارجيًا، وتعزيز دور القطاع الخاص في الاقتصاد الوطني، وتطوير العلاقات التجارية مع مختلف دول العالم، إضافة إلى الإشراف على تطبيق الأنظمة التجارية، وإصدار تراخيص إنشاء الغرف التجارية وفروعها والإشراف عليها.
            وفقاً لتقرير ممارسة الأعمال 2020 الصادر عن البنك الدولي، حققت السعودية المركز الأول عالمياً في إصلاحات بيئة الأعمال من بين 190 دولة ضمن مؤشر سهولة الأعمال، وتقدمت 30 مرتبة عن العام الماضي لتحتل المركز 62 بين 190 دولة في العالم يشملها التقرير، كما قلصت الفجوة مع الدول المرجعية الرائدة في العالم بـ7.7 نقاط، وهي تعد الأعلى بين الدول المشاركة.
            وقفزت السعودية في مؤشر النشاط التجاري، وفقا للتقرير، من المرتبة 141 إلى 38، وفي التجارة عبر الحدود انتقلت من المرتبة 158 إلى المرتبة 86، وفي مؤشر الحصول على الائتمان من المرتبة 112 إلى 80، كما قفزت في مؤشر حماية أقلية المستثمرين من المرتبة 7 إلى المرتبة 3، وفي مؤشر دفع الضرائب من 78 إلى 57.',
            'title_en' => 'The Ministry of Commerce',
            'body_en' => 'The Ministry of Commerce is the ministry responsible for regulating trade in the Kingdom of Saudi Arabia. It was established in 1373 AH. Its minister is Dr. Majid bin Abdullah Al-Qasabi and the deputy minister is Iman Habas Al-Mutairi. The private sector in the national economy, and the development of trade relations with various countries of the world, in addition to supervising the application of commercial regulations, and issuing and supervising the establishment of chambers of commerce and their branches.
            According to the Doing Business 2020 report issued by the World Bank, Saudi Arabia ranked first in the world in business environment reforms out of 190 countries in the ease of doing business index, and it advanced 30 ranks from last year to rank 62 among the 190 countries in the world covered by the report, and it also reduced the gap with other countries. The leading reference in the world with 7.7 points, which is the highest among the participating countries.
            Saudi Arabia jumped in the commercial activity index, according to the report, from 141 to 38, in cross-border trade, it moved from 158 to 86, and in the access to credit index from 112 to 80, and in the protection of minority investors index from 7 to Rank 3, on the Paying Taxes Index, from 78 to 57.',
            'project_image' => 'images/projects/5.jpg',
            'user_id' => User::where('name', 'مهند سيف')->first()->id,
        ]);
    }
}
