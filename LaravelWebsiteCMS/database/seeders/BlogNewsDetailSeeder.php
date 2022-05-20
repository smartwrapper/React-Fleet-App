<?php

namespace Database\Seeders;

use App\Models\Admin\BlogNewsDetail;
use Illuminate\Database\Seeder;

class BlogNewsDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '1',
                'language_id' => '1',
                'name' => 'Blog Cat1 Title1',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '1',
                'language_id' => '2',
                'name' => 'فئة المدونة 1 العنوان 1',
                'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '2',
                'language_id' => '1',
                'name' => 'Blog Cat1 Title2',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '2',
                'language_id' => '2',
                'name' => 'فئة المدونة 1 العنوان 2',
                'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '3',
                'language_id' => '1',
                'name' => 'Blog Cat1 Title3',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '3',
                'language_id' => '2',
                'name' => 'فئة المدونة 1 العنوان 3',
                'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '4',
                'language_id' => '1',
                'name' => 'Blog Cat2 Title1',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '4',
                'language_id' => '2',
                'name' => 'فئة المدونة 2 العنوان 1',
                'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '5',
                'language_id' => '1',
                'name' => 'Blog Cat2 Title2',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '5',
                'language_id' => '2',
                'name' => 'فئة المدونة 2 العنوان 2',
                'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '6',
                'language_id' => '1',
                'name' => 'Blog Cat2 Title3',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.',
            ]
        );
        BlogNewsDetail::insertOrIgnore(
            [
                'blog_news_id' => '6',
                'language_id' => '2',
                'name' => 'فئة المدونة 2 العنوان 3',
                'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.',
            ]
        );
    }
}
