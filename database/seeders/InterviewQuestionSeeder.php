<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class InterviewQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            // ... (keep the same array structure in your mind, I'll provide full replacement)
            // Note: I will just use the labels to find/create the categories
        ];

        // Actually let's just use the existing $questions array but change the implementation
        $questions = [
            // Eloquent
            ['category' => 'Eloquent', 'difficulty_level' => 'Medium', 'question' => 'ماذا يحدث إذا استدعيت Model::create() لكن خاصية fillable فارغة؟', 'answer' => 'Laravel سيمنع إدخال البيانات بسبب Mass Assignment Protection، وسيتم رمي MassAssignmentException لأن الحقول غير مسموح بتعبئتها.'],
            ['category' => 'Eloquent', 'difficulty_level' => 'Easy', 'question' => 'كيف تتجنب مشكلة N+1 عند تحميل علاقات متعددة ديناميكياً؟', 'answer' => 'باستخدام eager loading عبر with() أو load() بدل استدعاء العلاقة داخل حلقة.'],
            ['category' => 'Eloquent', 'difficulty_level' => 'Hard', 'question' => 'ما الفرق بين lazy() و cursor() في Eloquent؟', 'answer' => 'lazy() يجلب النتائج على دفعات، بينما cursor() يستخدم generator ويجلب صفًا واحدًا في كل مرة، وهو الأقل استهلاكًا للذاكرة.'],
            ['category' => 'Eloquent', 'difficulty_level' => 'Easy', 'question' => 'ماذا يحدث إذا استخدمت belongsToMany بدون جدول pivot؟', 'answer' => 'Laravel سيحاول الوصول لجدول الربط الافتراضي، وإذا لم يكن موجودًا سيحدث SQL error.'],
            // Query
            ['category' => 'Query', 'difficulty_level' => 'Medium', 'question' => 'كيف تحصل على منشورات المستخدم فقط إذا كان لديه أكثر من 5 منشورات؟', 'answer' => 'باستخدام has مثل: User::has("posts", ">", 5)->with("posts")->get().'],
            ['category' => 'Query', 'difficulty_level' => 'Hard', 'question' => 'كيف تحصل على عدد التعليقات لكل منشور بدون withCount؟', 'answer' => 'باستخدام subquery داخل selectRaw لعدّ التعليقات المرتبطة بكل منشور.'],
            ['category' => 'Query', 'difficulty_level' => 'Medium', 'question' => 'كيف تتعامل مع جدول يحتوي على 100 مليون سجل؟', 'answer' => 'باستخدام indexes مناسبة، pagination، و cursor أو chunk لتجنب تحميل البيانات كاملة في الذاكرة.'],
            // Architecture
            ['category' => 'Architecture', 'difficulty_level' => 'Hard', 'question' => 'كيف تصمم نظام multi-tenant يسمح لكل عميل بتخصيص الإعدادات؟', 'answer' => 'عن طريق ربط جدول settings بكل tenant مع fallback للإعدادات الافتراضية.'],
            ['category' => 'Architecture', 'difficulty_level' => 'Medium', 'question' => 'كيف تبني API تخدم الويب والموبايل بدون تكرار الكود؟', 'answer' => 'فصل منطق العمل في Services أو Actions وإعادة استخدامه داخل Controllers مختلفة.'],
            ['category' => 'Architecture', 'difficulty_level' => 'Hard', 'question' => 'ما أول خطوة لتحويل Laravel Monolith إلى Microservices؟', 'answer' => 'تحديد حدود كل خدمة (Bounded Contexts) وفصل أكثر الوحدات استقلالية أولًا.'],
            // Debugging
            ['category' => 'Debugging', 'difficulty_level' => 'Easy', 'question' => 'وظيفة مجدولة تعمل أحيانًا مرتين، ما السبب المحتمل؟', 'answer' => 'وجود أكثر من scheduler يعمل أو عدم استخدام withoutOverlapping().'],
            ['category' => 'Debugging', 'difficulty_level' => 'Medium', 'question' => 'API يعيد 500 Error بشكل عشوائي، ما أول خطوة؟', 'answer' => 'مراجعة logs و stack trace لمعرفة مصدر الاستثناء قبل أي افتراضات.'],
            ['category' => 'Debugging', 'difficulty_level' => 'Easy', 'question' => 'لماذا Eloquent يعيد نتائج فارغة رغم وجود البيانات؟', 'answer' => 'قد يكون السبب شرط where خاطئ، soft deletes، أو علاقة غير صحيحة.'],
            ['category' => 'Debugging', 'difficulty_level' => 'Medium', 'question' => 'Migration سببت أخطاء SQL بعد النشر، كيف تتراجع بأمان؟', 'answer' => 'استخدام migrate:rollback أو restore من backup إذا كانت البيانات حساسة.'],
            // Security
            ['category' => 'Security', 'difficulty_level' => 'Hard', 'question' => 'كيف تمنع Race Condition عند تحديث نفس السجل؟', 'answer' => 'باستخدام transactions مع select for update أو optimistic locking.'],
            ['category' => 'Security', 'difficulty_level' => 'Easy', 'question' => 'كيف يعمل Mass Assignment Protection في Laravel؟', 'answer' => 'Laravel يسمح فقط بالحقول المعرفة في fillable ويمنع أي إدخال غير مصرح به.'],
            ['category' => 'Security', 'difficulty_level' => 'Medium', 'question' => 'ماذا يحدث عند استخدام DB::transaction داخل Transaction آخر؟', 'answer' => 'Laravel يستخدم savepoints ولا ينشئ transaction مستقل بالكامل.'],
        ];

        foreach ($questions as $q) {
            $category = \App\Models\QuestionCategory::firstOrCreate(['name' => $q['category']]);

            Question::create([
                'question_category_id' => $category->id,
                'difficulty_level' => $q['difficulty_level'],
                'question' => $q['question'],
                'answer' => $q['answer'],
            ]);
        }
    }
}
