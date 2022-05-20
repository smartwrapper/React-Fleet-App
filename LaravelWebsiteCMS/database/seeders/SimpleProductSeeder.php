<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductDetail;
use App\Models\Admin\ProductGallaryDetail;
use App\Models\Admin\Account;
use App\Models\Admin\AccountDetail;
use App\Models\Admin\Inventory;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;

class SimpleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::where('id', '>', '0')->where('product_type', 'simple')->delete();
        $time = time();
        $date = date('YYYY-mm-dd');
        for ($i = 1; $i <= 100; $i++) {
            $price = rand(50, 1000);
            $discount = rand(0, 70);
            $weight = rand(100, 5000);
            $product_max_order = rand(1, 100);
            $is_featured = $i%2;
            $is_points = $i%2;
            if ($discount > 0)
            {
                $discount_price = $price - ($price*$discount/100);
            } else {
                $discount_price = 0;
            }
            if ($i%2 == 0)
            {
                $video_url = 'https://www.youtube.com/watch?v=kbxOeOZhmIc';
            } else {
                $video_url = '';
            }
            $Product = Product::create(
                [
                    'product_type' => 'simple',
                    'product_slug' => 'simple-product-' . (string)$i,
                    'sku' => 'sku-s-000-' . (string)$i,
                    'video_url' => $video_url,
                    'gallary_id' => '32',
                    'price' => $price,
                    'discount_price' => $discount_price,
                    'product_unit' => '1',
                    'product_weight' => $weight,
                    'product_status' => 'active',
                    'brand_id' => '1',
                    'tax_id' => '1',
                    'is_featured' => $is_featured,
                    'product_min_order' => '1',
                    'product_max_order' => $product_max_order,
                    'seo_meta_tag' => 'tag-product-' . (string)$i,
                    'seo_desc' => 'desc for product no. ' . (string)$i,
                    'is_points' => $is_points,
                    'user_id' => '1',
                    'created_by' => '1',
                ]
            );

            $category_id = rand(3, 6);

            ProductCategory::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'category_id' => $category_id,
                ]
            );


            ProductDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'title' => 'Simple Product ' . (string)$i,
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc neque libero, porttitor id fringilla at, euismod ac sapien. In hac habitasse platea dictumst. Nulla quis ex nec purus elementum auctor et in lorem. Nullam imperdiet erat ut felis placerat varius. Sed tempor finibus mauris, eu venenatis metus ornare eget. Etiam viverra at mauris eget rutrum. Aenean et bibendum dolor. Nullam id lacus quis velit hendrerit ultricies. Integer lacinia, ligula at suscipit volutpat, magna erat posuere nisl, sed cursus urna ante ac lorem. Nulla eleifend nulla dui, eu tincidunt justo faucibus quis. Fusce molestie mollis ligula id pretium. Morbi iaculis, ex id fermentum egestas, metus justo ullamcorper lectus, commodo pharetra lorem lectus et dui. Aenean ipsum urna, blandit quis posuere ac, fermentum ut lacus. Pellentesque vehicula lacinia ligula, sed pharetra enim varius ac. Curabitur posuere lectus in libero pulvinar consequat. Vestibulum id lobortis turpis.

                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut semper mi et convallis aliquet. Fusce egestas egestas tellus, nec convallis velit pulvinar faucibus. Curabitur hendrerit quis lorem sit amet tempor. Sed cursus tincidunt purus, at varius tortor vulputate quis. Quisque a augue feugiat, mattis ipsum vel, aliquam nisl. Vestibulum nec varius dolor, vitae sagittis nisi. Integer pharetra eros quis sem bibendum, sit amet tincidunt lacus iaculis. Morbi vitae pharetra leo, quis posuere turpis. Integer tincidunt, mauris vel consequat dictum, augue sem tristique tortor, feugiat faucibus nulla ante sit amet purus. Quisque sit amet auctor lacus. Proin consectetur odio convallis risus condimentum finibus. Vestibulum non dui eu arcu auctor sollicitudin ac sed mauris. Quisque nec mauris ultrices diam malesuada aliquet quis ut sem. Aenean ut felis enim. ',
                    'language_id' => '1'
                ]
            );

            ProductDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'title' => 'منتج بسيط ' . (string)$i,
                    'desc' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.

                    و سأعرض مثال حي لهذا، من منا لم يتحمل جهد بدني شاق إلا من أجل الحصول على ميزة أو فائدة؟ ولكن من لديه الحق أن ينتقد شخص ما أراد أن يشعر بالسعادة التي لا تشوبها عواقب أليمة أو آخر أراد أن يتجنب الألم الذي ربما تنجم عنه بعض المتعة ؟ 
                    علي الجانب الآخر نشجب ونستنكر هؤلاء الرجال المفتونون بنشوة اللحظة الهائمون في رغباتهم فلا يدركون ما يعقبها من الألم والأسي المحتم، واللوم كذلك يشمل هؤلاء الذين أخفقوا في واجباتهم نتيجة لضعف إرادتهم فيتساوي مع هؤلاء الذين يتجنبون وينأون عن تحمل الكدح والألم . ',
                    'language_id' => '2'
                ]
            );

            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 32,
                ]
            );

            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 34,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 35,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 36,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 37,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 38,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 39,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 40,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 42,
                ]
            );
            ProductGallaryDetail::insertOrIgnore(
                [
                    'product_id' => $Product->id,
                    'gallary_id' => 43,
                ]
            );


            // account seeder

            if ($i < 10)
            {
                $account_code = '01050' . (string)$i;
            } else {
                $account_code = '0105' . (string)$i;
            }

            $Account = Account::create(
                [
                    'name' => 'Simple Product ' . (string)$i,
                    'code' => $account_code,
                    'account_type' => 'Assets',
                    'status' => '1',
                    'parent_id' => '6',
                    'reference_id' => $Product->id,
                ]
            );

            // account transaction seeder

            $Transactions = Transaction::create(
                [
                    'transaction_number' => $i,
                    'transaction_date' => $date,
                    'description' => 'AccountAdjustment',
                ]
            );

            $asset_price = rand(1000, 10000);

            $TransactionDetail = TransactionDetail::create(
                [
                    'transaction_id' => $Transactions->id,
                    'account_id' => $Account->id,
                    'reference_id' => $Product->id,
                    'user_id' => '1',
                    'type' => 'adjustment',
                    'cr_amount' => $asset_price,
                ]
            );

            // inventory seeder

            $qty = rand(100, 1000);
            
            Inventory::insertOrIgnore([
                'product_id' => $Product->id,
                'warehouse_id' => '1',
                'stock_status' => 'IN',
                'qty' => $qty,
                'reference_id' => $Product->id,
                'stock_type' => 'StockAdjustment',
                'created_by' => '1',
                'created_at' => \Carbon\Carbon::now(),

            ]);
        }
    }
}
