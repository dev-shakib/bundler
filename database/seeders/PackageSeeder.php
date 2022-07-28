<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Plan;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Package::create(['name'=>'FREE','price'=>0]);
        $p2 = Package::create(['name'=>'PAYG','price'=>10]);
        $p3 = Package::create(['name'=>'UNLIMITED','price'=>50]);

        Plan::create(['name'=>'Limit bundle to 60 pages','package_id'=>$p1->id]);
        Plan::create(['name'=>'Watermark at every page','package_id'=>$p1->id]);
        Plan::create(['name'=>'100 days storage','package_id'=>$p1->id]);
        Plan::create(['name'=>'1 Active Bundle','package_id'=>$p1->id]);

        Plan::create(['name'=>'Pay per bundle','package_id'=>$p2->id]);
        Plan::create(['name'=>'No watermarks','package_id'=>$p2->id]);
        Plan::create(['name'=>'2 Years storage','package_id'=>$p2->id]);
        Plan::create(['name'=>'5 Active Bundle','package_id'=>$p2->id]);

        Plan::create(['name'=>'Unlimited Bundles','package_id'=>$p3->id]);
        Plan::create(['name'=>'Own Branding','package_id'=>$p3->id]);
        Plan::create(['name'=>'Save Separte Sections','package_id'=>$p3->id]);
        Plan::create(['name'=>'3 Years Storage','package_id'=>$p3->id]);
        Plan::create(['name'=>'5GB Archive for non-active bundles','package_id'=>$p3->id]);
    }
}
